import React, { useState, useEffect, useMemo, useCallback, useRef } from 'react';
import LoadingSpinner from './LoadingSpinner';
import BackButton from './BackButton';
import ConvenioPracticaModal from './ConvenioPracticaModal';
import NuevaPracticaModal from './NuevaPracticaModal';
import { getPracticas } from '../services/api';
import { FaSearch, FaSync, FaEdit, FaLink, FaPlus, FaTrash } from 'react-icons/fa';
import { AgGridReact } from 'ag-grid-react';
import { ModuleRegistry, AllCommunityModule } from 'ag-grid-community';

ModuleRegistry.registerModules([AllCommunityModule]);

const PracticaList = () => {
  const [practicas, setPracticas] = useState([]);
  const [loading, setLoading] = useState(true);
  const [searchTerm, setSearchTerm] = useState('');
  const [searchClase, setSearchClase] = useState('');
  const [isMobile, setIsMobile] = useState(window.innerWidth < 768);
  
  const [showConvenioModal, setShowConvenioModal] = useState(false);
  const [showNuevaPracticaModal, setShowNuevaPracticaModal] = useState(false);
  const [selectedPractica, setSelectedPractica] = useState(null);
  
  const debounceTimeout = useRef(null);

  useEffect(() => {
    const handleResize = () => setIsMobile(window.innerWidth < 768);
    window.addEventListener('resize', handleResize);
    return () => window.removeEventListener('resize', handleResize);
  }, []);

  const fetchPracticas = useCallback(async (search = '', clase = '') => {
    setLoading(true);
    try {
      const data = await getPracticas(search, '', clase);
      setPracticas(data || []);
    } catch (error) {
      console.error('Error fetching practicas:', error);
      setPracticas([]);
    } finally {
      setLoading(false);
    }
  }, []);

  useEffect(() => {
    fetchPracticas(searchTerm, searchClase);
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
      fetchPracticas(val, searchClase);
    }, 500);
  };

  const handleClaseChange = (e) => {
    const val = e.target.value;
    setSearchClase(val);
    fetchPracticas(searchTerm, val);
  };

  const handleEditPractica = (row) => {
    setSelectedPractica(row);
    setShowConvenioModal(true);
  };

  const handleRefComplejos = (cod_practica) => {
    window.open(`https://www.laboratoriosegura.com.ar/laboratorio.6.0/a_sectores/auditoria/complejos/modificar_complejo.php?cod_practica=${cod_practica}`, '_blank');
  };

  const handleDeletePractica = async (row) => {
    if (!window.confirm(`¿Eliminar la práctica ${row.cod_practica} - ${row.practica}?`)) return;
    try {
      await deletePractica(row.cod_practica, row.nro_os);
      fetchPracticas(searchTerm, searchClase);
    } catch (error) {
      console.error('Error deleting practica:', error);
      alert('Error al eliminar');
    }
  };

  const columnDefs = useMemo(() => [
    {
      field: 'cod_practica',
      headerName: 'Código',
      width: 100,
      suppressMovable: true,
      cellStyle: { fontWeight: '700', color: '#0369a1', textAlign: 'center' },
      headerClass: 'header-center'
    },
    {
      field: 'practica',
      headerName: 'Práctica',
      flex: 3,
      sortable: true,
      filter: true,
      cellStyle: { color: '#333', fontWeight: '500' }
    },
    {
      field: 'unidad',
      headerName: 'Unidad',
      width: 100,
      sortable: true,
      filter: true
    },
    {
      field: 'metodo',
      headerName: 'Método',
      width: 150,
      sortable: true,
      filter: true
    },
    {
      field: 'clase_texto',
      headerName: 'Clase',
      width: 120,
      sortable: true,
      filter: true
    },
    {
      headerName: 'Acciones',
      width: 120,
      pinned: 'right',
      cellRenderer: (params) => (
        <div className="d-flex justify-content-center align-items-center h-100 gap-2">
          <button
            className="btn btn-sm btn-link text-primary p-0 hover-scale"
            title="Editar Práctica"
            onClick={() => handleEditPractica(params.data)}
          >
            <FaEdit size={16} />
          </button>
          <button
            className="btn btn-sm btn-link text-danger p-0 hover-scale"
            title="Eliminar Práctica"
            onClick={() => handleDeletePractica(params.data)}
          >
            <FaTrash size={16} />
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
        <BackButton to="/practicas" label="Volver" />
        <button className="btn btn-success btn-sm ms-3" onClick={() => setShowNuevaPracticaModal(true)}>
          <FaPlus size={14} /> Nueva Práctica
        </button>
        <div className="ms-auto">
          <small className="text-muted fw-bold">Se han encontrado <span className="text-dark">{practicas.length}</span> registro/s.</small>
        </div>
      </div>

      <div className="card border-0 shadow-sm mb-3" style={{ borderRadius: '0.5rem' }}>
        <div className="card-body p-2 d-flex align-items-center flex-wrap gap-3 bg-white">
          <div className="input-group input-group-sm flex-grow-1 border rounded-pill px-3 py-1 bg-light" style={{ maxWidth: '400px' }}>
            <span className="input-group-text bg-transparent border-0 text-muted"><FaSearch /></span>
            <input
              type="text"
              className="form-control bg-transparent border-0 shadow-none"
              placeholder="Buscar por código, nombre o sinonimia..."
              value={searchTerm}
              onChange={onInputChange}
            />
          </div>

            <div className="d-flex align-items-center gap-2 px-3 py-1 bg-light border rounded-pill shadow-xs">
              <small className="fw-bold text-muted text-uppercase" style={{ fontSize: '0.65rem' }}>Clase:</small>
              <select
                className="form-select form-select-sm bg-transparent border-0 p-0 shadow-none text-dark fw-medium"
                value={searchClase}
                onChange={handleClaseChange}
                style={{ width: '120px' }}
              >
                <option value="">Todas</option>
                <option value="0">Simple</option>
                <option value="1">Compleja</option>
                <option value="2">Módulo</option>
                <option value="3">Texto</option>
                <option value="4">Compuesto</option>
              </select>
            </div>

            <button className="btn btn-sm btn-light border rounded-pill px-3 d-flex align-items-center gap-2 text-muted ms-auto" onClick={() => fetchPracticas(searchTerm, searchClase)}>
            <FaSync size={12} className={loading ? 'fa-spin' : ''} /> <small className="fw-bold text-uppercase">Actualizar</small>
          </button>
        </div>
      </div>

      <div className="flex-grow-1 shadow-sm rounded-3 overflow-hidden border bg-white mb-3" style={{ minHeight: '500px' }}>
        {loading ? (
          <LoadingSpinner message="Buscando Prácticas..." />
        ) : isMobile ? (
          <div className="p-3" style={{ maxHeight: '70vh', overflowY: 'auto' }}>
            {practicas.length === 0 && (
              <div className="text-center text-muted py-5">No se encontraron prácticas</div>
            )}
            <div className="d-flex flex-column gap-3">
              {practicas.map((p, idx) => (
                <div key={idx} className="card shadow-sm border-0" style={{ borderRadius: '12px' }}>
                  <div className="card-body p-3">
                    <div className="d-flex justify-content-between align-items-start mb-2">
                      <div>
                        <span className="badge bg-primary rounded-pill px-3">{p.cod_practica}</span>
                        <span className="badge bg-secondary rounded-pill px-2 ms-2">{p.clase_texto}</span>
                      </div>
                      <div className="btn-group">
                        <button className="btn btn-sm btn-link text-primary p-1" onClick={() => handleEditPractica(p)}>
                          <FaEdit size={18} />
                        </button>
                        <button className="btn btn-sm btn-link text-danger p-1" onClick={() => handleDeletePractica(p)}>
                          <FaTrash size={18} />
                        </button>
                      </div>
                    </div>
                    <h6 className="card-title fw-bold mb-2 text-dark">{p.practica}</h6>
                    <div className="small text-muted">
                      {p.metodo && <div><strong>Método:</strong> {p.metodo}</div>}
                      {p.unidad && <div><strong>Unidad:</strong> {p.unidad}</div>}
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        ) : (
          <div className="w-100 shadow-sm border rounded position-relative" style={{ height: '550px' }}>
            <AgGridReact
              rowData={practicas}
              columnDefs={columnDefs}
              defaultColDef={defaultColDef}
              loadingOverlayComponent={null}
              pagination={true}
              paginationPageSize={50}
              paginationPageSizeSelector={[20, 50, 100]}
              animateRows={true}
              overlayNoRowsTemplate="<span className='text-muted'>No se encontraron prácticas para este filtro.</span>"
            />
          </div>
        )}
      </div>

      {showConvenioModal && selectedPractica && (
        <ConvenioPracticaModal
          codPractica={selectedPractica.cod_practica}
          nroOs={selectedPractica.nro_os}
          practicaNombre={selectedPractica.practica}
          visible={showConvenioModal}
          onClose={() => setShowConvenioModal(false)}
          onSave={() => fetchPracticas(searchTerm, searchClase)}
        />
      )}

      {showNuevaPracticaModal && (
        <NuevaPracticaModal
          visible={showNuevaPracticaModal}
          onClose={() => setShowNuevaPracticaModal(false)}
          onSave={() => fetchPracticas(searchTerm, searchClase)}
        />
      )}
    </div>
  );
};

export default PracticaList;
