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
                
    
    <a href="https://sharecode.vn/thong-tin-ca-nhan.htm" id="mainbody_breadcrumb_breadpage_UserName" class="agreen">Ruka</a>
    <span class="navigation-pipe">&nbsp;</span>
    <a class="agreen" href="https://sharecode.vn/doi-mat-khau.htm">
        <h2 class="abread">Đổi mật khẩu</h2>
    </a>


            </div>
            
    
    <div class="row">
        <div class="center_column col-xs-12 col-sm-9" id="center_column">
            
    <div class="bg-title">
        <a href="https://sharecode.vn/doi-mat-khau.htm" class="search_title alignleft">
            <h1 class="search_title">ĐỔI MẬT KHẨU</h1>
        </a>
    </div>
    <br>
    <br>
    <div id="mainbody_contentbody_contentpage_upPannel">
	
            <div id="mainbody_contentbody_contentpage_panDefaultButton" >
		
                <div class="form-horizontal">
                    <div class="form-group">
                        <input type="hidden" id="emailcp" value="{{ $user_info->email }}">
                        <label class="col-sm-5 control-label">Mật khẩu cũ<span class="text-error">*</span></label>
                        <div class="col-sm-5">
                            <input name="updatePasswordOld" type="password" id="updatePasswordOld" placeholder="******" maxlength="32" autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Mật khẩu mới<span class="text-error">*</span></label>
                        <div class="col-sm-5">
                            <input name="updatePasswordNew" type="password" id="updatePasswordNew" placeholder="******" maxlength="32" autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Nhập lại MK mới<span class="text-error">*</span></label>
                        <div class="col-sm-5">
                            <input name="updateRePasswordNew" type="password" id="updateRePasswordNew" placeholder="******" maxlength="32" class="form-control">
                        </div>
                    </div>
 
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-6">
                            <div id="updatePass_error" class="text-error">&nbsp;</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-6">
                             <button type="submit" id="btnUpdatePass" class="button-orange"><i class="fa fa-key fa-lg" aria-hidden="true"></i>&nbsp; Đổi mật khẩu</button>
                        </div>
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
            <img src="assets/images/avanta2.png" id="mainbody_contentbody_ucProfile_Avanta" class="prof_img" alt="Ruka - Trà Trần Sơn" width="90" height="90" title="Ruka - Trà Trần Sơn">
        </a>
    </div>
    <div class="pro-right">
        <h2 id="mainbody_contentbody_ucProfile_FullName" class="pro-title green bold">Trà Trần Sơn</h2>
        <div class="line"></div>
        <div class="pro-money">
            <div>Tài khoản&nbsp;<strong id="mainbody_contentbody_ucProfile_Money">0</strong> Xu</div>
            <div>Tạm giữ&nbsp;&nbsp;&nbsp;&nbsp;<span class="aorange"><strong id="mainbody_contentbody_ucProfile_MoneyKeep" title="Số XU đang bị tạm giữ cho giao dịch code vừa được bán">0</strong> Xu</span> <i id="mainbody_contentbody_ucProfile_InfoKeep" class="fa fa-info-circle" aria-hidden="true" title="Số XU đang bị tạm giữ cho giao dịch code vừa được bán"></i></div>
             <div>Khả dụng&nbsp;&nbsp;<span class="agreen"><strong id="mainbody_contentbody_ucProfile_MoneyAllow" title="Số XU tối đa có thể sử dụng để mua code (hoặc) rút tiền">0</strong> Xu</span> <i title="Số XU tối đa có thể sử dụng để mua code (hoặc) rút tiền" class="fa fa-info-circle" aria-hidden="true"></i></div>
            
        </div>
    </div>
    <div class="pro-link clear pro-link-first">
        <a href="https://sharecode.vn/thong-tin-ca-nhan.htm" class="aorange"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Cài đặt TT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="https://sharecode.vn/thanh-vien/ruka-120015.htm" id="mainbody_contentbody_ucProfile_LinkPageUser" class="aorange"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Trang cá nhân</a>
    </div>
     <div class="pro-link">
        <a href="https://sharecode.vn/bao-code-trung.htm" class="aorange"><i class="fa fa-clipboard" aria-hidden="true"></i>&nbsp;Báo bản quyền </a>&nbsp;&nbsp;
        <a href="https://sharecode.vn/binh-luan.htm" class="aorange pro-line14"><i class="fa fa-comment" aria-hidden="true"></i>&nbsp;Bình luận <span id="mainbody_contentbody_ucProfile_CmtCount" class="badge bagde-green badge-link">0</span></a>
    </div>
    <ul class="pro-list">
        <li id="mnCodeUpload">
            <a href="https://sharecode.vn/code-upload-cua-toi.htm">Code tải lên (<strong id="mainbody_contentbody_ucProfile_UploadCount">0</strong>)</a>
        </li>
        <li id="mnCodeSave">
            <a href="https://sharecode.vn/code-da-luu.htm">Code đã lưu (<strong id="mainbody_contentbody_ucProfile_SaveCount">0</strong>)</a>
        </li>
         <li id="mnCodeDown">
            <a href="https://sharecode.vn/code-download.htm">Code đã mua (<strong id="mainbody_contentbody_ucProfile_BuyCount">0</strong>)</a>
        </li>
        <li id="mnCodeSell">
            <a href="https://sharecode.vn/doanh-thu-ban-code.htm">Doanh thu bán code</a>
        </li>
       
        <li id="mnAddMoney">
            <a href="https://sharecode.vn/lich-su-giao-dich.htm">Lịch sử nạp tiền</a>
        </li>
        <li id="mnGetMoney">
            <a href="https://sharecode.vn/rut-tien.htm">Rút tiền</a>
        </li>
    </ul>
</div>   
        </div>
    </div>

        </div>
    </div>
@endsection