
<!DOCTYPE html>
<html lang="vi">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head><title>@yield('title')</title>
<link rel="shortcut icon"  type="image/x-icon" /><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="robots" content="noodp,index,follow" /><meta name="revisit-after" content="1 days" /><meta content="GDCODE" name="author" /><meta content="Global" name="distribution" /><meta content="GDCODE" name="copyright" /><meta name="dc.creator" content="ShareCode" /><meta name="generator" content="GDCODE" /><meta name="viewport" content="width=device-width, initial-scale=1" /><meta name="twitter:card" value="summary" /><meta property="og:site_name" content="GDCODE" /><link rel="stylesheet" type="text/css" href="assets/lib/bootstrap/css/bootstrap.min.css" /><link rel="stylesheet" type="text/css" href="assets/lib/font-awesome/css/font-awesome.min.css" /><link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css" /><link rel="stylesheet" type="text/css" href="assets/lib/owl.carousel/owl.carousel.css" /><link rel="stylesheet" type="text/css" href="assets/lib/jquery-ui/jquery-ui.min.css" /><link rel="stylesheet" type="text/css" href="assets/css/animate.css" /><link rel="stylesheet" type="text/css" href="assets/css/reset.css" /><link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="assets/js/all.js"></script>
    <script src="http://jcrop-cdn.tapmodo.com/v0.9.12/js/jquery.Jcrop.min.js"></script>

    <link href="index.html" rel="canonical" />
    <link rel="stylesheet" type="text/css" href="assets/lib/jquery.bxslider/jquery.bxslider.css" />
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" /></head>
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<body>

@include('block.header')

       <div class="modal fade" id="LoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header popup_header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p class="modal-title text-center" id="myModalLabel">GDCODE</p>
                    </div>
                    <div id="loginPanel">
                        <div class="modal-body">
                            <div class="row line-h">
                                <div class="col-sm-4 title3 bold">ĐĂNG NHẬP</div>
                            </div>
                            <div class="line"></div>
                            <br />
                            <div class="row">
                                <div class="col-xs-12">Bạn chưa có tài khoản GDCODE? <a href="dang-ki-tai-khoan" class="agreen bold">Đăng ký ngay</a></div>
                            </div>
                            <br />
                            <div class="form-horizontal">
                                <form  method="post">
                                 <meta name="csrf-token" content="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label">Tên Email <span class="text-error">*</span></label>
                                    <div class="col-sm-6">
                                        <input name="password" type="text" id="email" maxlength="50" placeholder="Vui lòng nhập email" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-4 control-label">Mật Khẩu <span class="text-error">*</span></label>
                                    <div class="col-sm-6">
                                        <input name="password" type="password" id="password" placeholder="******" class="form-control" onkeydown = "if (event.keyCode == 13)
                                             document.getElementById('submit').click()" autocomplete="on"  />
                                    </div>
                                </div>

                                </div>
                            </form>
                                <div class="form-group">

                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-6">
                                        <div class="text-error" id="login_error">&nbsp;</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-6">
                                       <button type="submit" id="submit" class="button-orange"><i class="fa fa-sign-in fa-lg" aria-hidden="true"></i>&nbsp; Đăng nhập</button>

                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

</div>

            </div>
        </div>






</script>
    @yield('content')

    @include('block.footer')

   <a href="#" class="scroll_top" title="Lên đầu" style="display: inline;"></a>
    <!-- Script-->

    <script type="text/javascript" src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/lib/select2/js/select2.min.js"></script>
    <script type="text/javascript" src="assets/lib/owl.carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.actual.min.js"></script>
    <script type="text/javascript" src="assets/js/theme-script.js"></script>
    <script type="text/javascript" src="assets/lib/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $('#slSearch').on('change', function () {
            $('#hdLangFilter').val($("#slSearch").val());
        });
    </script>




    <script src="assets/js/jquery.easy-ticker.js"></script>

    <link href="assets/css/iosOverlay.css" rel="stylesheet" />
    <script src="assets/js/iosOverlay.js"></script>
    <script type="text/javascript" src="assets/lib/jquery.bxslider/jquery.bxslider.min.js"></script>
     <link href="assets/lib/rateit/rateit.css" rel="stylesheet" />
    <script src="assets/lib/rateit/jquery.rateit.min.js"></script>

</body>
</html>
