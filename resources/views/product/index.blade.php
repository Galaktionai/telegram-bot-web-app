@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Продукты</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Продукты</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('product.create') }}" class="btn btn-primary">
              Добавить
            </a>
          </div>

          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Изображение</th>
                  <th>Наименование</th>
                  <th>Цена</th>
                  <th>Публикация</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                  <tr>
                    <td>{{ $product->id }}</td>
                    <td><img src="storage/{{ $product->preview_image }}" alt=""></td>
                    <td><a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a></td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->is_published }}</td>
                    <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="{{ route('product.show', $product->id) }}">
                        <i class="fas fa-folder">
                        </i>
                        Открыть
                      </a>
                      <a class="btn btn-warning btn-sm" href="{{ route('product.edit', $product->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Редактировать
                      </a>
                      <form action="{{ route('product.delete', $product->id) }}" method="post" class="btn btn-danger btn-sm">
                        @csrf
                        @method('delete')
                        <i class="fas fa-trash">
                        </i>
                        <input style="background: 0; outline: 0; border: 0; margin: 0; color: white; padding: 0;" type="submit" value="Удалить">
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pagination_wrap">
              {!! $products->links('pagination::bootstrap-5') !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection