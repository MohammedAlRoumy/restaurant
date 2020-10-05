@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">الصلاحيات</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#">لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="#">الصلاحيات</a></li>
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
                <h3 class="card-title" style="float: right;">إضافة صلاحية</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @error('name')
            <span class="invalid-feedback" role="alert">
            </span>
            @enderror
            <form class="form-horizontal" method="post" action="{{route('dashboard.roles.store')}}">
                @csrf
                @method('post')
                @include('dashboard.partials._errors')
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">الصلاحيات</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="أسم الصلاحية">
                        </div>
                    </div>
                </div>

                {{--permissions--}}
                <div class="form-group">
                    <h4>الاذونات</h4>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 20%;">النموذج</th>
                            <th>الاذونات</th>
                        </tr>
                        </thead>

                        <tbody>

                        @php
                            $models = ['categories','users','ourteams'];
                        @endphp

                        @foreach ($models as $index=>$model)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td class="text-capitalize">{{ $model }}</td>
                                <td>
                                    @php
                                        $permission_maps = ['create', 'read', 'update', 'delete'];
                                    @endphp

                                    <select name="permissions[]" class="form-control select2" multiple>
                                        @foreach ($permission_maps as $permission_map)
                                            <option value="{{ $permission_map . '_' . $model }}">{{ $permission_map }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">إضافة</button>
                    <a class="btn btn-default float-right" href="{{route('dashboard.roles.index')}}">إلغاء</a>
                </div>
                <!-- /.card-footer -->
            </form>


        </div>
        <!-- /.card -->

    </section>    <!-- /.content -->

@endsection
