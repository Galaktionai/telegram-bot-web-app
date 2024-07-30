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
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('user.create') }}" class="btn btn-primary">
              Добавить
            </a>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Имя пользователя</th>
                  <th>telegram_id</th>
                  <th>Имя</th>
                  <th>Фамилия</th>
                  <th>Номер телефона</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->telegram_id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->number_phone }}</td>
                    <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="{{ route('user.show', $user->id) }}">
                        <i class="fas fa-folder">
                        </i>
                        Открыть
                      </a>
                      <a class="btn btn-warning btn-sm" href="{{ route('user.edit', $user->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Редактировать
                      </a>
                      <form action="{{ route('user.delete', $user->id) }}" method="post" class="btn btn-danger btn-sm">
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