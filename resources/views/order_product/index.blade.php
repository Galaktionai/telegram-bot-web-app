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
          <li class="breadcrumb-item active">Заказы</li>
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
            <a href="{{ route('order.create') }}" class="btn btn-primary">
              Добавить
            </a>
          </div>

          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Номер заказа</th>
                  <th>Адрес</th>
                  <th>Номер телефона</th>
                  <th>Итог. цена</th>
                  <th>Статус</th>
              </thead>
              <tbody>
                @foreach($order_products->reverse() as $order_product)
                {{$order_product->id}}
    
                @endforeach
              </tbody>
            </table>
            <div class="pagination_wrap">
              {!! $order_products->links('pagination::bootstrap-5') !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection