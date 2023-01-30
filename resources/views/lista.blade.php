{{--@vite(['resources/sass/app.scss'])--}}
{{--@vite(['resources/js/app.js'])--}}

{{--<h1>Reporte de Radiación</h1>--}}
<div class="table-responsive" style="height: 700px">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>v_cod_esta</th>
            <th>d_fecha_reg</th>
            <th>v_hora_reg</th>
            <th>n_radsolar</th>
            <th>n_energiasolar</th>
            <th>n_uvind</th>
            <th>n_uvmed</th>
            <th>n_tiins</th>
            <th>n_ptacu</th>
            <th>d_fecsys_local</th>
        </tr>
        </thead>
        <tbody>
        @foreach($datos as $p)

            <tr>
                <td>{{$p->v_cod_esta}}</td>
                <td>{{$p->d_fecha_reg}}</td>
                <td>{{$p->v_hora_reg}}</td>
                <td>{{$p->n_radsolar}}</td>
                <td>{{$p->n_energiasolar}}</td>
                <td>{{$p->n_uvind}}</td>
                <td>{{$p->n_uvmed}}</td>
                <td>{{$p->n_tiins}}</td>
                <td>{{$p->n_ptacu}}</td>
                <td>{{$p->d_fecsys_local}}</td>
            </tr>
        @endforeach



        </tbody>
    </table>
</div>
