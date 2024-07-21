@extends('layouts.main')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавить продукт</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Продукты</li>
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
          <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <span>Наименование</span>
            <div class="form-group">
              <input type="text" name="title" class="form-control" placeholder="Наименование">
            </div>
            <span>Информация</span>
            <div class="form-group">
              <input type="text" name="info" class="form-control" placeholder="Информация">
            </div>
            <span>Вес</span>
            <div class="form-group">
              <input type="text" name="weight" class="form-control" placeholder="Вес">
            </div>
            <span>Калории</span>
            <div class="form-group">
              <input type="text" name="calories" class="form-control" placeholder="Калории">
            </div>
            <span>Белки</span>
            <div class="form-group">
              <input type="text" name="squirrels" class="form-control" placeholder="Белки">
            </div>
            <span>Жиры</span>
            <div class="form-group">
              <input type="text" name="fats" class="form-control" placeholder="Жиры">
            </div>
            <span>Углеводы</span>
            <div class="form-group">
              <input type="text" name="carbohydrates" class="form-control" placeholder="Углеводы">
            </div>
            <span>Описание</span>
            <div class="form-group">
              <textarea name="description" class="form-control" placeholder="Описание"></textarea>
            </div>
            <span>Размер</span>
            <div class="form-group">
              <input type="text" class="form-control" name="size" placeholder="Размер"></input>
            </div>
            <span>Публичная картинка</span>
            <div class="form-group">
              <div class="input-group">
                <div class="custom-file">
                  <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                </div>
              </div>
            </div>
            <span>Детальные картинки</span>
            <!-- <div class="form-group">
              <input type="text" name="detail_images" class="form-control" placeholder="Детальные картинки">
            </div> -->
            <div class="form-group">
              <div class="input-group">
                <div class="custom-file">
                  <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <div class="custom-file">
                  <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <div class="custom-file">
                  <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                </div>
              </div>
            </div>
            <span>Цена</span>
            <div class="form-group">
              <input type="number" name="price" class="form-control" placeholder="Цена">
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