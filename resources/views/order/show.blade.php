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
                <address>
                  ФИО: {{ $order->full_name }}<br>
                  Telegram ник: {{ $order->name }}<br>
                  Номер телефона: {{ $order->phone_number }}<br>
                </address>
              </div>

              <div class="col-sm-4 invoice-col">
                <strong>Заказ</strong>
                <address>
                  Номер заказа: {{ $order->id }}<br>
                  Статус: {{ $order->status }}<br>
                  Адрес: {{ $order->address }}<br>
                  Подъезд: {{ $order->entrance }}<br>
                  Квартира: {{ $order->apartment }}<br>
                  Комментарий: {{ $order->info }}<br>
                  Скидка: {{ $order->discount }}<br>
                  Доставка: {{ $order->delivery_price }}<br>
                  Итог. цена: {{ $order->all_price }}
                </address>
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
                    @foreach($order_products->reverse() as $product)
                      <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                          <img class="product_image_admin_order" src="{{ $product->preview_image }}" alt="">
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{ route('product.show', $product->id) }}">
                            <i class="fas fa-folder">
                            </i>
                            Открыть
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>



            <div class="row no-print">
              <div class="col-12">
                <a href="{{ route('order.edit', $order->id) }}" type="button" class="btn btn-warning float-right">
                <i class="fas fa-pencil-alt"></i>
                  Редактировать заказ
                </a>
                <form action="{{ route('order.delete', $order->id) }}" method="post" class="btn btn-danger float-right" style="margin-right: 5px;">
                  @csrf
                  @method('delete')
                  <i class="fas fa-trash"></i>
                  <input style="background: 0; outline: 0; border: 0; margin: 0; color: white; padding: 0;" type="submit" value="Удалить заказ">
                </form>

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection