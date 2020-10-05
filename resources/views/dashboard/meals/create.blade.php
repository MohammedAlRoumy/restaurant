@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">الوجبات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="#">الوجبات</a></li>
                        <li class="breadcrumb-item active">إضافة</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title" style="float: right;">إضافة وجبة</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @error('name')
            <span class="invalid-feedback" role="alert">
            </span>
            @enderror
            <form class="form-horizontal" method="post" action="{{route('dashboard.meals.store')}}"
                  enctype="multipart/form-data">
                @csrf
                @method('post')
                @include('dashboard.partials._errors')
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">اسم الوجبة</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="اسم الوجبة">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label" for="category_id">قائمة الطعام</label>
                        <div class="col-sm-10">
                    {{--        <select name="categories_id" class="form-control">
                                <option value="">اختر قائمة طعام</option>

                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>--}}

                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">اختر قائمة طعام</option>
                                @foreach (App\Category::all() as $category)
                                    <option @if($category->id == old('category_id')) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">سعر الوجبة </label>
                        <div class="col-sm-10">
                            <input type="number" name="price" min="0" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">وصف الوجبة</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">إضافة</button>
                    <a class="btn btn-default float-right" href="{{route('dashboard.meals.index')}}">إلغاء</a>
                </div>
                <!-- /.card-footer -->
            </form>


        </div>
        <!-- /.card -->

    </section>    <!-- /.content -->

@endsection
