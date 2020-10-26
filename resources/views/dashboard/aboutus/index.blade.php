@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">من نحن</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">لوحة التحكم</a></li>
                        <li class="breadcrumb-item active">من نحن</li>
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
                <h3 class="card-title" style="float: right;">إضافة من نحن</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @error('name')
            <span class="invalid-feedback" role="alert">
            </span>
            @enderror
            <form class="form-horizontal" method="post" action="{{route('dashboard.aboutus.store')}}"
                  enctype="multipart/form-data">
                @csrf
                @method('post')
                @include('dashboard.partials._errors')
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">محتوى من نحن</label>
                        <div class="col-sm-10">
                            <textarea name="aboutus" class="form-control">{{setting('aboutus')}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">صورة من نحن</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" class="form-control">
                            <img src="{{asset('upload/images').'/'.setting('image') }}" class="img-responsive p-2" alt="" width="20%">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">البريد الإلكتروني</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" min="0" class="form-control" value="{{setting('email')}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">الهاتف</label>
                        <div class="col-sm-10">
                            الصيغة: 7890-456-123
                            <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                                   class="form-control" value="{{setting('phone')}}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 control-label">عنوان البناية</label>
                        <div class="col-sm-10">
                            <input type="text" name="building" class="form-control" value="{{setting('building')}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">اسم الشارع</label>
                        <div class="col-sm-10">
                            <input type="text" name="street" class="form-control" value="{{setting('street')}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">اسم المدينة</label>
                        <div class="col-sm-10">
                            <input type="text" name="city" class="form-control" value="{{setting('city')}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 control-label">مواعيد العمل: <p>يومياً</p> </label>
                        <div class="col-sm-10 row">
                            <div class="col-sm-5">
                                من الساعة
                                <input type="time" name="fromtime1" class="form-control" value="{{setting('fromtime1')}}">
                            </div>
                            <div class="col-sm-5">
                                إلى الساعة
                                <input type="time" name="totime1"  class="form-control" value="{{setting('totime1')}}">
                            </div>
                        </div>
                    </div>

                   {{-- <div class="form-group row">
                        <label class="col-sm-2 control-label">مواعيد العمل: <p>الجمعة</p> </label>
                        <div class="col-sm-10 row">
                            <div class="col-sm-5">
                                من الساعة
                                <input type="time" name="fromtime2" class="form-control">
                            </div>
                            <div class="col-sm-5">
                                إلى الساعة
                                <input type="time" name="totime2"  class="form-control">
                            </div>
                        </div>
                    </div>--}}

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
