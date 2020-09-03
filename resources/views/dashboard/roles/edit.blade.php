@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">قائمة الطعام</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="#">قوائم الطعام</a></li>
                        <li class="breadcrumb-item active">تعديل</li>
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
                <h3 class="card-title" style="float: right;">تعديل قائمة</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @error('name')
            <span class="invalid-feedback" role="alert">
            </span>
            @enderror
            <form class="form-horizontal" method="put" action="{{route('dashboard.categories.update',$category->id)}}">
                @csrf
                @method('put')
                @include('dashboard.partials._errors')
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">قائمة الطعام</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" placeholder="أسم قائمة الطعام">
                        </div>
                    </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">تعديل</button>
                    <a class="btn btn-default float-right" href="{{route('dashboard.categories.index')}}">إلغاء</a>
                </div>
                <!-- /.card-footer -->
            </form>


        </div>
        <!-- /.card -->

    </section>    <!-- /.content -->

@endsection
