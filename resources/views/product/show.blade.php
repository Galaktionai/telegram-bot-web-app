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

<section class="content">

  <div class="card card-solid">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-6">
          <h3 class="d-inline-block d-sm-none">{{ $product->title }}</h3>
          <div class="col-12">
            <img src="storage/{{ $product->preview_image }}" class="product-image" alt="Product Image">
          </div>
          <div class="col-12 product-image-thumbs">
            <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
            <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
            <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
            <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
            <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
          </div>
        </div>
        <div class="col-12 col-sm-6">
          <span>ID: {{ $product->id }}</span>
          <h3 class="my-3">{{ $product->title }}</h3>
          <p>{{ $product->info }}</p>
          <span>Публикация: {{ $product->is_published }}</span>
          <hr>
          <div class="bg-gray py-2 px-3 mt-4">
            <h2 class="mb-0">
              {{ $product->price }} Р
            </h2>
            <!-- <h4 class="mt-0">
              <small>Ex Tax: $80.00 </small>
            </h4> -->
          </div>
          <div class="mt-4">
            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-lg btn-flat">
            <i class="fas fa-pencil-alt">
                        </i>
              Редактировать
            </a>
            <form action="{{ route('product.delete', $product->id) }}" method="post" class="btn btn-danger btn-lg btn-flat">
              @csrf
              @method('delete')
              <i class="fas fa-trash">
                        </i>
              <input style="padding: 0" type="submit" value="Удалить" class="btn btn-danger">
            </form>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <nav class="w-100">
          <div class="nav nav-tabs" id="product-tab" role="tablist">
            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab"
              aria-controls="product-desc" aria-selected="true">Описание</a>
            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab"
              aria-controls="product-comments" aria-selected="false">Характеристики</a>
            <!-- <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab"
              aria-controls="product-rating" aria-selected="false">Rating</a> -->
          </div>
        </nav>
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="tab-pane fade active show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
            {{ $product->description }}
          </div>
          <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
            <span>Цена: </span>{{ $product->price }}<br>
            <span>Категория: </span>{{ $product->category_id }}<br>
            <span>Вес: </span>{{ $product->weight }}<br>
            <span>Калории: </span>{{ $product->calories }}<br>
            <span>Белки: </span>{{ $product->squirrels }}<br>
            <span>Жиры: </span>{{ $product->fats }}<br>
            <span>Углеводы: </span>{{ $product->carbohydrates }}<br>
            <span>Количество: </span>{{ $product->count }}<br>
            <span>Размер: </span>{{ $product->size }}<br>
          </div>
          <!-- <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut
            ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue,
            id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut
            molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat.
            Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac
            molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo.
            Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien
            justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper.
            Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div> -->
        </div>
      </div>
    </div>

  </div>

</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex p-3">
            <div class="mr-2">
              <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">
                Редактировать
              </a>
            </div>
            <form action="{{ route('product.delete', $product->id) }}" method="post">
              @csrf
              @method('delete')

              <input type="submit" value="Удалить" class="btn btn-danger">
            </form>
          </div>

          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <tbody>
                <tr>
                  <td>ID</td>
                  <td>{{ $product->id }}</td>
                </tr>
                <tr>
                  <td>Наименование</td>
                  <td>{{ $product->title }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection