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
                        <li class="breadcrumb-item "><a href="#">لوحة التحكم</a></li>
                        <li class="breadcrumb-item active">الاعضاء</li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="float: right">الاعضاء</h3>
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

                                            <div class="col-md-4">
                                                <a href="{{route('dashboard.users.create')}}"
                                                   class="btn btn-success btn-sm"><i
                                                        class="fa fa-plus"></i> إضافة</a>
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
                                        @if($users->count()>0)
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>الاسم</th>
                                                    <th>البريد الإلكتروني</th>
                                                    <th>الصلاحيات</th>
                                                    <th>الاجراءات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $index=>$user)
                                                    <tr>
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                            @foreach($user->roles as $role)
                                                                <h5 style="display: inline-block"><span
                                                                        class="badge badge-primary">{{$role->name}}</span>
                                                                </h5>
                                                            @endforeach
                                                            {{--                                            {{implode(', ', $user->roles->pluck('name')->toArray())}}--}}
                                                        </td>

                                                        <td>{{--
                                            @if(auth()->user()->hasPermission('update_users'))
                                                @if($user->hasRole('super_admin'))
                                                    <a href="#"
                                                       class="btn btn-warning btn-sm" disabled=""><i
                                                            class="fa fa-edit"></i> تعديل</a>
                                                @else--}}
                                                            <a href="{{route('dashboard.users.edit',$user->id)}}"
                                                               class="btn btn-warning btn-sm"><i
                                                                    class="fa fa-edit"></i> تعديل</a>
                                                            {{--@endif
                                                        @else
                                                            <a href="#"
                                                               class="btn btn-warning btn-sm" disabled=""><i
                                                                    class="fa fa-edit"></i> تعديل</a>
                                                        @endif--}}

                                                            {{-- @if(auth()->user()->hasPermission('delete_users'))
                                                                 @if($user->hasRole('super_admin'))
                                                                     <a href="#" class="btn btn-danger btn-sm " disabled=""><i
                                                                             class="fa fa-trash"></i> حذف</a>
                                                                 @else--}}

                                                            <form
                                                                action="{{route('dashboard.users.destroy',$user->id)}}"
                                                                method="post"
                                                                style="display: inline-block">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                        class="btn btn-danger btn-sm delete"><i
                                                                        class="fa fa-trash"></i> حذف
                                                                </button>
                                                            </form>{{--
                                                @endif
                                            @else
                                                <a href="#" class="btn btn-danger btn-sm " disabled=""><i
                                                        class="fa fa-trash"></i> حذف</a>
                                            @endif--}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <h3>لا توجد بيانات</h3>
                                        @endif
                                    </div>
                                </div>
                                {{ $users/*->appends(request()->query())*/->links() }}
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
