@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">الاعضاء</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="#">الاعضاء</a></li>
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
                <h3 class="card-title" style="float: right;">إضافة عضو</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @error('name')
            <span class="invalid-feedback" role="alert">
            </span>
            @enderror
            <form class="form-horizontal" method="post" action="{{route('dashboard.users.store')}}">
                @csrf
                @method('post')
                @include('dashboard.partials._errors')
                <div class="card-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">الاسم</label>
                        <div class="col-md-9">
                            <input class="form-control" name="name" type="text"
                                   value="{{old('name')}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">البريد الالكتروني</label>
                        <div class="col-md-9">
                            <input class="form-control" name="email" type="email"
                                   value="{{old('email')}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">كلمة المرور</label>
                        <div class="col-md-9">
                            <input class="form-control" name="password" type="password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">تأكيد كلمة المرور</label>
                        <div class="col-md-9">
                            <input class="form-control" name="password_confirmation" type="password">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="control-label col-md-3">الصلاحيات</label>
                        <div class="col-md-9">
                            <select name="role_id" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">إضافة</button>
                    <a class="btn btn-default float-right" href="{{route('dashboard.users.index')}}">إلغاء</a>
                </div>
                <!-- /.card-footer -->
            </form>


        </div>
        <!-- /.card -->

    </section>    <!-- /.content -->

@endsection
