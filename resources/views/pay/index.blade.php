@extends('welcome')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/pay.js') }}" defer></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <div class="container w-50 border p4 mt-5">
        <form id="frmTempPays" name="frmTempPays" method="POST">
            <h4>Carga de Movimientos</h4>
            @csrf
            <div id="msj">
            @if ( session('success') )
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            </div>
            @foreach ($errors->all() as $error)
                <h6 class="alert alert-danger">{{ $error }}</h6>
            @endforeach

            <div class="mb-1">
                <label for="payMonth" class="form-label">Mes: </label>
                <select id="payMonth" name="payMonth" class="form-select">
                    <option value="0" selected>Seleccionar...</option>
                    @foreach ($months as $month)
                        <option value="{{$month->idMonth}}">{{$month->month}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-1" id="divEmployee">
                <label for="payEmployee" class="form-label">Empleado: </label>
                <select id="payEmployee" name="payEmployee" class="form-select">
                    <option value="0" selected>Seleccionar...</option>
                </select>
            </div>
            <div class="mb-1">
                <label for="payDeliveries" class="form-label">Cantidad de entregas: </label>
                <input type="number" class="form-control" name="payDeliveries" id="payDeliveries">
            </div>
            <div class="mb-1">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
    </div>
    <div class="container w-75 pt-5 pb-1" name="formPay" id="formPay" style="visibility: hidden;text-align: end;">
        <form action="{{ route('pays') }}" method="POST">
            @csrf
            <input type="hidden" name="valueMonth" id="valueMonth" value="0">
            <button type='submit' class='btn btn-primary'>Calcular nómina</button>
        </form>
    </div>
    <div class="container w75 border pt-4 pb-1" id="divTableTmpPays">
    </div>
@endsection