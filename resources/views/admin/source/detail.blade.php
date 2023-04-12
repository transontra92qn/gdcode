@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Source
                            <small>> {{ $file->tenfile }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    <strong>{{$err}}</strong><br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                <strong>{{session('error')}}</strong>
                            </div>
                        @endif

                        @if(session('message'))
                            <div class="alert alert-success">
                                <strong>{{session('message')}}</strong>
                            </div>
                        @endif
                        <form action="admin/tintuc/sua/{{ $file->id }}" method="POST" enctype="multipart/form-data"> <!-- Form bắt buộc phải có thuộc tính enctype thì mới up được file lên -->
                            {{ csrf_field() }}
                            <div class="form-group">
                                <p><label>ID</label></p>
                                <input class="form-control input-width" type="text"   value="{{ $file->id }}" />
                            </div>

                            <div class="form-group">
                               <p><label>Tên File</label></p>
                                <input class="form-control input-width" type="text"   value="{{ $file->tenfile }}" />
                            </div>
                            <div class="form-group">
                                <p><label>Mô tả ngắn</label></p>
                                <input class="form-control input-width" type="text"  value="{{ $file->motangnan }}" />
                            </div>

                            <div class="form-group">
                               <p><label>Ảnh đại diện</label></p>
                               <p><img src="assets/ima/{{ $file->anhdaidien }}" width="500px"></p>
                            </div>
                             <div class="form-group">
                               <p><label>Danh mục</label></p>
                                <input class="form-control input-width" type="text"   value="{{ $file->danhmuc->name  }}" />
                            </div>
                             <div class="form-group">
                               <p><label>Link demo</label></p>
                                <input class="form-control input-width" type="text"   value="{{ $file->linkdemo }}" />
                            </div>
                             <div class="form-group">
                               <p><label>Link download</label></p>
                                <input class="form-control input-width" type="text"   value="{{ $file->linkdown }}" />
                            </div>
                             <div class="form-group">
                               <p><label>Giá</label></p>
                                <input class="form-control input-width" type="text"   value="{{ $file->gia }}" />
                            </div>
                             <div class="form-group">
                               <p><label>Mô tả</label></p>
                                <textarea name="slide_content" id="demo" class="form-control ckeditor" rows="3">
                                    {{ $file->mota }}
                                </textarea>
                            </div>
                            <div class="form-group">
                               <p><label>Hướng dẫn cài đặt</label></p>
                               <textarea name="slide_content" id="demo" class="form-control ckeditor" rows="3">
                                    {{ $file->hdcaidat }}
                                </textarea>
                            </div>
                            <div class="form-group">
                               <p><label>Người đăng</label></p>
                                <input class="form-control input-width" type="text"   value="{{ $file->User->name }}" />
                            </div>


                            <button><a href="admin">quay Lại</a></button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->



                <!-- end row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
