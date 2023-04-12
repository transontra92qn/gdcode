@section('title')
    Thông Tin cá nhân
@endsection
@extends('index')
@section('content')
<div class="columns-container">
        <div class="container" id="columns">
            <div class="breadcrumb clearfix" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" class="agreen" href="https://sharecode.vn/" title="Trở lại trang chủ">Trang chủ<meta itemprop="name" content="sharecode.vn"></a>
                     <meta itemprop="position" content="1">
                </span>
                <span class="navigation-pipe">&nbsp;</span>


    <a href="#" class="agreen">{{ $user_info->name }}</a>
    <span class="navigation-pipe">&nbsp;</span>
    <a class="agreen" href="thong-tin-ca-nhan">
        <h2 class="abread">Cài đặt thông tin cá nhân</h2>
    </a>


            </div>


    <div class="row">
        <div class="center_column col-xs-12 col-sm-9" id="center_column">

    <div class="bg-title">
        <a href="thong-tin-ca-nhan" class="search_title alignleft">
            <h1 class="search_title">CÀI ĐẶT THÔNG TIN</h1>
        </a>
    </div>
    <br>
    <br>
    <div id="mainbody_contentbody_contentpage_panDefaultButton">

        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-5 control-label">Email đăng kí</label>
                <div class="col-sm-5  pro-top7">
                    <b id="updateEmail" class="green">{{ $user_info->email }}</b>
                </div>
            </div>
             <form id="formprofile">
            <div class="form-group">
                <label class="col-sm-5 control-label">Họ và tên<span class="text-error">*</span></label>
                <div class="col-sm-4">
                    <input name="updateFullName" type="text" id="updateFullName" maxlength="40" placeholder="VD: Trần Thanh Tâm" class="form-control" value="{{ $user_info->name }}">
                </div>
                <div class="col-sm-3">
                    <div id="updateFullName_error" class="text-error pro-top7">&nbsp;</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">Email TK Ngân Lượng</label>
                <div class="col-sm-4">
                    <input name="updateEmailMoney" type="text" id="updateEmailMoney" placeholder="VD: ThanhTam92@gmail.com" maxlength="40" class="form-control" value="{{ $user_info->emailnl }}">
                </div>
                <div class="col-sm-3  pro-top7"><em class="orange">(TK để nhận tiền)</em></div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">Số điện thoại<span class="text-error">*</span></label>
                <div class="col-sm-3">
                    <input name="updatePhone" type="text" id="updatePhone" maxlength="10"  placeholder="VD: 01... or 09.. or +84..." class="form-control" value="{{ $user_info->sdt }}">
                </div>
                <div id="updatePhone_error" class="text-error col-sm-4 pro-top7">&nbsp;</div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">Ảnh đại diện</label>
                <div class="col-sm-5">
                    <img src="assets/ima/{{ $user_info->hinhanh}}" id="Avanta" class="pro-img" width="90" height="90" alt="{{ $user_info->name }}" title="{{ $user_info->name }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">Chọn ảnh khác</label>
                <div class="col-sm-5  pro-top7">
                    <input type="file" name="fulImage" id="fulImage" title="Bạn hãy chọn ảnh ở đây">
                </div>
            </div>
           </form>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-6">
                    <a href="changepass" class="aorange">Đổi mật khẩu mới</a>
                </div>
            </div>

             <div class="form-group">
                <div class="col-sm-offset-5 col-sm-6">
                    <button type="submit" id="btnUpdate" class="button-orange"><i class="fa fa-user fa-lg" aria-hidden="true"></i>&nbsp; Cập nhật thông tin</button>
                </div>
            </div>
        </div>

</div>
    <br>
    <br>

        </div>
        <div class="column col-xs-12 col-sm-3" id="left_column">

<div class="block left-module box-border2">
    <div class="pro-left">
        <a href="https://sharecode.vn/thong-tin-ca-nhan.htm">
            <img src="assets/ima/{{ $user_info->hinhanh}}" id="ucProfile_Avanta" class="prof_img" alt="{{ $user_info->name }}" width="90" height="90" title="{{ $user_info->name }}">
        </a>
    </div>
    <div class="pro-right">
        <h2 id="fullName" class="pro-title green bold">{{ $user_info->name }}</h2>
        <div class="line"></div>
        <div class="pro-money">
            <div>Tài khoản&nbsp;<strong id="mainbody_contentbody_ucProfile_Money">{{ $user_info->sodu }}</strong> Xu</div>
        </div>
    </div>

</div>


    </div>

        </div>
    </div>
@endsection
