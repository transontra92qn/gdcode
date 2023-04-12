@section('title')
    Tải code lên
@endsection
@extends('index')
@section('content')
<link href="./public/assets/css/jquery.Jcrop.css" rel="stylesheet" />
<link href="./public/assets/css/jquery.tag-editor.css" rel="stylesheet" />
<script src="./public/assets/js/jquery.caret.min.js"></script>
<script src="./public/assets/js/jquery.Jcrop.min.js"></script>
<script src="./public/assets/js/jquery.tag-editor.min.js"></script>
<script type="text/javascript">
    var srcimage;
    $(document).ready(function() {CKEDITOR.replace('ta_mota');
    CKEDITOR.replace( 'ta_hd');
     //Validate form
        $("#contentpage_btnUpload").click(function(e){
            var ktt = true;
            //TH tự đặt giá
            if (!ValidatePrice()) {
                jQuery('#txtPriceOther').focus();
                ktt = false;
            }
            if (!ValidateDemo()) {
                ktt = false;
                jQuery('#txtLinkDemo').focus();
            }

            if (!ValidateSub()) {
                jQuery('#txtSubTitle').focus();
                ktt = false;
            }
            if (!ValidateCate()) {
                jQuery('#ddlCategoryLang').focus();
                    ktt = false;
                }
                if (!ValidateTitle()) {
                    ktt = false;
                    jQuery('#contentpage_txtTitle').focus();
            }
            if (!ValidateImg()) {
                jQuery('#FileUpload1').focus();
                ktt = false;
            }
            if (ktt) {
                let myForm = document.getElementById('formupload');
                let formData = new FormData(myForm);
                var mota=CKEDITOR.instances.ta_mota.getData();
                var hdcd=CKEDITOR.instances.ta_hd.getData();
                formData.append("mota",mota);
                formData.append("hdcd",hdcd);
                var x1 = $('#imgX1').val();
                var y1 = $('#imgY1').val();
                var width = $('#imgWidth').val();
                var height = $('#imgHeight').val();
                formData.append("srcimage",srcimage);
                formData.append("x1",x1);
                formData.append("y1",y1);
                formData.append("width",width);
                formData.append("height",height);
                var id={{$file->id}};
                formData.append("id",id);
                $.ajax({
                    type: 'post',
                    url: 'editfile',
                    data: formData ,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data.tt='tt')
                            alert('thành công');
                    }

                   })
                //jQuery('#mainbody_contentbody_contentpage_btnUpload').addClass('upload_btn UploadSuccess');//hiển thị thông báo thành công
                return true;
            } else {
                if (jQuery('#upload_error').html() == "")
                    jQuery('#upload_error').html('Vui lòng điền thông tin còn thiếu.');
                return false;
            }
        })


})
//////////////////////////////////////////////////////////////////////////////////////

        var imgValue = false;
        //Up anh dai dien va crop
        $(function () {
            var jcrop_api;
            $('#FileUpload1').change(function () {
                $('#PopupImage').hide();
                $("#Image1").removeAttr('style');
                $("#Image1").css("display", "none");
                var reader = new FileReader();
                reader.onload = function (e) {
                    // destroy Jcrop if it is existed
                    if (typeof jcrop_api != 'undefined')
                        jcrop_api.destroy();
                    //$('#Image1').show();

                    $('#Image1').attr("src", e.target.result);
                    $('#Image1').Jcrop({
                        onChange: SetCoordinates,
                        onSelect: SetCoordinates,
                        aspectRatio: 4 / 3,
                        setSelect: [0, 0, 200, 150],
                        allowMove: true,
                        boxWidth: 500,
                        boxHeight: 500
                        //minSize: [ 100, 100 ],
                        //maxSize: [ 100, 100 ]

                    }, function () {
                        // Store the Jcrop API in the jcrop_api variable
                        jcrop_api = this;
                    })
                }
                reader.readAsDataURL($(this)[0].files[0]);
                //show loading
                $("#imgLoading").show();
                setTimeout('Showpopup()', 500);//delay 1s
                $(this).val("");
            });

            $('#btnCrop').click(function () {
                var x1 = $('#imgX1').val();
                var y1 = $('#imgY1').val();
                var width = $('#imgWidth').val();
                var height = $('#imgHeight').val();
                var canvas = $("#canvas")[0];
                var context = canvas.getContext('2d');
                var img = new Image();
                img.onload = function () {
                    canvas.height = 150;
                    canvas.width = 200;
                    context.drawImage(img, x1, y1, width, height, 0, 0, 200, 150);
                    $('#imgCropped').val(canvas.toDataURL());
                    //$('[id*=btnUpload]').show();
                    $('#imgUpdateCode').hide();//ản ảnh cũ
                };
                img.src = $('#Image1').attr("src");
                srcimage=img.src;
                $('#PopupImage').modal('hide');
                imgValue = true;
                ValidateImg();
            });


            //price
            $('#boxPrice').hide();
            $('#boxCheck').hide();
            $('input:radio[name="options"]').change(
                function () {
                    if (this.checked) {
                        if (this.value == 'Free') {
                            $('#boxPrice').hide();
                            $('#boxCheck').hide();
                            //$('input:radio[name="options"][value="Free"]').prop('checked', true);
                        }
                        else if (this.value == 'Code') {
                            $('#boxPrice').show();
                            $('#boxCheck').hide();
                            //$('input:radio[name="options"][value="Code"]').prop('checked', true);
                        }
                        else if (this.value == 'CodeOK') {
                            $('#boxPrice').show();
                            $('#boxCheck').show();
                           // $('input:radio[name="options"][value="CodeOK"]').prop('checked', true);
                        }
                    }
                });
            $('#li5').click(function () {
                $("#txtPriceOther").val(5);
                ChangPrice();
            });
            $('#li10').click(function () {
                $("#txtPriceOther").val(10);
                ChangPrice();
            });
            $('#li15').click(function () {
                $("#txtPriceOther").val(15);
                ChangPrice();
            });
            $('#li20').click(function () {
                $("#txtPriceOther").val(20);
                ChangPrice();
            });
            $('#li40').click(function () {
                $("#txtPriceOther").val(40);
                ChangPrice();
            });
            $('#li80').click(function () {
                $("#txtPriceOther").val(80);
                ChangPrice();
            });
            $('#li100').click(function () {
                $("#txtPriceOther").val(100);
                ChangPrice();
            });
            $('#li150').click(function () {
                $("#txtPriceOther").val(150);
                ChangPrice();
            });
            $('#li240').click(function () {
                $("#txtPriceOther").val(240);
                ChangPrice();
            });
            $('#li400').click(function () {
                $("#txtPriceOther").val(400);
                ChangPrice();
            });
            //edit
            var price = parseInt($("#txtPriceOther").val(), 10);
            if (price > 99)
                $('#chkCamKet').prop('checked', true);
            ChangPrice();
        });
        function SetCoordinates(c) {
            $('#imgX1').val(c.x);
            $('#imgY1').val(c.y);
            $('#imgWidth').val(c.w);
            $('#imgHeight').val(c.h);
            $('#btnCrop').show();
        };

        //popup image
        function Showpopup() {
            $('#PopupImage').modal('show');
            //hide loading
            $("#imgLoading").hide();
        }

        //close popup image
        $('#btnCancel').click(function (e) {
            $('#PopupImage').modal('hide');
        });



        function ValidateTitle() {
            var kt = true;
            jQuery('#title_error').html('');
            jQuery('#contentpage_txtTitle').removeClass('validation-failed');
            jQuery('#contentpage_txtTitle').removeClass('validation-success');
            jQuery('#successTitle').hide();
            var title = jQuery('#contentpage_txtTitle').val();
            if (title == '') {
                jQuery('#title_error').html('Vui lòng nhập tiêu đề.');
                kt = false;
            }
            else {
                title = title.trim();
                title = title.replace(/\s+/g, ' ');
                id={{$file->id}};
                jQuery('#contentpage_txtTitle').val(title);
                if (title.length < 20) {
                    jQuery('#title_error').html('Tiêu đề phải dài hơn 20 kí tự.');
                    kt = false;
                }
                else {
                   // console.log(title);
                    jQuery.ajax({
                        type: "POST",
                        url: "checktitleupdate",
                        data:{id:id, title: title },
                        dataType: "json",
                        async: false,
                        success: function (data) {
                            //alert(title);
                            if (data.tt == 1) {
                                jQuery('#title_error').html('Tiêu đề đã tồn tại.');
                                kt = false;
                            }
                        }
                    });                }
            }
            if (kt) {
                jQuery('#contentpage_txtTitle').addClass('validation-success');
                jQuery('#successTitle').show();
                return true;
            } else {
                jQuery('#contentpage_txtTitle').addClass('validation-failed');
                return false;
            }
        }

        function ValidateDemo() {
            jQuery('#demo_error').html('');
            jQuery('#txtLinkDemo').removeClass('validation-failed');
            jQuery('#txtLinkDemo').removeClass('validation-success');
            jQuery('#successDemo').hide();
            var link = jQuery('#txtLinkDemo').val().trim();
            if (link != '') {
                if (!(link.indexOf("http://") == 0 || link.indexOf("https://") == 0)) {
                    jQuery('#demo_error').html('Link phải bắt đầu http://... (or) https://...');
                    jQuery('#txtLinkDemo').addClass('validation-failed');
                    return false;
                }
                else {
                    jQuery('#txtLinkDemo').addClass('validation-success');
                    jQuery('#successDemo').show();
                    return true;
                }
            }
            return true;
        }
        function ValidateImg() {
            var kt = true;
            jQuery('#img_error').html('');
            jQuery('.u_image').removeClass('validation-failed');
            jQuery('.u_image').removeClass('validation-success');
            jQuery('#successImg').hide();

            if (($('#imgUpdateCode').attr('src') == '' || $('#imgUpdateCode').attr('src') == null) && imgValue == false) {
                jQuery('#img_error').html('Vui lòng chọn ảnh đại diện.');
                kt = false;
            }

            if (kt) {
                jQuery('.u_image').addClass('validation-success');
                jQuery('#successImg').show();
                return true;
            } else {
                jQuery('.u_image').addClass('validation-failed');
                return false;
            }
        }
        function ValidateCate() {
            var kt = true;
            jQuery('#lang_error').html('');
            jQuery('#ddlCategoryLang').removeClass('validation-failed');
            jQuery('#ddlCategoryLang').removeClass('validation-success');
            jQuery('#successCate').hide();
            var lang = jQuery('#ddlCategoryLang').val();
            if (lang == '0') {
                jQuery('#lang_error').html('Chưa chọn danh mục.');
                kt = false;
            }
            if (kt) {
                jQuery('#ddlCategoryLang').addClass('validation-success');
                jQuery('#successCate').show();
                return true;
            } else {
                jQuery('#ddlCategoryLang').addClass('validation-failed');
                return false;
            }
        }
        function ValidateSub() {
            var kt = true;
            jQuery('#subdetail_error').html('');
            jQuery('#txtSubTitle').removeClass('validation-failed');
            jQuery('#txtSubTitle').removeClass('validation-success');
            jQuery('#successSub').hide();
            var subtitle = jQuery('#txtSubTitle').val();
            if (subtitle == '') {
                jQuery('#subdetail_error').html('Vui lòng nhập mô tả ngắn.');
                kt = false;
            }
            else {
                subtitle = subtitle.trim();
                subtitle = subtitle.replace(/\s+/g, ' ');
                jQuery('#txtSubTitle').val(subtitle);
                if (subtitle.length < 70) {
                    jQuery('#subdetail_error').html('Mô tả ngắn phải dài hơn 70 kí tự.');
                    kt = false;
                }
            }
            if (kt) {
                jQuery('#txtSubTitle').addClass('validation-success');
                jQuery('#successSub').show();
                return true;
            } else {
                jQuery('#txtSubTitle').addClass('validation-failed');
                return false;
            }
        }

        function ValidatePrice() {
            var kt = true;
            jQuery('#price_error').html('');
            jQuery('#txtPriceOther').removeClass('validation-failed');
            jQuery('#txtPriceOther').removeClass('validation-success');
            jQuery('#successPrice').hide();
            //alert($('input:radio[name="options"]').val());
            if ($('input:radio[name="options"]:checked').val() == 'Free') {
                $('#boxPrice').hide();
                $('#boxCheck').hide();
                return true;
            }
            else {
                var price = jQuery('#txtPriceOther').val();
                if (price == '') {
                    jQuery('#price_error').html('Vui lòng nhập phí tải.');
                    kt = false;
                }
                else if (parseInt(price, 10) < 2) {
                    jQuery('#price_error').html('Phí tải tối thiểu là 2 Xu.');
                    kt = false;
                }
                else if (parseInt(price, 10) > 99 && document.getElementById("chkCamKet").checked == false) {
                    jQuery('#price_error').html('Chưa chọn cam kết hỗ trợ người mua.');
                    kt = false;
                }
            }

            if (kt) {
                jQuery('#txtPriceOther').addClass('validation-success');
                jQuery('#successPrice').show();
                return true;
            } else {
                jQuery('#txtPriceOther').addClass('validation-failed');
                return false;
            }
        }

        function CheckNumeric(e) {
                    if (window.event) // IE
                    {
                        if ((e.keyCode < 48 || e.keyCode > 57) & e.keyCode != 8) {
                            event.returnValue = false;
                            return false;
                        }
                    }
                    else { // Fire Fox
                        if ((e.which < 48 || e.which > 57) & e.which != 8) {
                            e.preventDefault();
                            return false;
                        }
                    }

                }
        function ChangPrice() {
            //price change
            var price = parseInt($("#txtPriceOther").val(), 10);
            if (price == 0) {
                $('#boxPrice').hide();
                $('#boxCheck').hide();
                jQuery('#lblCheckFree').addClass('active');
                jQuery('#lblCheckCode').removeClass('active');
                jQuery('#lblCheckCodeOK').removeClass('active');
                $('input:radio[name="options"][value="Free"]').prop('checked', true);

            } else if (price > 0 && price < 100) {
                $('#boxPrice').show();
                $('#boxCheck').hide();
                jQuery('#lblCheckFree').removeClass('active');
                jQuery('#lblCheckCode').addClass('active');
                jQuery('#lblCheckCodeOK').removeClass('active');
                $('input:radio[name="options"][value="Code"]').prop('checked', true);
            }
            else if (price > 99) {
                $('#boxPrice').show();
                $('#boxCheck').show();
                jQuery('#lblCheckFree').removeClass('active');
                jQuery('#lblCheckCode').removeClass('active');
                jQuery('#lblCheckCodeOK').addClass('active');
                $('input:radio[name="options"][value="CodeOK"]').prop('checked', true);
            }
            //alert($('input:radio[name="options"]:checked').val() + "====");
        }
        function sourcechange() {
        document.getElementById("namesource").innerHTML = $("#SourceUpload").val().replace(/.*(\/|\\)/, '');

            };
           //tiêu đề tải lên file
    function change() {
                console.log($("#FileUpload2").get(0).files.length);
                document.getElementById("countFiles").innerHTML = "Đã chọn <b>" + $("#FileUpload2").get(0).files.length + "</b> File";

                var fileUpload = $("FileUpload2");
                var maxFileSize = 2097152; // 2MB
                var countfile = 0;
                for (var i = 0; i < $("#FileUpload2").get(0).files.length; i++) {
                    if ($("#FileUpload2").get(0).files.size > maxFileSize) {
                        countfile = countfile + 1;
                    }
                }

                if (countfile > 0) {
                    document.getElementById("errFileMax2").innerHTML = "Chú ý: Có " + countfile + " ảnh vượt quá 2Mb sẽ không được tải nên";
                }
                else
                    document.getElementById("errFileMax2").innerHTML = "";

            };

    </script>
<div class="columns-container">
        <div class="container" id="columns">
            <div class="breadcrumb clearfix" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" class="agreen" href="index.php" title="Trở lại trang chủ">Trang chủ<meta itemprop="name" content="sharecode.vn"></a>
                     <meta itemprop="position" content="1">
                </span>
                <span class="navigation-pipe">&nbsp;</span>


    <a href="thong-tin-ca-nhan" id="mainbody_breadcrumb_breadpage_UserName" class="agreen">Ruka</a>
    <span class="navigation-pipe">&nbsp;</span>
    <a class="agreen" href="code-upload-cua-toi">
        <h2 class="abread">Code tải lên</h2>
    </a>
    <span class="navigation-pipe">&nbsp;</span>
    <a href="thanh-vien-upload" id="mainbody_breadcrumb_breadpage_pathLink" class="agreen">
        <h2 id="mainbody_breadcrumb_breadpage_pathTitle" class="abread">Tải code lên</h2>
    </a>


            </div>


    <div class="row">
        <div class="center_column col-xs-12 col-sm-9" id="center_column">


    <div class="box-bg">
        <div class="upload_form">
            <h1 class="title3 bold text-center up-title">UPLOAD CODE CHIA SẺ &amp; KIẾM TIỀN</h1>

            <div class="up-box">
                <div id="mainbody_contentbody_contentpage_panDefaultButton">
                    <div class="form-horizontal">
        <form id="formupload">
            <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-2 control-label bold">Ảnh đại diện <span class="text-error">*</span></label>
                            <div class="col-md-10">
                                <div class="u_image">
                                    <canvas id="canvas" height="5" width="5"></canvas>
                                    <img id="imgUpdateCode" src="public/assets/ima/{{$file->anhdaidien}}" class="u_image_edit">
                                    <div class="img_edit"></div>

                                    <span class="glyphicon glyphicon-ok form-control-feedback success-ic2" aria-hidden="true" id="successImg" style="display: none;"></span>
                                </div>
                                <div class="alignleft u_image_txt">

                                    <span id="img_error" class="text-error "></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label bold">Tiêu đề code <span class="text-error">*</span></label>
                            <div class="col-md-7">
                                <input name="txtTitle" type="text" maxlength="200" id="contentpage_txtTitle" class="form-control" value="{{$file->tenfile}}">
                                <span class="glyphicon glyphicon-ok form-control-feedback success-ic" aria-hidden="true" id="successTitle" style="display: none;"></span>
                            </div>
                            <div class="col-md-3 note-col">
                                <div class="form-control-static">
                                    <span id="title_error" class="text-error "></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label bold">Danh mục <span class="text-error">*</span></label>
                            <div class="col-md-4">
                                <select name="ddlCategoryLang" id="ddlCategoryLang" class="form-control" onblur="ValidateCate()" onchange="ValidateCate()">
                                   @foreach($danhmuc as $dm)
                                        <option
                                        @if($file->danhmuc_id == $dm->id)
                                            {{ 'selected' }}
                                        @endif
                                        value="{{$dm->id}}">{{$dm->name}}</option>
                                    @endforeach
                                </select>
                                <span class="glyphicon glyphicon-ok form-control-feedback success-ic3" aria-hidden="true" id="successCate" style="display: none;"></span>

                            </div>
                            <div class="col-md-6">
                                <div class="form-control-static"><span id="lang_error" class="text-error">&nbsp;</span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label bold">Mô tả ngắn <span class="text-error">*</span></label>
                            <div class="col-md-7">
                                <textarea name="txtSubTitle" rows="2" cols="20" id="txtSubTitle" class="form-control up-textarea" onblur="ValidateSub()" placeholder="Tối thiểu 70 kí tự" maxlength="200" style="height:60px;">{{ $file->motangnan }}</textarea>
                                <span class="glyphicon glyphicon-ok form-control-feedback success-ic3" aria-hidden="true" id="successSub" style="display: none;"></span>
                            </div>
                            <div class="col-md-3 note-col">
                                <span id="subdetail_error" class="text-error"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label bold">Link demo</label>
                            <div class="col-md-4">
                                <input name="txtLinkDemo" type="text" maxlength="300" id="txtLinkDemo" title="Link demo sản phẩm thực tế đã triển khai từ code" class="form-control" onblur="ValidateDemo()" value="{{$file->linkdemo}}">
                                <span class="glyphicon glyphicon-ok form-control-feedback success-ic" aria-hidden="true" id="successDemo" style="display: none;"></span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-control-static"><span id="demo_error" class="text-error"></span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label bold">Đặt phí tải</label>
                            <div class="col-md-10">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-warning active" id="lblCheckFree">
                                        <input type="radio" name="options" id="idFree" value="Free" checked="">
                                        Miễn phí (0 Xu)
                                    </label>
                                    <label class="btn btn-warning" id="lblCheckCode">
                                        <input type="radio" name="options" id="idCode" value="Code">
                                        Tham khảo (2Xu - 99Xu)
                                    </label>
                                    <label class="btn btn-warning" id="lblCheckCodeOK">
                                        <input type="radio" name="options" id="idCodeOK" value="CodeOK">
                                        Chất lượng (&gt;= 100 Xu)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="boxPrice" style="display: none;">
                            <div class="col-sm-6 col-md-offset-2 col-md-4">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default dropdown-toggle up-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chọn <span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-left">
                                            <li id="li5">5 Xu</li>
                                            <li id="li10">10 Xu</li>
                                            <li id="li15">15 Xu</li>
                                            <li id="li20">20 Xu</li>
                                            <li id="li40">40 Xu</li>
                                            <li id="li80">80 Xu</li>
                                            <li role="separator" class="divider"></li>
                                            <li id="li100">100 Xu</li>
                                            <li id="li150">150 Xu</li>
                                            <li id="li240">240 Xu</li>
                                            <li id="li400">400 Xu</li>
                                        </ul>

                                    </div>
                                    <input name="txtPriceOther" type="number" maxlength="4" id="txtPriceOther" class="bold form-control" onblur="ValidatePrice()"  onkeyup="ChangPrice();" placeholder="Tự nhập phí tải">
                                    <span class="glyphicon glyphicon-ok form-control-feedback success-ic" aria-hidden="true" id="successPrice" style="right: 60px; display: none;"></span>
                                    <span class="input-group-addon">Xu <span data-toggle="tooltip" data-placement="top" ></span></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-control-static">
                                    <span id="price_error" class="text-error">&nbsp;</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label bold">Mô tả chi tiết <span class="text-error">*</span></label>
                            <div class="col-md-10" id="editorDetail">
                                <textarea id="ta_mota" name="ta_mota"  rows="10" cols="90"> {{$file->mota}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label bold">Hướng dẫn cài đặt</label>
                            <div class="col-md-10">
                               <textarea id="ta_hd" name="ta_hd" rows="10"  cols="90">{{$file->hdcaidat}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <div id="listSuggest"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <span id="upload_error" class="text-error">&nbsp;</span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                                <a id="contentpage_btnUpload" class="button-orange" ><i class="fa fa-cloud-upload fa-lg" aria-hidden="true"></i>&nbsp;Cập nhật</a>
                                &nbsp;&nbsp;
                            </div>
                        </div>
                    </div>

                        </form>
</div>
            </div>
        </div>


        <div id="imgLoading" class="popup_loading">
            <img src="assets/images/loading.gif">
            <div>Đang xử lý...</div>
        </div>
        <div class="modal fade" id="PopupImage" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="text-center up-pad">
                        <strong class="orange title4 text-uppercase">Kéo để chọn vùng ảnh đẹp nhất</strong><br>
                        <em>(Đặt chuột vào các ô vuông và "Kéo")</em>
                    </div>
                    <img id="Image1" src="" alt="" style="display: none; margin: 0px auto;">
                    <div class="text-center up-pad">
                        <input type="button" id="btnCrop" class="button-green button-small" value="Chọn ảnh">
                        <input type="button" id="btnCancel" class="button-orange button-small" value="  Hủy bỏ  ">
                    </div>
                    <input type="hidden" name="imgX1" id="imgX1">
                    <input type="hidden" name="imgY1" id="imgY1">
                    <input type="hidden" name="imgWidth" id="imgWidth">
                    <input type="hidden" name="imgHeight" id="imgHeight">
                    <input type="hidden" name="imgCropped" id="imgCropped">
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

        </div>

@endsection
