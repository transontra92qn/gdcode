@extends('admin.layout.index')

@section('content')
<script src="admin_asset/dist/js/extra.js"></script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Sách
                            <small>> Bình Luận của Người Dùng</small>
                        </h1>
                    </div>
                    <div class="clearfix"></div>
                    @if(session('message'))
                        <div class="alert alert-success">
                            <strong>{{ session('message') }}</strong>
                        </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th class="text-center">ID</th>
                                <th class="text-center">Nội Dung</th>
                                <th class="text-center">File_ID</th>
                                <th class="text-center">User_ID</th>
                                <th class="text-center">Tình trạng</th>
                                <th class="text-center">Duyệt</th>
                                <th class="text-center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cm as $cm)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $cm->id }}</td>
                                <td>{{ $cm->noidung }}</td>
                                <td>{{ $cm->file_id }}</td>
                                <td>{{ $cm->user_id}}</td>
                                <td>
                                        @if($cm->tinhtrang == 1)
                                            {{ 'Đã Duyệt' }}
                                        @else
                                            {{ 'Chưa Duyệt' }}
                                        @endif
                                    </td>
                                <td class="center"> <a href="admin/comment/duyet-{{ $cm->id }}">Duyệt</a></td>
                                <td class="center"> <a href="admin/comment/xoa-{{ $cm->id }}">Xóa</a></td>
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
