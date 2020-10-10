@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">الطاولات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="#">الطاولات</a></li>
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
                <h3 class="card-title" style="float: right;">إضافة بيانات الطاولة</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @error('name')
            <span class="invalid-feedback" role="alert">
            </span>
            @enderror
            <form class="form-horizontal" method="post" action="{{route('dashboard.tables.store')}}" enctype="multipart/form-data">
                @csrf
                @include('dashboard.partials._errors')
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">رقم الطاولة</label>
                        <div class="col-sm-10">
                            <input type="number" name="tableNumber" min="1" class="form-control" placeholder="رقم الطاولة">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">عدد مقاعد الطاولة</label>
                        <div class="col-sm-10">
                            <input type="number" name="chairs" min="1" class="form-control" placeholder="عدد مقاعد الطاولة">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">الحالة</label>
                        <div class="col-md-9">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" value="1" @if(old('status', '1') == '1') checked @endif>متاح
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" value="0" @if(old('status', '0') == '0') checked @endif>غير متاح
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">إضافة</button>
                    <a class="btn btn-default float-right" href="{{route('dashboard.tables.index')}}">إلغاء</a>
                </div>
                <!-- /.card-footer -->
            </form>


        </div>
        <!-- /.card -->

    </section>    <!-- /.content -->

@endsection
