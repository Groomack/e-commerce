@extends('layouts.public')
  
@section('content')
<section class="h-100">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0">Корзина</h3>
          </div>
          @php
            $total = 0;
          @endphp
          @if(session()->get('cart'))
            @foreach (session()->get('cart') as $key => $item)
              <div class="card rounded-3 mb-4">
                  <div class="card-body p-4">
                  <div class="row d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                          src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                          class="img-fluid rounded-3" alt="Cotton T-shirt">
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3">
                      <p class="lead fw-normal mb-2">{{ $item['name'] }}</p>
                      <p><span class="text-muted">Color: </span> 
                          @foreach ($item['colors'] as $color)
                              {{ $color->name }}  
                          @endforeach</p>
                      </div>
                        <form action="{{ route('updatecart', $key) }}" method="GET" class="col-md-3 col-lg-3 col-xl-2 d-flex align-items-center">
                          <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="fas fa-minus"></i>
                          </button>
          
                          <input id="form1" min="0" name="quantity" value="{{ $item['quantity'] }}" type="number"
                              class="form-control form-control-sm" />
          
                          <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                              onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                              <i class="fas fa-plus"></i>
                          </button>
                          <button type="submit" class="border-0 bg-transparent"><i class="bi bi-arrow-repeat"></i></button>
                        </form>
                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h5 class="mb-0">{{ $item['price'] * $item['quantity'] }} тг</h5>
                      </div>
                      <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="{{ route('delete', $key) }}" class="text-danger"><i class="bi bi-trash"></i></a>
                      </div>
                  </div>
                  </div>
              </div>
              @php
                  $total += $item['price'] * $item['quantity'];
              @endphp
            @endforeach
          @else
            <div class="card rounded-3 mb-4">
              <div class="card-body p-4">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <p class="lead fw-normal mb-2">Корзина пуста</p>
                    </div>
                </div>
              </div>
            </div>  
          @endif
          <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <a href="{{ route('index') }}" class="btn btn-warning btn-block btn-lg">Продолжить покупки</a>
                @if(session()->get('cart'))
                  <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block btn-lg ms-2">К оплате</button>
                @endif
              </div>
              <p class="lead fw-normal mb-2">Итого: {{ $total }} тг</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection