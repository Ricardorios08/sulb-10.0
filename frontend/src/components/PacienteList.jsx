import React, { useState, useEffect, useMemo, useCallback, useRef } from 'react';
import LoadingSpinner from './LoadingSpinner';
import ResultadoModal from './ResultadoModal';
import OrdenModal from './OrdenModal';
import { getPacientes } from '../services/api';
import PacienteDetail from './PacienteDetail';
import PacienteOrders from './PacienteOrders';
import BackButton from './BackButton';
import { useSearch } from '../context/SearchContext';
import { FaSearch, FaSync, FaFileAlt, FaVial, FaPlus, FaUser, FaFileMedical } from 'react-icons/fa';

// AG Grid v35 Imports
import { AgGridReact } from 'ag-grid-react';
import { ModuleRegistry, AllCommunityModule } from 'ag-grid-community';

// Registering all community features for v35
ModuleRegistry.registerModules([AllCommunityModule]);

const PacienteList = () => {
  const { 
    pacienteSearch, setPacienteSearch, 
    practicaSearch, setPracticaSearch,
    startDate, setStartDate, 
    endDate, setEndDate 
  } = useSearch();
  
  const [pacientes, setPacientes] = useState([]);
  const [loading, setLoading] = useState(true);
  
  // State for Detail Modal
  const [selectedPacienteId, setSelectedPacienteId] = useState(null);
  const [showDetail, setShowDetail] = useState(false);
  
  // State for Orders Modal
  const [ordersPacienteId, setOrdersPacienteId] = useState(null);
  const [showOrders, setShowOrders] = useState(false);

  // State for Results Modal
  const [selectedPacienteForResults, setSelectedPacienteForResults] = useState(null);
  const [isResultsModalOpen, setIsResultsModalOpen] = useState(false);

  // State for Orden Modal
  const [selectedPacienteForOrden, setSelectedPacienteForOrden] = useState(null);
  const [isOrdenModalOpen, setIsOrdenModalOpen] = useState(false);
  
  const [inputValue, setInputValue] = useState(pacienteSearch || '');
  const [isMobile, setIsMobile] = useState(window.innerWidth < 768);
  
  const debounceTimeout = useRef(null);
  const gridRef = useRef();

  useEffect(() => {
    const handleResize = () => setIsMobile(window.innerWidth < 768);
    window.addEventListener('resize', handleResize);
    return () => window.removeEventListener('resize', handleResize);
  }, []);

  const fetchPacientes = useCallback(async (search = '', start = '', end = '', practica = '') => {
    setLoading(true);
    try {
      const data = await getPacientes(search, start, end, practica);
      setPacientes(data || []);
    } catch (error) {
      console.error('Error fetching pacientes:', error);
      setPacientes([]);
    } finally {
      setLoading(false);
    }
  }, []);

  // Sync with global search context
  useEffect(() => {
    fetchPacientes(pacienteSearch, startDate, endDate, practicaSearch);
    if (pacienteSearch !== inputValue) {
      setInputValue(pacienteSearch);
    }
  }, [pacienteSearch, startDate, endDate, practicaSearch, fetchPacientes]);

  useEffect(() => {
    return () => {
      if (debounceTimeout.current) clearTimeout(debounceTimeout.current);
    };
  }, []);

  const onInputChange = (e) => {
    const val = e.target.value;
    setInputValue(val);
    if (debounceTimeout.current) clearTimeout(debounceTimeout.current);
    debounceTimeout.current = setTimeout(() => {
      setPacienteSearch(val);
    }, 500);
  };

  const onDateChange = (type, val) => {
    if (type === 'start') {
      setStartDate(val);
    } else {
      setEndDate(val);
    }
  };

  const handleOpenResults = useCallback((paciente) => {
    setSelectedPacienteForResults(paciente);
    setIsResultsModalOpen(true);
  }, []);

  const columnDefs = useMemo(() => [
    {
      field: 'nro_paciente',
      headerName: 'N° Paciente',
      width: 120,
      suppressMovable: true,
      cellStyle: { fontWeight: '700', color: '#0369a1', textAlign: 'center' },
      headerClass: 'header-center'
    },
    {
      headerName: 'Apellido y Nombre',
      valueGetter: (params) => {
        const apellido = params.data.apellido || '';
        const nombre = params.data.nombre || '';
        return `${apellido} ${nombre}`;
      },
      flex: 2,
      sortable: true,
      filter: true,
      cellStyle: { color: '#2557a1' } 
    },
    {
      field: 'nro_documento',
      headerName: 'Documento',
      width: 150,
      filter: 'agTextColumnFilter'
    },
    {
      field: 'celular',
      headerName: 'Teléfono',
      width: 180
    },
    {
      field: 'email',
      headerName: 'Email',
      flex: 1.5
    },
    {
      field: 'ordenesCount',
      headerName: 'Protocolos',
      width: 110,
      sortable: true,
      cellStyle: { textAlign: 'center', fontWeight: 'bold', color: '#0369a1' },
      headerClass: 'header-center',
      cellRenderer: (params) => {
        const count = params.value || 0;
        return (
          <span className={`badge rounded-pill ${count > 0 ? 'bg-primary bg-opacity-10 text-primary' : 'bg-light text-muted'}`}>
            {count}
          </span>
        );
      }
    },
    {
      headerName: 'Resultados',
      width: 100,
      pinned: 'right',
      cellRenderer: (params) => {
        return (
          <div className="d-flex justify-content-center align-items-center h-100">
            <button
              onClick={() => handleOpenResults(params.data)}
              className="btn btn-link text-danger p-0 hover-scale"
              title="Resultados"
            >
              <FaVial size={18} />
            </button>
          </div>
        );
      },
    },
    {
      field: 'ultimaFecha',
      headerName: 'Últ. Fecha',
      width: 120,
      sortable: true,
      cellRenderer: (params) => {
        if (!params.value) return '-';
        // Robust formatting for YYYY-MM-DD to DD/MM/YYYY
        const parts = params.value.split('T')[0].split('-');
        if (parts.length === 3) {
          const [y, m, d] = parts;
          return `${d}/${m}/${y}`;
        }
        return params.value;
      }
    },
    {
      headerName: 'Acciones',
      width: 130,
      pinned: 'right',
      cellRenderer: (params) => (
        <div className="d-flex justify-content-center align-items-center h-100 gap-3">
          <button
            className="btn btn-link text-info p-0 hover-scale"
            title="Ver Ficha"
            onClick={() => {
              setSelectedPacienteId(params.data.nro_paciente);
              setShowDetail(true);
            }}
          >
            <FaSearch size={18} />
          </button>
          <button
            className="btn btn-link text-primary p-0 hover-scale"
            title="Ver Órdenes"
            onClick={() => {
              setOrdersPacienteId(params.data.nro_paciente);
              setShowOrders(true);
            }}
          >
            <FaFileAlt size={18} />
          </button>
          <button
            className="btn btn-link text-success p-0 hover-scale"
            title="Nueva Orden"
            onClick={() => {
              setSelectedPacienteForOrden({ ...params.data, _forceNew: true });
              setIsOrdenModalOpen(true);
            }}
          >
            <FaPlus size={18} />
          </button>
        </div>
      )
    }
  ], [handleOpenResults]);

  const defaultColDef = useMemo(() => ({
    resizable: true,
    sortable: true,
    filter: true,
    flex: 1,
    minWidth: 100,
  }), []);

  return (
    <div className="container-fluid py-3 px-4 h-100 d-flex flex-column bg-light-blue">
      <div className="d-flex align-items-center mb-3">
        <BackButton to="/pacientes" label="Volver" />
        <div className="ms-auto">
          <small className="text-muted fw-bold">Se han encontrado <span className="text-dark">{pacientes.length}</span> registro/s.</small>
        </div>
      </div>

      <div className="card border-0 shadow-sm mb-3" style={{ borderRadius: '0.5rem' }}>
        <div className="card-body p-2 d-flex align-items-center flex-wrap gap-3 bg-white">
          {/* Text Search */}
          <div className="input-group input-group-sm flex-grow-1 border rounded-pill px-3 py-1 bg-light" style={{ maxWidth: '400px' }}>
            <span className="input-group-text bg-transparent border-0 text-muted"><FaSearch /></span>
            <input
              type="text"
              className="form-control bg-transparent border-0 shadow-none"
              placeholder="Ej: 'Gomez Marcos', protocolo o fecha (DD/MM/AAAA)..."
              value={inputValue}
              onChange={onInputChange}
            />
          </div>

          {/* Date Range Filters */}
          <div className="d-flex align-items-center gap-2">
            <div className="d-flex align-items-center gap-2 px-3 py-1 bg-light border rounded-pill shadow-xs">
              <small className="fw-bold text-muted text-uppercase" style={{ fontSize: '0.65rem' }}>Desde:</small>
              <input 
                type="date" 
                className="form-control form-control-sm bg-transparent border-0 p-0 shadow-none text-dark fw-medium"
                value={startDate}
                onChange={(e) => onDateChange('start', e.target.value)}
                style={{ width: '120px' }}
              />
            </div>
            <div className="d-flex align-items-center gap-2 px-3 py-1 bg-light border rounded-pill shadow-xs">
              <small className="fw-bold text-muted text-uppercase" style={{ fontSize: '0.65rem' }}>Hasta:</small>
              <input 
                type="date" 
                className="form-control form-control-sm bg-transparent border-0 p-0 shadow-none text-dark fw-medium"
                value={endDate}
                onChange={(e) => onDateChange('end', e.target.value)}
                style={{ width: '120px' }}
              />
            </div>
          </div>

          <button className="btn btn-sm btn-light border rounded-pill px-3 d-flex align-items-center gap-2 text-muted ms-auto" onClick={() => fetchPacientes(inputValue, startDate, endDate)}>
            <FaSync size={12} className={loading ? 'fa-spin' : ''} /> <small className="fw-bold text-uppercase">Actualizar</small>
          </button>
        </div>
      </div>

      <div className="flex-grow-1 shadow-sm rounded-3 overflow-hidden border bg-white mb-3" style={{ minHeight: '500px' }}>
        {loading ? (
          <LoadingSpinner message="Buscando Pacientes..." />
        ) : isMobile ? (
          <div className="p-2" style={{ maxHeight: '70vh', overflowY: 'auto' }}>
            {pacientes.length === 0 && (
              <div className="text-center text-muted py-5">No se encontraron pacientes</div>
            )}
            <div className="d-flex flex-column gap-2">
              {pacientes.map((p, idx) => (
                <div key={idx} className="card shadow-sm border-0" style={{ borderRadius: '12px' }}>
                  <div className="card-body p-3">
                    <div className="d-flex justify-content-between align-items-start mb-2">
                      <div className="d-flex align-items-center gap-2">
                        <span className="badge bg-primary rounded-pill px-3">{p.nro_paciente}</span>
                        <span className="badge bg-secondary rounded-pill px-2">{p.ordenesCount || 0}</span>
                      </div>
                      <div className="btn-group">
                        <button className="btn btn-sm btn-link text-primary p-1" onClick={() => { setSelectedPacienteId(p.nro_paciente); setShowDetail(true); }}>
                          <FaUser size={18} />
                        </button>
                        <button className="btn btn-sm btn-link text-info p-1" onClick={() => { setOrdersPacienteId(p.nro_paciente); setShowOrders(true); }}>
                          <FaFileMedical size={18} />
                        </button>
                        <button className="btn btn-sm btn-link text-success p-1" onClick={() => { setSelectedPacienteForOrden({ ...p, _forceNew: true }); setIsOrdenModalOpen(true); }}>
                          <FaPlus size={18} />
                        </button>
                      </div>
                    </div>
                    <h6 className="card-title fw-bold mb-1 text-dark">{(p.apellido || '') + ' ' + (p.nombre || '')}</h6>
                    <div className="small text-muted">
                      {p.nro_documento && <div>Doc: {p.nro_documento}</div>}
                      {p.celular && <div>Tel: {p.celular}</div>}
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        ) : (
          <div className="w-100 shadow-sm border rounded position-relative" style={{ height: '550px' }}>
            <AgGridReact
              ref={gridRef}
              rowData={pacientes}
              columnDefs={columnDefs}
              defaultColDef={defaultColDef}
              loadingOverlayComponent={null}
              pagination={true}
              paginationPageSize={50}
              paginationPageSizeSelector={[20, 50, 100]}
              animateRows={true}
              overlayNoRowsTemplate="<span className='text-muted'>No se encontraron pacientes para este filtro.</span>"
            />
          </div>
        )}
      </div>

      {/* Modal Ficha */}
      {selectedPacienteId && (
        <PacienteDetail
          pacienteId={selectedPacienteId}
          visible={showDetail}
          onClose={() => setShowDetail(false)}
        />
      )}

      {/* Modal Órdenes */}
      {ordersPacienteId && (
        <PacienteOrders
          pacienteId={ordersPacienteId}
          visible={showOrders}
          onClose={() => setShowOrders(false)}
          onEditOrder={(codGrabacion) => {
            const paciente = pacientes.find(p => p.nro_paciente === ordersPacienteId);
            if (paciente) {
              setSelectedPacienteForOrden({ ...paciente, ultimaOrdenId: codGrabacion, _forceNew: false });
              setIsOrdenModalOpen(true);
            }
          }}
          onEnterResults={(codGrabacion) => {
            const paciente = pacientes.find(p => p.nro_paciente === ordersPacienteId);
            if (paciente) {
              setSelectedPacienteForResults({ ...paciente, ultimaOrdenId: codGrabacion });
              setIsResultsModalOpen(true);
            }
          }}
        />
      )}

      {isResultsModalOpen && selectedPacienteForResults && (
        <ResultadoModal
          isOpen={isResultsModalOpen}
          onClose={() => setIsResultsModalOpen(false)}
          paciente={selectedPacienteForResults}
          cod_grabacion={selectedPacienteForResults.ultimaOrdenId}
          onSaveSuccess={() => fetchPacientes(pacienteSearch, startDate, endDate, practicaSearch)}
        />
      )}

      {isOrdenModalOpen && selectedPacienteForOrden && (
        <OrdenModal
          nro_paciente={selectedPacienteForOrden.nro_paciente}
          codGrabacion={selectedPacienteForOrden._forceNew ? null : selectedPacienteForOrden.ultimaOrdenId}
          pacienteNombre={`${selectedPacienteForOrden.apellido || ''} ${selectedPacienteForOrden.nombre || ''}`.trim()}
          onClose={() => setIsOrdenModalOpen(false)}
          onSaved={() => fetchPacientes(pacienteSearch, startDate, endDate, practicaSearch)}
        />
      )}
    </div>
  );
};

export default PacienteList;
