@extends('layouts.main')
@section('content')
    <x-header :header="$header = 'Пользователи'"/>
    <div class="col-md-4">
        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession
        @session('updated')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession
        @session('deleted')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession
        
        <div class="card mb-4">
            <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Email</th>
                    <th class="text-center" colspan="3">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->email }}</td>
                        <td class="text-center"><a href="{{ route('users.show', $item->id) }}" title='Просмотр' class="text-primary"><i class="bi bi-eye"></i></a></td>
                        <td class="text-center"><a href="{{ route('users.edit', $item->id) }}" title='Редактировать' class="text-primary"><i class="bi bi-pencil"></i></a></td>
                        <form action="{{ route('users.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <td class="text-center"><button type="submit" title='Удалить' class="text-danger border-0 bg-transparent"><i class="bi bi-trash3"></i></a></td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-end">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
            </div>
        </div>
        <a class="btn btn-primary" href="{{ route('users.create') }}">Добавить</a>
    </div>
@endsection