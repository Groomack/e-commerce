@extends('layouts.main')
@section('content')
    <x-header :header="$header = 'Изменить пользователя'"/>
    <div class="col-md-4">
        <div class="card card-primary card-outline mb-4">
            <!--begin::Form-->
            <form action="{{ route('users.update', $data['user']->id) }}" method="post">
            @csrf
            @method('patch')
            <!--begin::Body-->
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input value="{{ old('name', $data['user']->name) }}" name="name" type="text" class="form-control" id="name" placeholder="Введите имя">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="surname" class="form-label">Фамилия</label>
                    <input value="{{ old('surname', $data['user']->surname) }}" name="surname" type="text" class="form-control" id="surname" placeholder="Введите фамилию">
                    @error('surname')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="gender" class="form-label">Пол</label>
                    <select name="gender" id="gender" class="form-select" aria-label="Default select example">
                        <option @selected(old('gender', $data['user']->gender) == '') value="">Выберете пол</option>
                        @foreach ($data['genders'] as $key => $value)
                            <option @selected(old('gender', $data['user']->gender) == $key) value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="form-group mb-3">
                    <label for="address" class="form-label">Адрес</label>
                    <input value="{{ old('address', $data['user']->address) }}" name="address" type="text" class="form-control" id="address" placeholder="Адрес проживания">
                    @error('address')
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