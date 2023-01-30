<!doctype html>
<html>
<head>
    @vite(['resources/sass/app.scss'])
    @vite(['resources/js/app.js'])
</head>
<body>

{{--{{ Form::open(array('url' => '/showRadiacion/', 'method' => 'GET')) }}--}}
{{--<div class="row">--}}
{{--    <h1>Reporte de maestra</h1>--}}
{{--    <div class="col-3">--}}
{{--        <input class="form-control" type="text" name="codigo" placeholder="Ingrese le código">--}}
{{--    </div>--}}
{{--    <div class="col-3">--}}
{{--        <input class="form-control" type="date" name="fecha1" placeholder="Fecha de inicio">--}}
{{--    </div>--}}
{{--    <div class="col-3">--}}
{{--        <input class="form-control" type="date" name="fecha2" placeholder="Fecha fin">--}}
{{--    </div>--}}
{{--    <div class="col-3">--}}
{{--        <button type="submit" class="btn btn-primary">Consultar</button>--}}
{{--    </div>--}}
{{--</div>--}}
{{--{{ Form::close() }}--}}

<div id="root"></div>

{{--{{ $lisa }}--}}

</body>
</html>
