import React, { useState, useEffect, useMemo, useCallback, useRef } from 'react';
import LoadingSpinner from './LoadingSpinner';
import BackButton from './BackButton';
import NuevaOSModal from './NuevaOSModal';
import EditarOSCompletaModal from './EditarOSCompletaModal';
import { getObrasSociales } from '../services/api';
import { FaSearch, FaSync, FaEdit, FaPlus } from 'react-icons/fa';
import { AgGridReact } from 'ag-grid-react';
import { ModuleRegistry, AllCommunityModule } from 'ag-grid-community';

ModuleRegistry.registerModules([AllCommunityModule]);

const ObraSocialList = () => {
  const [obrasSociales, setObrasSociales] = useState([]);
  const [loading, setLoading] = useState(true);
  const [searchTerm, setSearchTerm] = useState('');
  const [isMobile, setIsMobile] = useState(window.innerWidth < 768);
  
  const [showEditModal, setShowEditModal] = useState(false);
  const [showNuevaOSModal, setShowNuevaOSModal] = useState(false);
  const [selectedOS, setSelectedOS] = useState(null);
  
  const debounceTimeout = useRef(null);

  useEffect(() => {
    const handleResize = () => setIsMobile(window.innerWidth < 768);
    window.addEventListener('resize', handleResize);
    return () => window.removeEventListener('resize', handleResize);
  }, []);

  const fetchObrasSociales = useCallback(async (search = '') => {
    setLoading(true);
    try {
      const data = await getObrasSociales(search);
      setObrasSociales(data || []);
    } catch (error) {
      console.error('Error fetching obras sociales:', error);
      setObrasSociales([]);
    } finally {
      setLoading(false);
    }
  }, []);

  useEffect(() => {
    fetchObrasSociales(searchTerm);
  }, []);

  useEffect(() => {
    return () => {
      if (debounceTimeout.current) clearTimeout(debounceTimeout.current);
    };
  }, []);

  const onInputChange = (e) => {
    const val = e.target.value;
    setSearchTerm(val);
    if (debounceTimeout.current) clearTimeout(debounceTimeout.current);
    debounceTimeout.current = setTimeout(() => {
      fetchObrasSociales(val);
    }, 500);
  };

  const handleEditOS = (row) => {
    setSelectedOS(row);
    setShowEditModal(true);
  };

  const columnDefs = useMemo(() => [
    {
      field: 'nro_os',
      headerName: 'Nro',
      width: 80,
      suppressMovable: true,
      cellStyle: { fontWeight: '700', color: '#0369a1', textAlign: 'center' },
      headerClass: 'header-center'
    },
    {
      field: 'sigla',
      headerName: 'Sigla',
      width: 120,
      sortable: true,
      filter: true
    },
    {
      field: 'denominacion',
      headerName: 'Denominación',
      flex: 2,
      sortable: true,
      filter: true,
      cellStyle: { color: '#333', fontWeight: '500' }
    },
    {
      field: 'domicilio_n',
      headerName: 'Domicilio',
      width: 200,
      sortable: true,
      filter: true
    },
    {
      field: 'localidad_n',
      headerName: 'Localidad',
      width: 150,
      sortable: true,
      filter: true
    },
    {
      field: 'telefono_n',
      headerName: 'Teléfono',
      width: 120,
      sortable: true,
      filter: true,
      valueFormatter: (params) => params.value ? params.value : '-'
    },
    {
      field: 'activa',
      headerName: 'Activa',
      width: 80,
      sortable: true,
      filter: true,
      cellStyle: (params) => ({ color: params.value === 1 ? '#16a34a' : '#dc2626', fontWeight: 'bold', textAlign: 'center' }),
      valueFormatter: (params) => params.value === 1 ? 'Sí' : 'No'
    },
    {
      headerName: 'Acciones',
      width: 80,
      pinned: 'right',
      cellRenderer: (params) => (
        <div className="d-flex justify-content-center align-items-center h-100">
          <button
            className="btn btn-sm btn-link text-primary p-0 hover-scale"
            title="Editar Obra Social"
            onClick={() => handleEditOS(params.data)}
          >
            <FaEdit size={16} />
          </button>
        </div>
      )
    }
  ], []);

  const defaultColDef = useMemo(() => ({
    resizable: true,
    sortable: true,
    filter: true,
    flex: 1,
    minWidth: 100,
  }), []);

  return (
    <div className="container-fluid py-3 px-4 h-100 d-flex flex-column bg-light">
      <div className="d-flex align-items-center mb-3">
        <BackButton to="/obras-sociales" label="Volver" />
        <button className="btn btn-success btn-sm ms-3" onClick={() => setShowNuevaOSModal(true)}>
          <FaPlus size={14} /> Nueva OS
        </button>
        <div className="ms-auto">
          <small className="text-muted fw-bold">Se han encontrado <span className="text-dark">{obrasSociales.length}</span> registro/s.</small>
        </div>
      </div>

      <div className="card border-0 shadow-sm mb-3" style={{ borderRadius: '0.5rem' }}>
        <div className="card-body p-2 d-flex align-items-center flex-wrap gap-3 bg-white">
          <div className="input-group input-group-sm flex-grow-1 border rounded-pill px-3 py-1 bg-light" style={{ maxWidth: '400px' }}>
            <span className="input-group-text bg-transparent border-0 text-muted"><FaSearch /></span>
            <input
              type="text"
              className="form-control bg-transparent border-0 shadow-none"
              placeholder="Buscar por número, denominación o sigla..."
              value={searchTerm}
              onChange={onInputChange}
            />
          </div>

          <button className="btn btn-sm btn-light border rounded-pill px-3 d-flex align-items-center gap-2 text-muted ms-auto" onClick={() => fetchObrasSociales(searchTerm)}>
            <FaSync size={12} className={loading ? 'fa-spin' : ''} /> <small className="fw-bold text-uppercase">Actualizar</small>
          </button>
        </div>
      </div>

      <div className="flex-grow-1 shadow-sm rounded-3 overflow-hidden border bg-white mb-3" style={{ minHeight: '500px' }}>
        {loading ? (
          <LoadingSpinner message="Buscando Obras Sociales..." />
        ) : isMobile ? (
          <div className="p-3" style={{ maxHeight: '70vh', overflowY: 'auto' }}>
            {obrasSociales.length === 0 && (
              <div className="text-center text-muted py-5">No se encontraron obras sociales</div>
            )}
            <div className="d-flex flex-column gap-3">
              {obrasSociales.map((os, idx) => (
                <div key={idx} className="card shadow-sm border-0" style={{ borderRadius: '12px' }}>
                  <div className="card-body p-3">
                    <div className="d-flex justify-content-between align-items-start mb-2">
                      <div>
                        <span className="badge bg-primary rounded-pill px-3">{os.nro_os}</span>
                        <span className="badge bg-secondary rounded-pill px-2 ms-2">{os.sigla || 'N/A'}</span>
                        <span className={`badge rounded-pill px-2 ms-2 ${os.activa === 1 ? 'bg-success' : 'bg-danger'}`}>
                          {os.activa === 1 ? 'Activa' : 'Inactiva'}
                        </span>
                      </div>
                      <button className="btn btn-sm btn-link text-primary p-1" onClick={() => handleEditOS(os)}>
                        <FaEdit size={18} />
                      </button>
                    </div>
                    <h6 className="card-title fw-bold mb-2 text-dark">{os.denominacion}</h6>
                    <div className="small text-muted">
                      {os.domicilio_n && <div><strong>Dom:</strong> {os.domicilio_n}, {os.localidad_n}</div>}
                      {os.telefono_n && <div><strong>Tel:</strong> {os.telefono_n}</div>}
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        ) : (
          <div className="w-100 shadow-sm border rounded position-relative" style={{ height: '550px' }}>
            <AgGridReact
              rowData={obrasSociales}
              columnDefs={columnDefs}
              defaultColDef={defaultColDef}
              loadingOverlayComponent={null}
              pagination={true}
              paginationPageSize={50}
              paginationPageSizeSelector={[20, 50, 100]}
              animateRows={true}
              overlayNoRowsTemplate="<span className='text-muted'>No se encontraron obras sociales para este filtro.</span>"
            />
          </div>
        )}
      </div>

      {showEditModal && selectedOS && (
        <EditarOSCompletaModal
          nro_os={selectedOS.nro_os}
          sigla={selectedOS.sigla}
          denominacion={selectedOS.denominacion}
          visible={showEditModal}
          onClose={() => setShowEditModal(false)}
          onSave={() => fetchObrasSociales(searchTerm)}
        />
      )}

      {showNuevaOSModal && (
        <NuevaOSModal
          visible={showNuevaOSModal}
          onClose={() => setShowNuevaOSModal(false)}
          onSave={() => fetchObrasSociales(searchTerm)}
        />
      )}
    </div>
  );
};

export default ObraSocialList;
