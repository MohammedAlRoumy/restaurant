@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">لوحة التحكم</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">لوحة التحكم</li>
                        <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="float: right">الحجوزات</h3>
                            <div class="row" style="float: left">
                                <div class="col-12 ">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="input-group input-group-sm">
                                                    <input type="search" name="search" autofocus class="form-control"
                                                           placeholder="بحث" value="{{request()->search}}">
                                                    <span class="input-group-append">
                                                        <button type="submit" class="btn btn-info"><i
                                                                class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الاسم</th>
                                                <th>رقم الطاولة</th>
                                                <th>التاريخ</th>
                                                <th>الساعة</th>
                                                <th>الاجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($reservations as $index=>$reservation)
                                                <tr>
                                                    <td>{{$index+1}}</td>
                                                    <td>{{$reservation->name}}</td>
                                                    <td>{{$reservation->table}}</td>
                                                    <td>{{$reservation->date}}</td>
                                                    <td>{{$reservation->time}}</td>

                                                    <td>
                                                        @if(auth()->user()->hasPermission('read_reservations'))
                                                            <a href="{{route('dashboard.reservations.show',$reservation->id)}}"
                                                               class="btn btn-warning btn-sm"><i
                                                                    class="fa fa-eye"></i> عرض</a>
                                                        @else
                                                            <a href="#" class="btn btn-warning btn-sm disabled"><i
                                                                    class="fa fa-eye"></i> عرض</a>
                                                        @endif

                                                        @if(auth()->user()->hasPermission('delete_reservations'))
                                                            <form
                                                                action="{{route('dashboard.reservations.destroy',$reservation->id)}}"
                                                                method="post"
                                                                style="display: inline-block">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                        class="btn btn-danger btn-sm delete">
                                                                    <i
                                                                        class="fa fa-trash"></i> حذف
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a href="#" class="btn btn-danger btn-sm disabled"><i
                                                                    class="fa fa-trash"></i> حذف</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{ $reservations->appends(request()->query())->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>    <!-- /.content -->
@endsection

