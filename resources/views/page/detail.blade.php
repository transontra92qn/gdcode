@section('title')

@endsection
@extends('index')
@section('content')
<script type="text/javascript">
    $(document).ready(function() {
         $("#btncmt").click(function(e){
            var cmt = jQuery('#txtComment').val();
            var id = {{$files->id}};
            if (cmt != '') {
            $.ajax({
               type:'POST',
               url:'comment',
               data:{id: id,cmt:  cmt},
               success: function (data) {
                    if(data.data==1){
                        alert("Vui lòng chờ admin duyệt");
                    }
                }
                });
            }
        })
    })
</script>
<div class="columns-container">
        <div class="container" id="columns">
            <div class="breadcrumb clearfix" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" class="agreen" href="index.php" title="Trở lại trang chủ">Trang chủ<meta itemprop="name"></a>
                     <meta itemprop="position" content="1">
                </span>
    <span class="navigation-pipe">&nbsp;</span>
     <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
    <a href="#" id="mainbody_breadcrumb_PathLink" class="agreen" itemprop="item">
        <span id="mainbody_breadcrumb_PathLinkTitle" itemprop="name">{{$files->tenfile}}</span>
    </a><meta itemprop="position" content="4"></span>

            </div>

    <div class="row" itemscope="" itemtype="http://schema.org/Product">
        <meta itemprop="url" content="#">
        <div class="center_column col-xs-12 col-sm-9" id="center_column">

            <div id="mainbody_contentbody_upPannel">

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="img-border">
                                <img id="mainbody_contentbody_CodeImage" title="Download {{$files->tenfile}}" class="img-val" itemprop="image" src="assets/ima/{{$files->anhdaidien}}" alt="{{$files->tenfile}}">
                            </div>


                        </div>
                        <div class="col-sm-8 dt-center">
                            <h1 id="mainbody_contentbody_TitleCode" class="dt-title bold" itemprop="name">{{$files->tenfile}}</h1>

                            <div class="line"></div>
                            <div class="row">
                                <div class="col-sm-10 col-md-8 dt-price">
                                    <span class="bold">Phí tải: <span id="mainbody_contentbody_Copyright" class="green">{{$files->gia}}</span> Xu</span>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="row">
                                <div class="col-md-7 dt-des">
                                 <meta itemprop="brand" content="sharecode.vn">
                                    <meta itemprop="releaseDate" content="7/8/2020 10:40:36 PM">
                                    <div class="dt-col">Danh mục </div>
                                    <div itemprop="material"><a href="/ngon-ngu-lap-trinh/visual-c-18.htm" id="mainbody_contentbody_Lang2" class="aorange" target="_blank">{{$files->danhmuc->name}}</a></div>
                                    <div class="dt-col">Thể loại </div>
                                    <div itemprop="category"><a href="/the-loai-source-code/phan-mem-ung-dung-2.htm" id="mainbody_contentbody_Category2" class="aorange" target="_blank">Phần mềm - Ứng dụng</a></div>
                                    <div class="dt-col">Ngày đăng </div>
                                    <div id="mainbody_contentbody_Date2">{{$files->created_at}}</div>
                                </div>
                                @if($files->linkdemo!=null)
                                <div class="col-md-5 dt-dow-vie">
                                <a href="{{$files->linkdemo}}" id="mainbody_contentbody_btnView" target="blank" class="btn2 button-demo bold" title="Xem demo thực tế">&nbsp; XEM DEMO</a>
                                </div>
                                @endif
                            </div>
                            <div class="line"></div>
                        </div>
                    </div>

                    <br>
                    <div class="dt-sub" title="Mô tả ngắn">
                        <h4 class="title1" itemprop="description">
                            {{$files->motangnan}}</h4>
                    </div>
                    <br>
                    <span class="dt-box-title bold">MÔ TẢ CHI TIẾT</span>
                    <div class="dt-box entry-detail">
                       {!!html_entity_decode($files->mota)!!}
<pre>
</pre>
<div id="eJOY__extension_root">
    &nbsp;</div>


                        <p id="anh-demo">&nbsp;</p>
                        <div id="mainbody_contentbody_divGalleryImage" class="dt-img">
                            <b>HÌNH ẢNH DEMO</b>
                            <br>
                            <br>

                                    <div class="text-center">
                                    <?php
                                    $data=$files->hinhanhchitiet->where('file_id',$files->id);
                                    ?>
                                    @foreach($data as $dta)
                                        <img src="assets/imadetail/{{$dta->hinhanh}}" alt="t" title="">
                                        @endforeach
                                    </div>
                                    <br>

                        </div>
                    </div>
                    <br>
                    <br>
                    <span class="dt-box-title bold">HƯỚNG DẪN CÀI ĐẶT</span>
                    <div class="dt-box entry-detail">
                         {!!html_entity_decode($files->mota)!!}
                        <br>
                    </div>
                    <div class="clear" style="height: 40px;">&nbsp;</div>
                    <div class="dt-down">
                        <div class="dt-down2">
                            <div class="col-sm-7 col-md-8">
                                <div class="bold title3">LINK DOWNLOAD</div>
                                <h2 id="mainbody_contentbody_FileName" class="dt-file">{{$files->linkdown}}</h2>
                            </div>
                            @if(Auth::user())
                            <div class="col-sm-5 col-md-4 text-center">
                                <a  id="mainbody_contentbody_btnLinkMain" title="" class="btn2 button-down2" data-target="#Message_modal" role="button" data-toggle="modal" ><div class="btn-box">
                                        <div class="btn-ic"></div>
                                        <div class="btn-txt bold">
                                            DOWNLOAD<br>
                                            <span id="mainbody_contentbody_divPrice2">(50 Xu)</span>
                                        </div>
                                    </div></a>

                            </div>
                            @else
                            <div class="col-sm-5 col-md-4 text-center">

                                <a id="mainbody_contentbody_btnLinkMain" title="" class="btn2 button-down2" data-target="#LoginForm" role="button" data-toggle="modal" ><div class="btn-box">
                                        <div class="btn-ic"></div>
                                        <div class="btn-txt bold">
                                            DOWNLOAD<br>
                                            <span id="mainbody_contentbody_divPrice2">({{$files->gia}} Xu)</span>
                                        </div>
                                    </div></a>

                            </div>
                            @endif

                        </div>
                    </div>




                    <div id="mainbody_contentbody_ucSuggest_upPannel">


    </div>

                    <br>
                    <h2 class="page-heading" id="binh-luan">
                        <span class="page-heading-title">BÌNH LUẬN</span>
                    </h2>
                    <br>
                    <div class="cmt">
                        @if(Auth::user())
                        <div class="cmt-img">
                            <img src="assets/ima/avanta2.png" id="mainbody_contentbody_img" width="45" height="45">
                        </div>
                        <div class="cmt-box">
                            <textarea name="txtComment" id='txtComment' rows="3" cols="20" id="mainbody_contentbody_txtComment" class="form-control send-sp" placeholder="Nhập nội dung..."></textarea>

                            <button id='btncmt' role="button" class="button-orange button-small alignright"><i class="fa fa-comment line-h20" aria-hidden="true"></i>&nbsp;BÌNH LUẬN</button>&nbsp;&nbsp;

                        </div>
                        @endif

                        <div class="sortPagiBar clear">
                            <div class="bottom-pagination">
                                <nav id="mainbody_contentbody_PaggingBottom"></nav>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="rat-head bold">
                            <div class="col-sm-4">
                                Thành viên
                            </div>
                            <div class="col-sm-8">
                                Nội dung đánh giá
                            </div>
                        </div>
                                     <?php
                                    $cmt=$files->comment->where('file_id',$files->id)->where('tinhtrang',1);
                                    ?>
                                    @foreach($cmt as $ct)

                                <div class="rat-item" itemprop="review" itemscope="" itemtype="http://schema.org/Review">
                                    <div class="col-sm-4">
                                        <span class="green bold" itemprop="author"><a  target="_blank" class="bold agreen">{{$ct->User->name}}</a></span>
                                        <div class="txt-colo"><span class="txt-colo">{{$ct->created_at}}</span></div>
                                        <meta itemprop="datePublished" content="11/09/2020 5:34:15 CH">
                                    </div>
                                    <div class="col-sm-8">

                                        <span itemprop="description">{{$ct->noidung}}</span>
                                    </div>
                                    <span itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
                                        <meta itemprop="worstRating" content="1">
                                        <meta itemprop="ratingValue" content="5">
                                        <meta itemprop="bestRating" content="5">
                                    </span>
                                </div>
                                <div class="line"></div>
                                @endforeach

</div>

        </div>
        <div class="column col-xs-12 col-sm-3" id="left_column">
           <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">

                <div id="boxUserInfo" class="left-module box-border2 bg-colo" itemprop="seller" itemscope="" itemtype="http://schema.org/Organization">
                    <div id="mainbody_contentbody_lblauthor" class="bold us-head">NGƯỜI ĐĂNG</div>
                    <div class="pro-left">
                        <a href="#" id="mainbody_contentbody_AvantaLink" target="_blank">
                            <img src="assets/ima/{{$files->user->hinhanh}}" id="mainbody_contentbody_Avanta" class="prof_img" width="90" height="90" itemprop="image" title="Thành viên {{$files->user->name}}" alt="{{$files->user->name}}">
                        </a>
                    </div>
                    <div class="pro-right">
                        <a href="/thanh-vien/tien-347883.htm" id="mainbody_contentbody_UserName" target="_blank" class="agreen bold title4 pro-title" itemprop="url" title="Thành viên Sĩ Tiến"><span id="mainbody_contentbody_NameText" itemprop="name">{{$files->user->name}}</span></a>
                        <div class="line"></div>
                        <div class="pro-money us-bg-no">
                            <span class="txt-colo">SDT: </span><b id="mainbody_contentbody_CodeFree">{{$files->user->sdt}}</b><br>
                        </div>

                    </div>
                    <div class="clear us-pad">&nbsp;</div>

                </div>
                <meta itemprop="priceCurrency" content="XU">
                <meta itemprop="price" content="0">
                <meta itemprop="priceValidUntil" content="7/8/2035 10:40:36 PM">
                <link itemprop="availability" href="http://schema.org/InStock">
                <meta itemprop="url" content="https://sharecode.vn/source-code/de-tai-quan-li-thu-vien-code-c-26401.htm">

                <div id="boxTopCode">


                </div>

            </div>

</div>
          </div>
      </div>

            </div>
        </div>
    </div>

        </div>
    </div>
 <!-- Thông báo không đủ xu download -->
    @if(Auth::user())
            <div class="modal fade" id="Message_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header popup_header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <p class="modal-title text-center" id="myModalLabel">DOWNLOAD SOURCE CODE</p>
                        </div>
                        <div class="modal-body">
                            <div class="row bg-pop-info bg-colo2">
                                <div class="col-xs-12">
                                    <span><i class="fa fa-user fa-lg" aria-hidden="true"></i>&nbsp;<span id="mainbody_contentbody_messUser">{{ Auth::user()->name }}</span></span>&nbsp;&nbsp;&nbsp;
                        <span><i class="fa fa-envelope fa-lg" aria-hidden="true"></i>&nbsp;<span id="mainbody_contentbody_messEmail">{{ Auth::user()->email }}</span></span>&nbsp;&nbsp;&nbsp;

                                    <span>Số dư:&nbsp;<b id="mainbody_contentbody_messMoneyAllow" class="agreen">{{ Auth::user()->sodu }} Xu</b></span>
                                </div>
                            </div>
                            <br>
                            @if(Auth::user()->sodu<$files->gia)
                            <div class="text-center orange">
                                **Tài khoản của bạn không đủ để download source code này!
                            </div>
                            @endif
                            <br>
                            <div class="form-horizontal  bold">
                                <div class="form-group">
                                    <label class="col-xs-6 control-label dt-label">Số dư:</label>
                                    <div class="col-xs-6">
                                        <div id="mainbody_contentbody_messMoney2" class="green dt-lbl">&nbsp;{{ Auth::user()->sodu }} Xu</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-6 control-label dt-label">Download code:</label>
                                    <div class="col-xs-6">
                                        <div id="mainbody_contentbody_messPrice" class="orange dt-lbl">-{{$files->gia}} Xu</div>
                                    </div>
                                </div>
                                <div class="col-sm-offset-3 col-sm-6 line"></div>
                                <div class="form-group">
                                    <label class="col-xs-6 control-label dt-label">Còn thiếu:</label>
                                    <div class="col-xs-6">
                                        @if(Auth::user()->sodu<$files->gia)
                                        <div id="mainbody_contentbody_messResult" class="orange dt-lbl">&nbsp;{{ $files->gia-Auth::user()->sodu }} Xu</div>
                                        @else
                                        <div id="mainbody_contentbody_messResult" class="orange dt-lbl">&nbsp;0 Xu</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="text-center">
                                @if(Auth::user()->sodu<$files->gia)
                                <a data-dismiss="modal" data-toggle="modal" data-target="#AddMoney" role="button" class="button-orange" onclick="createCaptcha();" title="Nạp tiền vào tài khoản"><i class="fa fa-money fa-lg" aria-hidden="true"></i>&nbsp; NẠP TIỀN VÀO TÀI KHOẢN</a>
                                @else
                                <a href="download-{{$files->id}}" class="button-orange" title="Download.."><i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i>&nbsp; Download ngay</a>
                                @endif
                            </div>
                            <br>
                        </div>
                        <div class="line_orn"></div>
                    </div>
                </div>
            </div>
    @endif
@endsection
