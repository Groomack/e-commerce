@extends('layouts.main')
@section('content')
    <x-header :header="$header = 'Цвета'"/>
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
                    <th style="width: 10px">ID</th>
                    <th>Номер</th>
                    <th>Название</th>
                    <th class="text-center">Цвет</th>
                    <th class="text-center" colspan="2">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->name }}</td>
                        <td><span style="display: block; background-color: {{ $item->title }}; width: 25px; height: 25px; margin: auto"></span></td>
                        <td class="text-center"><a href="{{ route('colors.edit', $item->id) }}" title='Редактировать' class="text-primary"><i class="bi bi-pencil"></i></a></td>
                        <form action="{{ route('colors.destroy', $item->id) }}" method="post">
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
            {{ $data->links() }}
            </div>
        </div>
        <a class="btn btn-primary" href="{{ route('colors.create') }}">Добавить</a>
    </div>
@endsection