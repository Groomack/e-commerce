@extends('layouts.main')
@section('content')
    <x-header :header="$header = 'Добавить товар'"/>
    <div class="col-md-4">
        <div class="card card-primary card-outline mb-4">
            <!--begin::Form-->
            <form action="#" method="post">
            @csrf
            <!--begin::Body-->
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Наименование</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Введите ниаменование товара">
                    @error('title')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea name="description" type="text" class="form-control" id="description" placeholder="Введите описание товара"></textarea>
                    @error('description')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input name="price" type="number" class="form-control" id="price" placeholder="Введите цену">
                    @error('price')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="quantity" class="form-label">Колличество на складе</label>
                    <input name="quantity" type="number" class="form-control" id="quantity" placeholder="Введите колличество на складе">
                    @error('quantity')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="colors" class="form-label">Цвет (можно выбрать несколько)</label>
                    <select class="form-select" id="colorsSelect" data-placeholder="Choose anything" multiple>
                        <option>Christmas Island</option>
                        <option>South Sudan</option>
                        <option>Jamaica</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="categody_id" class="form-label">Категория</label>
                    <select name="categody_id" class="form-select" id="categody_id">
                        <option value="">Choose...</option>
                        <option>random</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Теги</label>
                    <select class="form-select" id="tagsSelect" data-placeholder="Choose anything" multiple>
                        <option>Christmas Island</option>
                        <option>South Sudan</option>
                        <option>Jamaica</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="previewImage" class="form-label">Изображение</label>
                    <div class="input-group mb-3">
                        <input name="previewImage" type="file" class="form-control" id="previewImage">
                    </div>
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
    <script>
        $(document).ready(function() {
            $('#tagsSelect').select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                closeOnSelect: true,
            });
            $('#colorsSelect').select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                closeOnSelect: true,
            });
            
        });
    </script>
@endsection