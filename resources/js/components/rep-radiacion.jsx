import React, {useEffect, useRef, useState} from 'react';
import {createRoot} from 'react-dom/client'
import {useFormik} from 'formik';
import UseGetLista from "../hooks/useGetLista";
import {rutasService} from "../services";
import moment from 'moment/moment';
import {useDownloadExcel} from 'react-export-table-to-excel';

export default function App() {
    const {listarRep} = UseGetLista();

    const [filtros, setFiltros] = useState({
        codigo: '',
        fecha1: '',
        fecha2: ''
    })
    const [datos, setDatos] = useState([])
    const [estaciones, setEstaciones] = useState([])

    const formik = useFormik({
        enableReinitialize: true, // Para que se reinicie el formulario con los valores iniciales que vienen del estado.
        initialValues: filtros,
        onSubmit: values => {
            handleShow(values);
        },
    });

    const handleShow = values => {
        rutasService.listarDatos(values).then(res => {
            setDatos(res);
        })
    }

    const listarEstaciones = () => {
        rutasService.listarEstaciones().then(res => {
            setEstaciones(res)
        })
    }
    const tableRef = useRef(null);
    const {onDownload} = useDownloadExcel({
        currentTableRef: tableRef.current,
        filename: 'Reporte de radiación',
        sheet: 'Reporte'
    })

    useEffect(() => {
        listarEstaciones();
    }, [])

    return (
        <>
            <div className="row">
                <form>
                    <div className="row">
                        <h3>Reportes de radiación</h3>
                        <div class="col-3">
                            <select className="form-select"
                                    name='codigo'
                                    onChange={formik.handleChange}
                                    value={formik.values.codigo}
                                    aria-label="Default select example">
                                <option selected>Seleccione...</option>
                                {estaciones.map(row => {
                                    return (
                                        <option value={row.v_cod_esta}>{row.v_cod_esta + '-' + row.v_nom_esta}</option>
                                    )
                                })}
                            </select>
                            {/*<input class="form-control"*/}
                            {/*       type="text"*/}
                            {/*       name="codigo"*/}
                            {/*       onChange={formik.handleChange}*/}
                            {/*       value={formik.values.codigo}*/}
                            {/*       placeholder="Ingrese le código"/>*/}
                        </div>
                        <div class="col-3">
                            <input
                                class="form-control"
                                type={'datetime-local'}
                                name="fecha1"
                                onChange={formik.handleChange}
                                value={formik.values.fecha1}
                                placeholder="Fecha de inicio"/>
                        </div>
                        <div class="col-3">
                            <input
                                class="form-control"
                                type={'datetime-local'}
                                name="fecha2"
                                onChange={formik.handleChange}
                                value={formik.values.fecha2}
                                placeholder="Fecha fin"/>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary"
                                    onClick={formik.handleSubmit}
                            >Consultar
                            </button>
                        </div>
                    </div>
                    <br/>
                </form>
                <div>
                    <button className={'btn btn-success'} onClick={onDownload}> Exportar</button>

                </div>
                <div className="table-responsive" id="table">
                    <table className="table table-bordered" ref={tableRef}>
                        <thead>
                        <tr>
                            <th>Código estación</th>
                            <th>Fecha de registro</th>
                            <th>Hora de registro</th>
                            <th>Radiación solar</th>
                            <th>Energía Solar</th>
                            <th>uvind</th>
                            <th>uvmed</th>
                            <th>tiins</th>
                            <th>ptacu</th>
                            <th>Fecha del Sistema</th>
                        </tr>
                        </thead>
                        <tbody>
                        {datos.map(row => {
                            return (
                                <tr>
                                    <td>{row?.v_cod_esta ?? ''}</td>
                                    <td>{row?.d_fecha_reg ? moment(row?.d_fecha_reg).format('YYYY-MM-DD') : ''}</td>
                                    <td>{row?.v_hora_reg ?? ''}</td>
                                    <td>{row?.n_radsolar ?? ''}</td>
                                    <td>{row?.n_energiasolar ?? ''}</td>
                                    <td>{row?.n_uvind ?? ''}</td>
                                    <td>{row?.n_uvmed ?? ''}</td>
                                    <td>{row?.n_tiins ?? ''}</td>
                                    <td>{row?.n_ptacu ?? ''}</td>
                                    <td>{row?.d_fecsys_local ?? ''}</td>
                                </tr>
                            )
                        })}


                        </tbody>
                    </table>
                </div>


            </div>
        </>
    );
}

if (document.getElementById('root')) {
    createRoot(document.getElementById('root')).render(<App/>)
}
