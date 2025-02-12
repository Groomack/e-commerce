@extends('layouts.main')
@section('content')
    <x-header :header="$header = 'Добавить тег'"/>
    <div class="col-md-4">
        <div class="card card-primary card-outline mb-4">
            <!--begin::Form-->
            <form action="{{ route('tags.store') }}" method="post">
            @csrf
            <!--begin::Body-->
            <div class="card-body">
                <div class="mb-3">
                <label for="title" class="form-label">Название тега</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Введите название тега">
                @error('title')
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