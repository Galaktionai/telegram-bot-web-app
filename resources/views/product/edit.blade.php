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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <span>Наименование</span>
            <div class="form-group">
              <input type="text" name="title" value="{{ $product->title }}" class="form-control" placeholder="Наименование">
            </div>
            <span>Информация</span>
            <div class="form-group">
              <input type="text" name="info" value="{{ $product->title }}" class="form-control" placeholder="Информация">
            </div>
            <span>Вес</span>
            <div class="form-group">
              <input type="text" name="weight" value="{{ $product->title }}" class="form-control" placeholder="Вес">
            </div>
            <span>Калории</span>
            <div class="form-group">
              <input type="text" name="calories" value="{{ $product->title }}" class="form-control" placeholder="Калории">
            </div>
            <span>Белки</span>
            <div class="form-group">
              <input type="text" name="squirrels" value="{{ $product->info }}" class="form-control" placeholder="Белки">
            </div>
            <span>Жиры</span>
            <div class="form-group">
              <input type="text" name="fats" value="{{ $product->info }}" class="form-control" placeholder="Жиры">
            </div>
            <span>Углеводы</span>
            <div class="form-group">
              <input type="text" name="carbohydrates" value="{{ $product->info }}" class="form-control" placeholder="Углеводы">
            </div>
            <span>Описание</span>
            <div class="form-group">
              <textarea name="description" value="{{ $product->description }}" class="form-control" placeholder="Описание"></textarea>
            </div>
            <span>Размер</span>
            <div class="form-group">
              <input type="text" value="{{ $product->size }}" class="form-control" name="size" placeholder="Размер"></input>
            </div>
            <span>Публичная картинка</span>
            <div class="form-group">
              <div class="input-group">
                <div class="custom-file">
                  <input name="preview_image" value="{{ $product->preview_image }}" type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                </div>
              </div>
            </div>
            <span>Детальные картинки</span>
            <div class="form-group">
              <input type="text" value="{{ $product->detail_images }}" name="detail_images" class="form-control" placeholder="Детальные картинки">
            </div>
            <span>Цена</span>
            <div class="form-group">
              <input type="number" value="{{ $product->price }}" name="price" class="form-control" placeholder="Цена">
            </div>
            <!-- <span>Количество</span>
            <div class="form-group">
              <input type="number" name="count" class="form-control" placeholder="Количество">
            </div> -->
            <span>Публикация</span>
            <div class="form-group">
              <label for="published-no">
                Нет
                <input id="published-no" name="is_published" value="0" type="radio">
              </label>
              <label for="published-yes">
                Да
                <input id="published-yes" name="is_published" value="1" type="radio">
              </label>
            </div>
            <span>Категория</span>
            <div class="form-group">
              <select name="category_id" class="" style="width: 100%;">
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <input type="submit" class="btn-primary btn" value="Добавить">
            </div>
          </form>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection