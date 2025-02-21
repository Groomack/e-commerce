@extends('layouts.main')
@section('content')
    <x-header :header="$header = 'Товар ' . $data['product']->title"/>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header d-flex">
                <a href="{{ route('products.edit', $data['product']->id) }}" class="btn btn-primary">Редактировать</a>
                <form class="ms-2" action="{{ route('products.destroy', $data['product']->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <tbody>
                  <tr class="align-middle">
                    <td>Изображение</td>
                    <td><img width="100rem" src="{{ Storage::url($data['product']->previewImage) }}" alt="{{ $data['product']->title }}"></td>
                  </tr>
                  <tr class="align-middle">
                    <td>ID</td>
                    <td>{{ $data['product']->id }}</td>
                  </tr>
                  <tr class="align-middle">
                    <td>Название</td>
                    <td>{{ $data['product']->title }}</td>
                  </tr>
                  <tr class="align-middle">
                    <td>Цена</td>
                    <td>{{ $data['product']->price }}</td>
                  </tr>
                  <tr class="align-middle">
                    <td>На складе</td>
                    <td>{{ $data['product']->quantity . ' шт' }}</td>
                  </tr>
                  <tr class="align-middle">
                    <td>Описание товара</td>
                    <td>{{ $data['product']->description }}</td>
                  </tr>
                  <tr class="align-middle">
                    <td>Статус</td>
                    <td 
                      @empty($data['product']->is_published)
                          class="text-danger"
                      @endempty 
                    >{{ $data['product']->is_published ? 'Опубликован' : 'Не опубликован' }}</td>
                  </tr>
                  <tr class="align-middle">
                    <td>Категория товара</td>
                    <td>{{ $data['product']->category?->title }}</td>
                  </tr>
                  <tr class="align-middle">
                    <td>Теги</td>
                    <td>
                      @foreach ($data['product']->tags as $item)
                          <span class="d-inline-block border p-2 mb-1">{{ $item->title }}</span>
                      @endforeach
                  </td>
                  <tr class="align-middle">
                    <td>Цвет</td>
                    <td>
                      @foreach ($data['product']->colors as $item)
                          <span style="background-color: {{ $item->title }}" class="d-inline-block border p-2 mb-1">{{ $item->name }}</span>
                      @endforeach
                  </td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
@endsection