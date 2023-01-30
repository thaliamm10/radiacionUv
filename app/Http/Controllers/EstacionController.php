<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EstacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function listaEstaciones()
    {
//        $cn = DB::select("SELECT SEMVD_RADUV_INST.v_cod_esta, SEMAP_ESTA.V_NOM_ESTA
//FROM SEMVD_RADUV_INST
//join SEMAP_ESTA on SEMVD_RADUV_INST.V_COD_ESTA=SEMAP_ESTA.V_COD_ESTA
//group by  SEMVD_RADUV_INST.V_COD_ESTA,SEMAP_ESTA.V_NOM_ESTA");

        $cn = DB::select("select v_cod_esta, v_nom_esta
                            from SEMAP_ESTA
                            where v_cod_esta in('112192','110137','114122','114124',
                                    '107130','109092','107129','114125','113245','112267',
                                    '111287','109091','114123','114127','112278','112233',
                                    '113247','112269','111286','114121','112268','111288',
                                    '112265','112266','113243','114119','114126','113248','113246')
                            order by 2 asc");


        return $cn;
    }
}
