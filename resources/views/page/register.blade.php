@section('title')
    Đăng ký tài khoản
@endsection
@extends('index')
@section('content')
<div class="columns-container">
        <div class="container" id="columns">
            <div class="breadcrumb clearfix" >
                <span itemprop="itemListElement">
                <a itemprop="item" class="agreen" href="index.php" title="Trở lại trang chủ">Trang chủ<meta itemprop="name" content="sharecode.vn"></a>

                </span>
                <span class="navigation-pipe">&nbsp;</span>

    <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
        <a itemprop="item" class="agreen" href="dang-ki-tai-khoan" title="Đăng kí tài khoản">
            <h2 class="abread" itemprop="name">Đăng kí tài khoản</h2>
        </a>
        <meta itemprop="position" content="2">
    </span>

            </div>

    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <div id="mainbody_contentbody_Panel1" )>
                <div class="modal-body reg-border">
                    <div class="row ">


                        <h1 class="col-sm-4 title3 bold line-h">ĐĂNG KÍ TÀI KHOẢN</h1>

                    </div>
                    <div class="line"></div>
                    <br>
                    <div class="row">
                        <h3 class="col-xs-12 title5">Bạn đã có tài khoản? <a data-dismiss="modal" data-toggle="modal" data-target="#LoginForm" role="button" class="agreen bold">Đăng nhập ngay</a></h3>
                    </div>
                    <br>
                    <div class="form-horizontal">
                        <form method="POST" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Email <span class="text-error">*</span></label>
                            <div class="col-sm-6">
                                <input name="email" type="text" id="mainbody_contentbody_reg_email" placeholder="VD: thanhtam92@gmail.com" maxlength="50" class="form-control">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Password <span class="text-error">*</span></label>
                            <div class="col-sm-6">
                                <input name="password" type="password" id="mainbody_contentbody_reg_password" placeholder="******" maxlength="32" autocomplete="off" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Nhập lại Password <span class="text-error">*</span></label>
                            <div class="col-sm-6">
                                <input name="password_again" placeholder="******" name="re_password" id="reg_re_password" maxlength="32" class="form-control" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Họ tên <span class="text-error">*</span></label>
                            <div class="col-sm-6">
                                <input name="fullname" type="text" id="fullname" maxlength="40" placeholder="VD: Trần Thanh Tâm" class="form-control require">
                            </div>
                            <div class="col-sm-3">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Số điện thoại <span class="text-error">*</span></label>
                            <div class="col-sm-6">
                                <input name="phone" type="text" id="mainbody_contentbody_reg_phone" style="width: 185px;" maxlength="10" placeholder="01..., 08..., 09... or +84..." class="form-control require">
                            </div>
                        </div>
                            </div>
                        </div>
                        <div class="form-group">
                        </div>
                    </form>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-7">
                                <span id="register_error" class="text-error">&nbsp;</span>
                                <span class="text-error" id="reg_error_email">&nbsp;</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                                <button  type="submit" id="submitdk" class="button-orange"><i class="fa fa-user-plus fa-lg" aria-hidden="true"></i>&nbsp;Đăng Ký Ngay </button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>

</div>
        </div>
    </div>

        </div>
    </div>

@endsection
