@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lý Người Dùng
                            <small>> Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Tên</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Quyền</th>>
                                <th class="text-center">Sửa</th>
                                <th class="text-center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="odd gradeX" align="center">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->loaiuser == 1)
                                            {{ 'Admin' }}
                                        @else
                                            {{ 'Tài khoản thường' }}
                                        @endif
                                    </td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua-{{ $user->id }}">Sửa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/xoa-{{ $user->id }}">Xóa</a></td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
