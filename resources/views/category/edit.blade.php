@extends('layouts.main')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактировать категорию</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Категории</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="d-flex justify-content-center">

          <div class="card card-warning" style="padding: 0; max-width: 680px; width: 100%">
            <div class="card-header" style="">
              <h3 class="card-title">Редактирование</h3>
            </div>
            <form action="{{ route('category.update', $category->id) }}" method="post">
              @csrf
              @method('patch')
              <div class="card-body">
                <div class="form-group">
                  <label for="">Наименование</label>
                  <input type="text" name="title" value="{{ $category->title }}" class="form-control" id="" placeholder="Наименование">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-warning">Добавить</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection