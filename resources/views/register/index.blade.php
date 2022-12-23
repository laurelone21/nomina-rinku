@extends('welcome')

@section('content')
    <div class="container w-50 border p-4 mt-5">
        <form action="{{ route('employees') }}" method="POST">
            @csrf
            @if ( session('success') )
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            @error('employeeFirstName')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-1">
                <label for="employeeFirstName" class="form-label">Nombre: </label>
                <input type="text" class="form-control" id="employeeFirstName">
            </div>
            <div class="mb-1">
                <label for="employeeLastName" class="form-label">Paterno: </label>
                <input type="text" class="form-control" id="employeeLastName">
            </div>
            <div class="mb-1">
                <label for="employeeLastNameMother" class="form-label">Materno: </label>
                <input type="text" class="form-control" id="employeeLasttNameMother">
            </div>
            <div class="mb-1">
                <label for="employeePhone" class="form-label">Teléfono: </label>
                <input type="phone" class="form-control" id="employeePhone">
            </div>
            <div class="mb-1">
                <label for="employeeEmail" class="form-label">Email: </label>
                <input type="email" class="form-control" id="employeeEmail">
            </div>
            <div class="mb-1">
                <label for="employeeRol" class="form-label">Rol: </label>
                <select id="employeeRol" class="form-select">
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
                        <th scope="col">Nombre</th>
                        <th scope="col">Paterno</th>
                        <th scope="col">Rol</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
@endsection