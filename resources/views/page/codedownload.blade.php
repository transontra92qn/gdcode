@section('title')
    Tải code lên
@endsection
@extends('index')
@section('content')
<link href="assets/css/profile.css" rel="stylesheet">
<div class="columns-container">
        <div class="container" id="columns">
            <div class="breadcrumb clearfix" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" class="agreen" href="index.php" title="Trở lại trang chủ">Trang chủ<meta itemprop="name" content="sharecode.vn"></a>
                     <meta itemprop="position" content="1">
                </span>
                <span class="navigation-pipe">&nbsp;</span>


    <a href="thong-tin-ca-nhan" id="mainbody_breadcrumb_breadpage_UserName" class="agreen">ruka</a>
    <span class="navigation-pipe">&nbsp;</span>
    <a class="agreen" href="codetailen">
        <h2 class="abread">Code tải lên</h2>
    </a>




            </div>


    <div class="row">
        <div class="center_column col-xs-12 col-sm-9" id="center_column">


    <div class="bg-title">
        <a  class="search_title alignleft">
            <h1 class="search_title">CODE TẢI LÊN</h1>
        </a>

    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-5 col-md-7">
        </div>

    </div>
    <br>

    <div class="clear"></div>
    <br>
    <div id="mainbody_contentbody_contentpage_upPannel">

            <div class="col-xs-12 bold pro-row-head pro-line14">
                <div class="col-md-6 pro-col2">
                    <div class="pro-20">MÃ</div>
                    <div class="pro-80">SOURCE CODE</div>
                </div>
                <div class="col-md-6 pro-col2">
                    <div class="pro-20">PHÍ TẢI</div>

                    <div class="pro-40">Link download</div>
                </div>

            </div>
            <div class="clear"></div>
            @foreach($files as $file)
            <div class="col-xs-12 pro-row">
                        <div class="col-md-6 pro-col">
                            <div class="pro-20" title="Mã code">{{$file->id}}</div>
                            <div class="pro-80 bold">
                                <a class="agreen titlecode" href="#">
                                    <h3 class="title1">{{$file->tenfile}}</h3>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 pro-col pro-line14">
                            <span title="Phí tải" class="pro-20 orange"><b>{{$file->gia}}</b> Xu</span>
                        </div>
                    </div>
            @endforeach
            <div class="col-xs-12 bold pro-row-foot"></div>
            <div class="clear"></div>
            <br>

</div>

        </div>
        <div class="column col-xs-12 col-sm-3" id="left_column">

<div class="block left-module box-border2">
    <div class="pro-left">
        <a href="thong-tin-ca-nhan">
            <img src="./assets/ima/avanta2.png" id="mainbody_contentbody_ucProfile_Avanta" class="prof_img" alt="ruka - ruka" width="90" height="90" title="ruka - ruka">
        </a>
    </div>
    <div class="pro-right">
        <h2 id="mainbody_contentbody_ucProfile_FullName" class="pro-title green bold">{{$user->name}}</h2>
        <div class="line"></div>
        <div class="pro-money">
            <div>Tài khoản&nbsp;<strong id="mainbody_contentbody_ucProfile_Money">{{$user->sodu}}</strong> Xu</div>
            <div>SDT&nbsp;&nbsp;&nbsp;&nbsp; {{$user->sdt}}</div>

        </div>
    </div>
    <div class="pro-link clear pro-link-first">

    </div>
    <ul class="pro-list">
        <li id="mnCodeUpload" class="pro-select">
            <a href="codetailen">Code tải lên (<strong id="mainbody_contentbody_ucProfile_UploadCount">{{$abc}}</strong>)</a>
        </li>
         <li id="mnCodeDown">
            <a href="https://sharecode.vn/code-download.htm">Code đã mua (<strong id="mainbody_contentbody_ucProfile_BuyCount">0</strong>)</a>
        </li>
        <li id="mnCodeSell">
            <a href="#">Doanh thu bán code</a>
        </li>

        <li id="mnAddMoney">
            <a href="#">Lịch sử nạp tiền</a>
        </li>
        <li id="mnGetMoney">
            <a href="ruttien">Rút tiền</a>
        </li>

    </ul>
</div>




        </div>
    </div>

        </div>
    </div>
@endsection
