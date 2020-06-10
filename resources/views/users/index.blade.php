@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            <h1>Clientes</h1>
            <a href="{{Route('client.create')}}" class="btn btn-primary">Añadir</a>
        </div>
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> {{currentuser()->role()->name ?? 'No tiene rol asignado'}}</a></td>

                        <td>
                            <form action="{{Route('user.selectRole')}}" method="POST">
                                @csrf
                                @method('get')

                                <select class="rolename" name="id">
                                    <option selected>Elige rol</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>

                                <input type="submit" value="Elegir rol" class = "btn btn-primary">
                            </form>
                        </td>
                        <td><a href="{{Route('user.liberateRole'}}" class="btn btn-secondary">Quitar rol</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div>
        </div>
@endsection
