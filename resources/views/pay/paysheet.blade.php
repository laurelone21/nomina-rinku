@extends('welcome')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/paysheet.js') }}" defer></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .alignDe{
            text-align: right;
        }
    </style>

    <div class="container w-50 border p4 mt-5">
        <form id="frmPaySheet" name="frmPaySheet" method="POST">
            <h4>Seleccione el mes para revisar el liquido a pagar</h4>
            @csrf
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
        </form>
    </div>
    <div class="container w75 border p4 mt-5" id="divTablePaySheet">
    </div>
@endsection