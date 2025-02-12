@extends('layouts.main')
@section('content')
    <x-header :header="$header = 'Пользователь ' . $data->name"/>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('users.edit', $data->id) }}" class="btn btn-primary">Редактировать</a>
                <a href="{{ route('users.destroy', $data->id) }}" class="btn btn-danger">Удалить</a>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <tbody>
                  <tr class="align-middle">
                    <td>ID</td>
                    <td>{{ $data->id }}</td>
                  </tr>
                  <tr class="align-middle">
                    <td>Имя</td>
                    <td>{{ $data->name }}</td>
                  </tr>
                  <tr class="align-middle">
                    <td>Фамилия</td>
                    <td>{{ $data->surname }}</td>
                  </tr>
                  <tr class="align-middle">
                    <td>Пол</td>
                    <td>{{ $data->gender }}</td>
                  </tr>
                  <tr class="align-middle">
                    <td>Email</td>
                    <td>{{ $data->email }}</td>
                  </tr>
                  <tr class="align-middle">
                    <td>Адрес</td>
                    <td>{{ $data->address }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
@endsection