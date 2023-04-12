@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Chào {{ Auth::user()->name }}</h1>



                <div class="col-lg-12">
                    <div class="panel panel-default calen">
                        <div class="panel-heading">
                            <strong style="font-size: 20px;">Danh Sách Bài viết mới cập nhật</strong>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr align="center">
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Tên file</th>
                                        <th class="text-center">Giá</th>
                                        <th class="text-center">Đường dẫn</th>
                                        <th class="text-center">Xem chi tiết</th>
                                        <th class="text-center">Xóa</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($files as $file)
                                        <tr class="odd gradeX" align="center">
                                            <td>{{ $file->id }}</td>
                                            <td>{{ $file->tenfile }}</td>
                                            <td>{{ $file->gia }}</td>
                                            <td>{{ $file->linkdown }}</td>
                                            <td><a href="admin/detail-{{$file->id}}">Xem chi tiết</a></td>
                                            <td><a href="admin/delete-{{$file->id}}">Xóa</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

