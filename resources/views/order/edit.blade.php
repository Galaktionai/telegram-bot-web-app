@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Заказы</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Заказы/{{ $order->id }}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">

  <div class="">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="invoice p-3 mb-3">

            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> Номер заказа {{ $order->id }}
                  <small class="float-right">Дата: {{ $order->created_at }}</small>
                </h4>
              </div>

            </div>

            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <strong>Клиент</strong>
                <form action="{{ route('order.update', $order->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <address>
                    <input class="form-control" name="full_name" type="text" value="{{ $order->full_name }}" placeholder="ФИО"><br>
                    <!-- <input class="form-control" name="name" type="text" value="{{ $order->name }}" placeholder="Telegram ник"><br> -->
                    <input class="form-control" name="phone_number" type="text" value="{{ $order->phone_number }}" placeholder="Номер телефона"><br>
                  </address>
                  <button type="submit" class="btn btn-warning">Добавить</button>
                </form>
              </div>

              <div class="col-sm-4 invoice-col">
                <strong>Заказ</strong>
                <form action="{{ route('order.update', $order->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <address>
                    <input class="form-control" name="address" type="text" value="{{ $order->address }}" placeholder="Адрес"><br>
                    <input class="form-control" name="entrance" type="text" value="{{ $order->entrance }}" placeholder="Подъезд"><br>
                    <input class="form-control" name="apartment" type="text" value="{{ $order->apartment }}" placeholder="Квартира"><br>
                    <input class="form-control" name="info" type="text" value="{{ $order->info }}" placeholder="Комментарий"><br>
                    <input class="form-control" name="discount" type="text" value="{{ $order->discount }}" placeholder="Скидка"><br>
                    <input class="form-control" name="delivery_price" type="text" value="{{ $order->delivery_price }}" placeholder="Доставка"><br>
                    <input class="form-control" name="all_price" type="text" value="{{ $order->all_price }}" placeholder="Итог. цена">
                  </address>
                  <button type="submit" class="btn btn-warning">Добавить</button>
                </form>
              </div>
            </div>

            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Изображение</th>
                      <th>Название</th>
                      <th>Цена</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                      <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                          <img class="product_image_admin_order" src="{{ url('storage/' . $product->preview_image) }}" alt="">
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{ route('product.show', $product->id) }}">
                            <i class="fas fa-folder">
                            </i>
                            Открыть
                          </a>
                          <form action="{{ route('order_product.delete', $product->id) }}" method="post" class="btn btn-danger btn-sm" style="margin-right: 5px;">
                            @csrf
                            @method('delete')
                            <i class="fas fa-trash"></i>
                            <input style="background: 0; outline: 0; border: 0; margin: 0; color: white; padding: 0;" type="submit" value="Удалить товар с заказа">
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection