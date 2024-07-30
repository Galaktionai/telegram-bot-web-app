@extends('layouts.main')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Редактирование</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Пользователи/Редактирование</li>
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
    <div class="d-flex justify-content-center">

      <div class="card card-warning" style="padding: 0; max-width: 680px; width: 100%">
        <div class="card-header" style="">
          <h3 class="card-title">Редактирование</h3>
        </div>
        <form action="{{ route('user.update', $user->id) }}" method="post">
          @csrf
          @method('patch')
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Имя пользователя</label>
              <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Имя</label>
              <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Фамилия</label>
              <input type="text" name="last_name" value="{{ $user->first_name }}" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Номер телефона</label>
              <input type="text" name="number_phone" value="{{ $user->number_phone }}" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Адрес</label>
              <input type="text" name="address" value="{{ $user->address }}" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Подъезд</label>
              <input type="text" name="entrance" value="{{ $user->entrance }}" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Квартира</label>
              <input type="text" name="apartment" value="{{ $user->apartment }}" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-warning">Редактировать</button>
          </div>
        </form>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection