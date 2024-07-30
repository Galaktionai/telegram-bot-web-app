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
              <li class="breadcrumb-item active">Продукты/Добавить продукт</li>
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

          <div class="card card-primary" style="padding: 0; max-width: 680px; width: 100%">
            <div class="card-header" style="">
              <h3 class="card-title">Редактирование</h3>
            </div>
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="">Наименование</label>
                  <input type="text" name="title" class="form-control" id="" placeholder="Наименование">
                </div>

                <span>Публичная картинка</span>
                <div class="form-group">
                  <div class="input-group">
                    <div class="custom-file">
                      <input name="preview_image" type="file" id="publicImgProduct"  onchange="myFunction()" class="custom-file-input" id="">
                      <label class="custom-file-label" for="">Выберите изображение</label>
                    </div>
                  </div>
                </div>
                
                <span>Детальные картинки</span>
                <div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="product_images[]" type="file" class="custom-file-input" id="">
                        <label class="custom-file-label" for="">Выберите изображение</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="product_images[]" type="file" class="custom-file-input" id="">
                        <label class="custom-file-label" for="">Выберите изображение</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="product_images[]" type="file" class="custom-file-input" id="">
                        <label class="custom-file-label" for="">Выберите изображение</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="product_images[]" type="file" class="custom-file-input" id="">
                        <label class="custom-file-label" for="">Выберите изображение</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="">Информация</label>
                  <input type="text" name="info" class="form-control" id="" placeholder="Информация">
                </div>

                <div class="form-group">
                  <label for="">Вес</label>
                  <input type="text" name="weight" class="form-control" id="" placeholder="Вес">
                </div>

                <div class="form-group">
                  <label for="">Калории</label>
                  <input type="text" name="calories" class="form-control" id="" placeholder="Калории">
                </div>

                <div class="form-group">
                  <label for="">Белки</label>
                  <input type="text" name="squirrels" class="form-control" id="" placeholder="Белки">
                </div>

                <div class="form-group">
                  <label for="">Жиры</label>
                  <input type="text" name="fats" class="form-control" id="" placeholder="Жиры">
                </div>

                <div class="form-group">
                  <label for="">Углеводы</label>
                  <input type="text" name="carbohydrates" class="form-control" id="" placeholder="Углеводы">
                </div>

                <div class="form-group">
                  <label for="">Описание</label>
                  <textarea name="description" class="form-control" placeholder="Описание"></textarea>
                </div>

                <div class="form-group">
                  <label for="">Размер</label>
                  <input type="text" name="size" class="form-control" id="" placeholder="Размер">
                </div>

                <div class="form-group">
                  <label for="">Цена</label>
                  <input type="text" name="price" class="form-control" id="" placeholder="Цена">
                </div>

                <div class="form-check">
                  <input type="checkbox" name="is_published" value="1" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Публикация</label>
                </div>

                <div class="form-group">
                  <label for="">Категория</label>
                  <select name="category_id" class="form-control" style="width: 100%;">
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              
              <!-- <span>Публикация</span>
              <div class="form-group">
                <label for="published-no">
                  Нет
                  <input id="published-no" name="is_published" value="0" type="radio">
                </label>
                <label for="published-yes">
                  Да
                  <input id="published-yes" name="is_published" value="1" type="radio">
                </label>
              </div> -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection