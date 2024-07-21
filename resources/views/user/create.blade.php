@extends('layouts.main')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавить пользователя</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Пользователи</li>
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
          <form action="{{ route('user.store') }}" method="post">
            @csrf

            <div class="form-group">
              <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Name">
            </div>

            <div class="form-group">
              <input type="text" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email">
            </div>

            <div class="form-group">
              <input type="text" value="{{ old('password') }}" name="password" class="form-control" placeholder="Пароль">
            </div>

            <div class="form-group">
              <input type="text" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control" placeholder="Повторите пароль">
            </div>

            <div class="form-group">
              <input type="text" value="{{ old('telegram_id') }}" name="telegram_id" class="form-control" placeholder="telegram_id">
            </div>

            <div class="form-group">
              <input type="text" value="{{ old('address') }}" name="address" class="form-control" placeholder="Адрес">
            </div>

            <div class="form-group">
              <input type="text" value="{{ old('entrance') }}" name="entrance" class="form-control" placeholder="Подъезд">
            </div>

            <div class="form-group">
              <input type="text" value="{{ old('apartment') }}" name="apartment" class="form-control" placeholder="Квартира">
            </div>

            <div class="form-group">
              <input type="submit" class="btn-primary btn" value="Добавить">
            </div>
          </form>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection