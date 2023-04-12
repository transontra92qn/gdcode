@section('title')
    Trang Chủ
@endsection
@extends('index')

@section('content')
<div class="container" id="columns">
        <div id="mainbody_upPannel">
                <div class="row">
                    <div class="center_column col-xs-12 col-sm-9" id="center_column">
                        <div id="view-product-list" class="view-product-list">
                            <h1 class="page-heading">
                                <span class="page-heading-title">SOURCE CODE</span>
                            </h1>
                            <!-- PRODUCT LIST -->

                           <ul class="row product-list style2 grid mar-top4">
                                    @foreach($files as $f)
                                            <li class="col-sx-12 col-sm-3" itemscope="" itemtype="http://schema.org/Product">
                                                <div class="product-container">
                                                    <div class="left-block">
                                                        <a href="#">
                                                            <div class="img-box">
                                                                <img class="img-responsive" itemprop="image" src="assets/ima/{{$f->anhdaidien}}" alt="{{$f->tenfile}}" title="Download {{$f->tenfile}}">
                                                            </div>
                                                        </a>

                                                        <a class="cate" href="#">{{$f->danhmuc->name}}</a>
                                                    </div>
                                                    <div class="right-block">
                                                        <a itemprop="url" href="source-code-{{$f->id}}-{{$f->tenkhongdau}}">
                                                            <h2 itemprop="name" class="product-name bold" title="Download Phần mềm quản lý vựa trái cây C#">{{$f->tenfile}}</h2>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                </ul>
                        </div>
                      <div class="sortPagiBar">
                            <div class="bottom-pagination">
                                <nav id="mainbody_PaggingBottom">
                                   {!!$files->links()!!}
                            </div>

                        </div>

                    </div>
                    <div class="column col-xs-12 col-sm-3" id="left_column" style="margin-top: 15px;">


                    </div>
                </div>

</div>
    </div>
@endsection
