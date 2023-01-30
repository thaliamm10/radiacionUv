<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class radiacionUvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cn = DB::select("SELECT * FROM SEMVD_RADUV_INST WHERE V_COD_ESTA='112278'");
//        $cn = DB::select("SELECT * FROM SEMVD_RADUV_INST WHERE V_COD_ESTA=$codigo");

        return ['datos' => $cn];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        //
//    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function showRadiacion(Request $request)
    {
//        public function showRadiacion($codigo, $fecha1,$fecha2)
//    {
//        print $request;
        $codigo = $request['codigo'];
        $fecha1 = $request['fecha1'];
        $fecha2 = $request['fecha2'];

        $datos = DB::select("SELECT v_cod_esta,
                                   d_fecha_reg,
                                   v_hora_reg,n_radsolar,
                                   n_energiasolar,
                                   n_uvind,
                                   n_uvmed,
                                   n_tiins,
                                   n_ptacu,
                                   d_fecsys_local
                            FROM SEMVD_RADUV_INST WHERE V_COD_ESTA='$codigo'
                                                    and TO_DATE(TO_CHAR(D_FECHA_REG,'DD/MM/YYYY')||' '||V_HORA_REG,'DD/MM/YYYY HH24:MI:SS') between
                                                        TO_DATE(REPLACE('$fecha1','T',' '),'YYYY-MM-DD HH24:MI:SS')
                                                        and TO_DATE(REPLACE('$fecha2','T',' '),'YYYY-MM-DD HH24:MI:SS')");
        return $datos;
//        return view('welcome', ['datos' => $datos]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, $id)
//    {
//        //
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        //
//    }
}
