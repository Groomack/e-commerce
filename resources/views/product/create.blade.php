@extends('layouts.main')
@section('content')
    <x-header :header="$header = 'Добавить товар'"/>
    <div class="col-md-4">
        <div class="card card-primary card-outline mb-4">
            <!--begin::Form-->
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!--begin::Body-->
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Наименование</label>
                    <input value="{{ old('title') }}" name="title" type="text" class="form-control" id="title" placeholder="Введите ниаменование товара">
                    @error('title')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea name="description" type="text" class="form-control" id="description" placeholder="Введите описание товара">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input value="{{ old('price') }}" name="price" type="text" class="form-control" id="price" placeholder="Введите цену">
                    @error('price')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="quantity" class="form-label">Колличество на складе</label>
                    <input value="{{ old('quantity') }}" name="quantity" type="text" class="form-control" id="quantity" placeholder="Введите колличество на складе">
                    @error('quantity')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="colors" class="form-label">Цвет <small>(зажмите ctrl чтобы выбрать несколько цветов)</small></label>
                    <select name="colors[]" multiple class="form-select">
                        @foreach ($data['colors'] as $item)
                            <option value="{{ $item->id }}" style="background-color: {{ $item->title }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="category_id" class="form-label">Категория</label>
                    <select name="category_id" class="form-select" id="category_id">
                        <option value="">Выберете категорию</option>
                        @foreach ($data['categories'] as $item)
                            <option @selected(old('category_id') == $item->id) value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Теги</label>
                    <select name="tags[]" class="form-select" id="tagsSelect" data-placeholder="Выберете теги" multiple>
                        @foreach ($data['tags'] as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="previewImage" class="form-label">Изображение</label>
                    <div class="input-group mb-3">
                        <input name="previewImage" type="file" class="form-control" id="previewImage">
                    </div>
                    @error('previewImage')
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
    <script>
        $(document).ready(function() {
            $('#tagsSelect').select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                closeOnSelect: true,
            });
        });
    </script>
@endsection