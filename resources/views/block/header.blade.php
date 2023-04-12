        <div id="header" class="header">
            <div class="top-header">
                <div class="container">
                    <div class="nav-top-links">
                        <a class="first-item" href="tel:+84362312042" title="Click gọi ngay!">
                            <img alt="hotline" src="assets/images/phone.png" />0362.312.042</a>
                        <a href="mailto:contact@gmail.com" title="Click để gửi email!">
                            <img alt="email" src="assets/images/email.png" />Contact@gmail.com</a>
                    </div>
                    @if(Auth::user())
                    <div id="ExitBox" class="support-link">
                        <a id="btnExit" class="aorange" href="logout">[Thoát]</a>
                    </div>
                   <div id="user-info-top" class="user-info pull-right">
                        <div id="AcInfo" class="dropdown">
                            <a href="" id="UserName2" class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Xin chào, Ruka"><span>Xin chào, </span><span id="UserName"><b>{{ Auth::user()->name }}</b></span></a>
                            <ul class="dropdown-menu mega_dropdown" role="menu">
                                <li><a href="codetailen"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;Code tải lên</a></li>

                                <li><a href="code-download.htm"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;&nbsp;Code đã mua</a></li>

                                <li><a href="thong-tin-ca-nhan" class="green"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Cài đặt thông tin</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    @else
                    <div id="LoginBox" class="support-link">
                         <a data-toggle="modal" data-target="#LoginForm" role="button">Đăng nhập</a>
                        <a href="dang-ki-tai-khoan">Đăng kí</a>
                    </div>

                    <div id="user-info-top" class="user-info pull-right">

                        <div id="AcLogin" class="dropdown">
                            <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="index.php"><span></span></a>
                            <ul class="dropdown-menu mega_dropdown" role="menu">
                                <li><a data-toggle="modal" data-target="#LoginForm" role="button"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Đăng nhập</a></li>
                                <li><a href="dang-ki-tai-khoan"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Đăng kí</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="container main-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 logo">
                        <a href="index.php">
                            <img alt="Trang chủ sharecode.vn" title="Sharecode.vn" src="assets/images/logo.png" /></a>
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-6 header-search-box">
                        <div class="form-inline search-h">
                            <div id="regPanel" >
                                <form method="get" id="search" action="search">
                                    <div class="form-group form-category">

                                        <select class="select-category" name="slSearch" id="slSearch">
                                            <option value="0">TẤT CẢ CODE</option>

                                                    <option value="1">Android</option>

                                                    <option value="2">iOS</option>

                                                    <option value="3">Windows phone</option>

                                                    <option value="4">PHP & MySQL</option>

                                                    <option value="5">WordPress</option>

                                                    <option value="6">Joomla</option>

                                                    <option value="7">Visual C#</option>

                                                    <option value="8">Asp/Asp.Net</option>

                                                    <option value="9">Java/JSP</option>

                                                    <option value="10">Visual Basic</option>

                                                    <option value="11">Cocos2D</option>

                                                    <option value="12">Unity</option>

                                                    <option value="13">Visual C++</option>

                                                    <option value="14">Html & Template</option>

                                                    <option value="15">Khác</option>

                                        </select>
                                    </div>

                                        <input name="txtSearch" type="text" id="txtSearch" class="txt-search txt-auto" placeholder="Nhập Từ khóa (or) Mã code" />


                                    <button id="btnSearch" class="pull-right btn-search" )></button>
                                </form>
</div>
                        </div>
                    </div>

                    <div class="col-xs-5 col-sm-2 col-md-3 shopping-cart-box btn-align">
                    @if(Auth::user())
                        <a data-toggle="modal" data-target="#AddMoney" role="button" class="button-green" onclick="createCaptcha();" title="Nạp tiền vào tài khoản"><i class="fa fa-money fa-lg" aria-hidden="true"></i>&nbsp; NẠP XU</a>&nbsp;&nbsp;
                        <a href="thanh-vien-upload" class="button-orange" title="Upload code kiếm tiền"><i class="fa fa-cloud-upload fa-lg" aria-hidden="true"></i>&nbsp; TẢI LÊN</a>

                    @else
                        <a data-toggle="modal" data-target="#LoginForm" role="button" class="button-green" title="Nạp tiền vào tài khoản"><i class="fa fa-money fa-lg" aria-hidden="true"></i>&nbsp; NẠP XU</a>&nbsp;&nbsp;
                        <a data-toggle="modal" data-target="#LoginForm"  role="button" class="button-orange" title="Tặng thêm 5 Point cho mỗi Upload"><i class="fa fa-cloud-upload fa-lg" aria-hidden="true">
                        </i>&nbsp; TẢI LÊN</a>
                    @endif
                    </div>
                </div>
            </div>
            <div id="nav-top-menu" class="nav-top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3" id="box-vertical-megamenus">
                            <div class="box-vertical-megamenus">
                                <h4 class="title">
                                    <span class="title-menu">Danh mục</span>
                                    <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                                </h4>
                                <div class="vertical-menu-content is-home">
                                    <ul class="vertical-menu-list">
                                                <li class=""><a href='ngon-ngu-lap-trinh?abc=1'>
                                                    <img class="icon-menu" alt="Android" src="assets/images/3.png">Android</a></li>

                                                <li class=""><a href='ngon-ngu-lap-trinh?abc=2'>
                                                    <img class="icon-menu" alt="iOS" src="assets/images/3.png">iOS</a></li>

                                                <li class=""><a href='ngon-ngu-lap-trinh?abc=3'>
                                                    <img class="icon-menu" alt="Windows phone" src="assets/images/3.png">Windows phone</a></li>

                                                <li class=""><a href='ngon-ngu-lap-trinh?abc=4'>
                                                    <img class="icon-menu" alt="PHP & MySQL" src="assets/images/3.png">PHP & MySQL</a></li>

                                                <li class=""><a href='ngon-ngu-lap-trinh?abc=5'>
                                                    <img class="icon-menu" alt="WordPress" src="assets/images/3.png">WordPress</a></li>

                                                <li class=""><a href='ngon-ngu-lap-trinh?abc=6'>
                                                    <img class="icon-menu" alt="Joomla" src="assets/images/3.png">Joomla</a></li>

                                                <li class=""><a href='ngon-ngu-lap-trinh?abc=7'>
                                                    <img class="icon-menu" alt="Visual C#" src="assets/images/3.png">Visual C#</a></li>

                                                <li class=""><a href='ngon-ngu-lap-trinh?abc=8'>
                                                    <img class="icon-menu" alt="Asp/Asp.Net" src="assets/images/3.png">Asp/Asp.Net</a></li>

                                                <li class=""><a href='ngon-ngu-lap-trinh?abc=9'>
                                                    <img class="icon-menu" alt="Java/JSP" src="assets/images/3.png">Java/JSP</a></li>

                                                <li class=""><a href='ngon-ngu-lap-trinh?abc=10'>
                                                    <img class="icon-menu" alt="Visual Basic" src="assets/images/3.png">Visual Basic</a></li>

                                                <li class="cat-link-orther"><a href='ngon-ngu-lap-trinh?abc=11'>
                                                    <img class="icon-menu" alt="Cocos2D" src="assets/images/3.png">Cocos2D</a></li>

                                                <li class="cat-link-orther"><a href='ngon-ngu-lap-trinh?abc=12'>
                                                    <img class="icon-menu" alt="Unity" src="assets/images/3.png">Unity</a></li>

                                                <li class="cat-link-orther"><a href='ngon-ngu-lap-trinh?abc=13'>
                                                    <img class="icon-menu" alt="Visual C++" src="assets/images/3.png">Visual C++</a></li>

                                                <li class="cat-link-orther"><a href='ngon-ngu-lap-trinh?abc=14'>
                                                    <img class="icon-menu" alt="Html & Template" src="assets/images/3.png">Html & Template</a></li>

                                                <li class="cat-link-orther"><a href='ngon-ngu-lap-trinh?abc=15'>
                                                    <img class="icon-menu" alt="Khác" src="assets/images/3.png">Khác</a></li>

                                    </ul>
                                    <div class="all-category"><span class="open-cate">Xem tất cả</span></div>
                                </div>
                            </div>
                        </div>
                        <div id="main-menu" class="col-sm-9 main-menu">
                            <nav class="navbar navbar-default">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <a class="navbar-brand" href="#">MENU</a>
                                    </div>
                                    <div id="navbar" class="navbar-collapse collapse">
                                        <ul class="nav navbar-nav">
                                            <li id="mnhome" class="active" title="Trang chủ"><a href="index.php"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a></li>

                                            <li id="mncodeok" title="Code chất lượng (>= 100 Xu)"><a href="code-chat-luong.html">Code chất lượng </a></li>
                                            <li id="mncode" title="Code tham khảo (2 Xu - 99 Xu)"><a href="code-tham-khao.html">Code tham khảo</a></li>
                                            <li id="mncodefree" title="Code miễn phí (0 Xu)"><a href="code-mien-phi.html">Code miễn phí</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div id="form-search-opntop">
                    </div>
                    <div id="user-info-opntop">
                    </div>

                </div>
            </div>
        </div>
         <div id="home-slider" class="page-home">

    </div>
