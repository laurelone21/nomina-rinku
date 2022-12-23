@extends('welcome')

@section('content')
    <div class="container w-50 border p-4 mt-5">
        <form action="{{ route('employees') }}" method="POST">
            @csrf
            @if ( session('success') )
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            @foreach ($errors->all() as $error)
                <h6 class="alert alert-danger">{{ $error }}</h6>
            @endforeach

            <div class="mb-1">
                <label for="employeeFirstName" class="form-label">Nombre: </label>
                <input type="text" class="form-control" name="employeeFirstName" id="employeeFirstName">
            </div>
            <div class="mb-1">
                <label for="employeeLastName" class="form-label">Paterno: </label>
                <input type="text" class="form-control" name="employeeLastName" id="employeeLastName">
            </div>
            <div class="mb-1">
                <label for="employeeLastNameMother" class="form-label">Materno: </label>
                <input type="text" class="form-control" name="employeeLastNameMother" id="employeeLastNameMother">
            </div>
            <div class="mb-1">
                <label for="employeePhone" class="form-label">Teléfono: </label>
                <input type="phone" class="form-control" name="employeePhone" id="employeePhone">
            </div>
            <div class="mb-1">
                <label for="employeeEmail" class="form-label">Email: </label>
                <input type="email" class="form-control" name="employeeEmail" id="employeeEmail">
            </div>
            <div class="mb-1">
                <label for="employeeRol" class="form-label">Rol: </label>
                <select id="employeeRol" name="employeeRol" class="form-select">
                    <option value="0" selected>Seleccionar...</option>
                    <option value="1">Chofer</option>
                    <option value="2">Cargador</option>
                    <option value="3">Auxiliar</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <div class="container w-75 border p-4 mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th>Rol</th>
                        <th>Nombre</th>
                        <th>Paterno</th>
                        <th>Materno</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <th scope="row">{{$employee->idEmployee}}</th>
                            <td>{{$employee->rol}}</td>
                            <td>{{$employee->firstName}}</td>
                            <td>{{$employee->lastName}}</td>
                            <td>{{$employee->lastNameMother}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>{{$employee->email}}</td>
                            <td>
                                <div class="col-md-9 d-flex align-items-center">
                                    <a href="{{ route('employee-edit', ['idEmployee' => $employee->idEmployee]) }}" class="btn btn-info btn-sm">Editar</a>
                                <div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection