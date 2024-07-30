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
                  <th>ID</th>
                  <th>Наименование</th>
                  <th>Адрес</th>
                  <th>Номер телефона</th>
                  <th>Итог. цена</th>
              </thead>
              <tbody>
                @foreach($orders as $order)
                  <tr>
                    <td>{{ $order->id }}</td>
                    <td><a href="{{ route('order.show', $order->id) }}">{{ $order->name }}</a></td>
                    <td>{{ $order->phone_number }}</td>
                    <td>{{ $order->all_price }}</td>
                    <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="{{ route('order.show', $order->id) }}">
                        <i class="fas fa-folder">
                        </i>
                        Открыть
                      </a>
                      <a class="btn btn-warning btn-sm" href="{{ route('order.edit', $order->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Редактировать
                      </a>
                      <form action="{{ route('order.delete', $order->id) }}" method="post" class="btn btn-danger btn-sm">
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
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection