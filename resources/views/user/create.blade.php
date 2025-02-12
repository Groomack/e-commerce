@extends('layouts.main')
@section('content')
    <x-header :header="$header = 'Добавить пользователя'"/>
    <div class="col-md-4">
        <div class="card card-primary card-outline mb-4">
            <!--begin::Form-->
            <form action="{{ route('users.store') }}" method="post">
            @csrf
            <!--begin::Body-->
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input value="{{ old('name') }}" name="name" type="text" class="form-control" id="name" placeholder="Введите имя">
                    @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="surname" class="form-label">Фамилия</label>
                    <input value="{{ old('surname') }}" name="surname" type="text" class="form-control" id="surname" placeholder="Введите фамилию">
                    @error('surname')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="gender" class="form-label">Пол</label>
                    <select name="gender" id="gender" class="form-select" aria-label="Default select example">
                        <option @selected(old('gender') == "") value="">Выберете пол</option>
                        @foreach ($genders as $key => $value)
                            <option @selected(old('gender') == "$key") value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ old('email') }}" name="email" type="text" class="form-control" id="email" placeholder="example@mail.com">
                    @error('email')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="address" class="form-label">Адрес</label>
                    <input value="{{ old('address') }}" name="address" type="text" class="form-control" id="address" placeholder="Адрес проживания">
                    @error('address')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Придумайте пароль">
                    @error('password')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Подтвердите пароль">
                    @error('password_confirmation')
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