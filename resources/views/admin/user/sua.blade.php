@extends('admin.layout.index')

@section('content')
<script language="javascript">
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
            $("#submit").click(function (e) {
                e.preventDefault();
                id = jQuery('#id').val();
                var checkbox = document.getElementsByName("account_type");
                for (var i = 0; i < checkbox.length; i++){
                    if (checkbox[i].checked === true){
                       $.ajax({
                               type:'POST',
                               url:'xetquyen',
                               data:{loai: i,id: id},
                               success: function (data) {
                                if(data.tt=1)
                                    alert('thành công');
                               }
                            });
                    }
                }
            });
})
        </script>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lý Người Dùng
                            <small>> {{ $users->name }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    <strong>{{ $err }}</strong><br/>
                                @endforeach
                            </div>
                        @endif

                        @if(session('message'))
                            <div class="alert alert-success">
                                <strong>{{ session('message') }}</strong>
                            </div>
                        @endif
                        <form action="admin/user/sua/{{ $users->id }}" method="POST">
                            <meta name="csrf-token" content="{{ csrf_token() }}" />
                            <div class="form-group">
                                <p><label>Tên Người Dùng</label></p>
                                <input class="form-control input-width" type="hidden" id="id" placeholder="Nhập tên người dùng" value="{{ $users->id }}" readonly=""  />
                                <input class="form-control input-width" type="text" name="username" placeholder="Nhập tên người dùng" value="{{ $users->name }}" readonly=""  />
                            </div>

                            <div class="form-group">
                                <p><label>Email</label></p>
                                <input class="form-control input-width" type="email" name="email" placeholder="Nhập địa chỉ Email" value="{{ $users->email }}" readonly="" />
                            </div>
                            <div class="form-group">
                                <p><label>SDT</label></p>
                                <input class="form-control input-width" type="email" name="email" placeholder="Nhập địa chỉ Email" value="{{ $users->sdt }}" readonly="" />
                            </div>
                            <div class="form-group">
                                <p><label>Email</label></p>
                                <input class="form-control input-width" type="email" name="email" placeholder="Nhập địa chỉ Email" value="{{ $users->email }}" readonly="" />
                            </div>

                            <div class="form-group">
                                <p><label>Phân Quyền Tài Khoản</label></p>
                                <label class="radio-inline">
                                    <input name="account_type" value="0"
                                    @if($users->loaiuser == 0)
                                        {{ 'checked' }}
                                    @endif
                                     type="radio">Tài khoản thường
                                </label>
                                <label class="radio-inline">
                                    <input name="account_type" value="1"
                                    @if($users->loaiuser == 1)
                                        {{ 'checked' }}
                                    @endif
                                     type="radio">Admin
                                </label>
                            </div>

                            <a id="submit" class="btn btn-default">Thực Hiện</a>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
