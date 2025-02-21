@extends('layouts.main')
@section('content')
    <x-header :header="$header = 'Редактировать цвет'"/>
    <div class="col-md-4">
        <div class="card card-primary card-outline mb-4">
            <!--begin::Form-->
            <form action="{{ route('colors.update', $data->id) }}" method="post">
            @csrf
            @method('patch')
            <!--begin::Body-->
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Нажмите чтобы выбрать цвет</label>
                    <input name="title" type="color" class="form-control form-control-color" value="{{ old('title', $data->title) }}">
                    @error('title')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Название цвета</label>
                    <input name="name" type="text" class="form-control" value="{{ old('name', $data->name) }}">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Подтвердить</button>
            </div>
            <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
@endsection