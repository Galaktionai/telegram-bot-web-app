@extends('layouts.main')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Пользователи</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Пользователи/{{ $user->name }}</li>
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
          <div class="card card-primary card-outline d-flex col-12">
            <div class="d-flex">
              <div class="card-body box-profile col-3">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="https://masterpiecer-images.s3.yandex.net/36996fbf756411ee8dccf6c574779d3e:upscaled" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                <p class="text-muted text-center">{{ $user->first_name }}</p>
                <div>
                  <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-block"><b>Редактировать</b></a>
                  <form action="{{ route('user.delete', $user->id) }}" method="post">
                    @csrf
                    @method('delete')

                    <input style="margin-top: 4px; font-weight: bold;" type="submit" value="Удалить" class="btn btn-danger btn-block">
                  </form>
                </div>
              </div>
              <div class="col-9" style="margin-top: 1.25rem;">
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>ID</b> <span class="float-right">{{ $user->id }}</span>
                  </li>
                  <li class="list-group-item">
                    <b>Имя пользователя</b> <span class="float-right">{{ $user->name }}</span>
                  </li>
                  <li class="list-group-item">
                    <b>telegram_id</b> <span class="float-right">{{ $user->telegram_id }}</span>
                  </li>
                  <li class="list-group-item">
                    <b>Имя</b> <span class="float-right">{{ $user->first_name }}</span>
                  </li>
                  <li class="list-group-item">
                    <b>Фамилия</b> <span class="float-right">{{ $user->last_name }}</span>
                  </li>
                  <li class="list-group-item">
                    <b>Номер телефона</b> <span class="float-right">{{ $user->number_phone }}</span>
                  </li>
                  <li class="list-group-item">
                    <b>Адрес</b> <span class="float-right">{{ $user->address }}</span>
                  </li>
                  <li class="list-group-item">
                    <b>Подъезд</b> <span class="float-right">{{ $user->entrance }}</span>
                  </li>
                  <li class="list-group-item">
                    <b>Квартира</b> <span class="float-right">{{ $user->apartment }}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection