@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">الحجوزات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="#">الحجوزات</a></li>
                        <li class="breadcrumb-item active">عرض</li>
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
                <h3 class="card-title" style="float: right;">عرض الحجوزات</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="col-md-12">

                            <div class="tile-body">
                                <form class="form-horizontal">
                                    <div class="card-body">
                                    <div class="form-group row">
                                        <label class="control-label col-md-3">الاسم</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="title" type="text"
                                                   value="{{$reservation->name}}"
                                                   disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-3">البريد الالكتروني</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="email" type="email"
                                                   value="{{$reservation->email}}"
                                                   disabled>
                                        </div>
                                    </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">الهاتف</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="phone" type="tel"
                                                       value="{{$reservation->phone}}"
                                                       disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">التاريخ</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="date" type="date"
                                                       value="{{$reservation->date}}"
                                                       disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">الوقت</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="time" type="time"
                                                       value="{{$reservation->time}}"
                                                       disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">الطاولة</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="table" type="number"
                                                       value="{{$reservation->table}}"
                                                       disabled>
                                            </div>
                                        </div>

                                    <div class="form-group">
                                        &nbsp;&nbsp;&nbsp;<a class="btn btn-primary"
                                                             href="{{route('dashboard.contactus.index')}}">رجوع</a>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        <!-- /.card -->
        </div>
    </section>    <!-- /.content -->

@endsection
