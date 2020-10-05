@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">فريق الطبخ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="#">فريق الطبخ</a></li>
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
                <h3 class="card-title" style="float: right;">إضافة فريق الطبخ</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @error('name')
            <span class="invalid-feedback" role="alert">
            </span>
            @enderror
            <form class="form-horizontal" method="post" action="{{route('dashboard.ourteams.store')}}" enctype="multipart/form-data">
                @csrf
                @method('post')
                @include('dashboard.partials._errors')
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">اسم الطباخ</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="اسم الطباخ">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">صورة الطباخ</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">وصف الطباخ</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">إضافة</button>
                    <a class="btn btn-default float-right" href="{{route('dashboard.categories.index')}}">إلغاء</a>
                </div>
                <!-- /.card-footer -->
            </form>


        </div>
        <!-- /.card -->

    </section>    <!-- /.content -->

@endsection
