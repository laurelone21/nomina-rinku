@extends('welcome')

@section('content')
    <div class="container w-50 border p-4 mt-5">
        @foreach ($employees as $employee)
         <form action="{{ route('employee-update', ['idEmployee' => $employee->idEmployee]) }}" method="POST">
            @method('PATCH')
            @csrf
            @if ( session('success') )
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            @foreach ($errors->all() as $error)
                <h6 class="alert alert-danger">{{ $error }}</h6>
            @endforeach

            <div class="mb-1">
                <label for="employeeFirstName" class="form-label">Nombre: </label>
                <input type="text" class="form-control" name="employeeFirstName" id="employeeFirstName" value="{{$employee->firstName}}">
            </div>
            <div class="mb-1">
                <label for="employeeLastName" class="form-label">Paterno: </label>
                <input type="text" class="form-control" name="employeeLastName" id="employeeLastName" value="{{$employee->lastName}}">
            </div>
            <div class="mb-1">
                <label for="employeeLastNameMother" class="form-label">Materno: </label>
                <input type="text" class="form-control" name="employeeLastNameMother" id="employeeLastNameMother" value="{{$employee->lastNameMother}}">
            </div>
            <div class="mb-1">
                <label for="employeePhone" class="form-label">Teléfono: </label>
                <input type="phone" class="form-control" name="employeePhone" id="employeePhone" value="{{$employee->phone}}">
            </div>
            <div class="mb-1">
                <label for="employeeEmail" class="form-label">Email: </label>
                <input type="email" class="form-control" name="employeeEmail" id="employeeEmail" value="{{$employee->email}}">
            </div>
            <div class="mb-1">
                <label for="employeeRol" class="form-label">Rol: </label>
                <select id="employeeRol" name="employeeRol" class="form-select">
                    <option value="0" selected>Seleccionar...</option>
                    <option value="1" {{old('employeeRol',$employee->idRoles)==1? 'selected':''}}>Chofer</option>
                    <option value="2" {{old('employeeRol',$employee->idRoles)==2? 'selected':''}}>Cargador</option>
                    <option value="3" {{old('employeeRol',$employee->idRoles)==3? 'selected':''}}>Auxiliar</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
        @endforeach
    </div>
@endsection