@extends('layouts.public')
@section('content')
    <div class="container px-4 px-lg-5 mt-5">
        <div class="card mb-5">
            <div class="card-body">
                <form action="{{ route('index') }}" method="GET" class="d-flex">
                    <div class="form-group me-3">
                        <select name="category" class="form-select" aria-label="Default select example">
                            <option value="">Категория</option>
                            @foreach ($data['categories'] as $item)
                                <option 
                                @isset($_GET['category'])
                                    @selected($_GET['category'] == $item->id)
                                @endisset 
                                value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group me-3">
                        <select name="sort" class="form-select" aria-label="Default select example">
                            <option value="">Сортировать</option>
                            <option 
                            @isset($_GET['sort'])
                                @selected($_GET['sort'] == 1)
                            @endisset value="1">По убыванию цены</option>
                            <option 
                            @isset($_GET['sort'])
                                @selected($_GET['sort'] == 2)
                            @endisset value="2">По возрастанию цены</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Применить</button>
                </form>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
            @foreach ($data['products'] as $item)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $item->title }}</h5>
                                <!-- Product price-->
                                {{ $item->price }} тг
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('addtocart', $item->id) }}">В корзину</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $data['products']->appends(request()->query())->links('public.pagination') }}
    </div>
@endsection