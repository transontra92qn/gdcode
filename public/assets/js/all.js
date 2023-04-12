$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#submit").click(function(e){
        e.preventDefault();
        jQuery('#login_error').html('');
        jQuery('input[type="text"], input[type="password"]').removeClass('validation-failed');
        email = jQuery('#email').val();
        pass = jQuery('#password').val();
        _token=$('meta[name="csrf-token"]').attr('content');
        if (email == '') {
            jQuery('#log_username').addClass('validation-failed');
            jQuery('#login_error').html('Vui lòng nhập địa chỉ email.');
            jQuery('#email').focus();
            return false;
        }
        email_pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!email.match(email_pattern)) {
            jQuery('#log_username').addClass('validation-failed');
            jQuery('#login_error').html('Địa chỉ email không hợp lệ.');
            jQuery('#email').focus();
            return false;
        }
        if (pass == '') {
            jQuery('#log_password').addClass('validation-failed');
            jQuery('#login_error').html('Vui lòng nhập mật khẩu đăng nhập.');
            jQuery('#password').focus();
            return false;
        }

        $.ajax({
           type:'POST',
           url:'login',
           data:{email:  email, password: pass},
           success: function (data) {
                if(data.d==2){
                    jQuery('#log_username').addClass('validation-failed');
                    jQuery('#login_error').html('Email hoặc mật khẩu sai.');
                }
                if(data.d==3)
                    window.location.reload();
            }
        });
    });
// đăng kí

    $("#mainbody_contentbody_reg_email").blur(function(){
        var email = jQuery('#mainbody_contentbody_reg_email').val();
        jQuery('#mainbody_contentbody_reg_email').removeClass('validation-failed');
        if (email == '') {
            jQuery('#reg_error_email').html('Vui lòng nhập địa chỉ email.');
            jQuery('#mainbody_contentbody_reg_email').addClass('validation-failed');
            jQuery('#mainbody_contentbody_reg_email').focus();
            return false;
        }
        jQuery('#mainbody_contentbody_reg_email').removeClass('validation-failed');
        email_pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
         if (!email.match(email_pattern)) {
            jQuery('#reg_error_email').html('Địa chỉ email không hợp lệ.');
            jQuery('#mainbody_contentbody_reg_email').addClass('validation-failed');
            jQuery('#mainbody_contentbody_reg_email').focus();
            return false;
        }
        else{
            $.ajax({
               type:'POST',
               url:'checkmail',
               data:{email:  email},
               success: function (data) {
                    if(data.tt==1){
                        jQuery('#reg_error_email').html('Địa chỉ email đã tồn tại.');
                        jQuery('#mainbody_contentbody_reg_email').addClass('validation-failed');
                        jQuery('#mainbody_contentbody_reg_email').focus();
                        return false;
                    }
                    else
                        jQuery('#reg_error_email').hide();
                }
                });
            }
    });
    $("#submitdk").click(function(e){
        e.preventDefault();
        jQuery('#register_error').html('');
        jQuery('#reg_error_email').html('');
        jQuery('input[type="text"], input[type="password"]').removeClass('validation-failed');
        var email = jQuery('#mainbody_contentbody_reg_email').val();
        var p = jQuery('#mainbody_contentbody_reg_password').val();
        var rp = jQuery('#reg_re_password').val();
        if (p.length < 6 || p.length > 32) {
            jQuery('#register_error').html('Vui lòng nhập mật khẩu có độ dài từ 6-32 ký tự.');
            jQuery('#mainbody_contentbody_reg_password').addClass('validation-failed');
            jQuery('#mainbody_contentbody_reg_password').focus();
            return false;
        }
            if (p != rp) {
                jQuery('#register_error').html('Mật khẩu xác nhận không đúng.');
                jQuery('#reg_re_password').addClass('validation-failed');
                jQuery('#reg_re_password').focus();
                return false;
            }
            var fullname = jQuery('#fullname').val();
            if (fullname == '') {
                jQuery('#register_error').html('Vui lòng nhập họ tên.');
                jQuery('#fullname').addClass('validation-failed');
                jQuery('#fullname').focus();
                return false;
            }
            var phone = jQuery('#mainbody_contentbody_reg_phone').val();
            phone_pattern = /^(\+84|0)(([0-9]{9}))$/;
            if (phone== '') {
                phone.addClass('validation-failed');
                jQuery('#register_error').html('Chưa nhập số điện thoại.');
                phone.focus();
                return false;
            }
            else if (!phone.match(phone_pattern)) {
                phone.addClass('validation-failed');
                jQuery('#register_error').html('Số điện thoại không hợp lệ.');
                phone.focus();
                return false;
            }
            $.ajax({
               type:'POST',
               url:'doregister',
               data:{email: email, p: p, fullname: fullname, phone: phone},
               success: function (data) {
                    if(data.tt!=1)
                        jQuery('#register_error').html('Đăng kí không thành công.');
                    }

                });
            jQuery('#submitdk').addClass('popup_btn RegisterSuccess');

    });
//đổi mật khẩu
    $("#updatePasswordOld").blur(function(){
        jQuery('#updatePass_error').html('');
        jQuery('input[type="password"]').removeClass('validation-failed');
        email=jQuery('#emailcp').val();
        po = jQuery('#updatePasswordOld').val();
        if (po.length < 6 || po.length > 32) {
                 jQuery('#updatePass_error').html('Vui lòng nhập mật khẩu có độ dài từ 6-32 ký tự.');
                 jQuery('#updatePasswordOld').addClass('validation-failed');
                 jQuery('#updatePasswordOld').focus();
                 return false;
             }
        else{
            $.ajax({
               type:'POST',
               url:'checkpassword',
               data:{email: email ,password:  po},
               success: function (data) {
                    if(data.tt!=1){
                        jQuery('#updatePass_error').html('Mật khẩu của bạn không chính xác.');
                        jQuery('#updatePasswordOld').addClass('validation-failed');
                        jQuery('#updatePasswordOld').focus();
                        return false;
                        }
                    else
                        jQuery('#reg_error_email').hide();
                }
                });
        }
        });
    $("#btnUpdatePass").click(function(e){
                e.preventDefault();
        pn = jQuery('#updatePasswordNew').val();
        rp = jQuery('#updateRePasswordNew').val();
        if (pn.length < 6 || pn.length > 32) {
                 jQuery('#updatePass_error').html('Vui lòng nhập mật khẩu có độ dài từ 6-32 ký tự.');
                 jQuery('#updatePasswordNew').val().addClass('validation-failed');
                 jQuery('#updatePasswordNew').val().focus();
                 return false;
             }
        if (pn != rp) {
            jQuery('#updatePass_error').html('Mật khẩu xác nhận không đúng.');
            jQuery('#updateRePasswordNew').addClass('validation-failed');
            jQuery('#updateRePasswordNew').focus();
            return false;
         }
        $.ajax({
            type:'POST',
            url:'changepass',
            data:{email: email, newpass: pn},
            success: function (data) {
                if(data.tt!='tc'){
                     jQuery('#updatePass_error').html('Đổi mật khẩu  không thành công.');
                }

            }
            });
        jQuery('#btnUpdatePass').addClass('popup_btn SaveSuccess');
    });
    // cập nhật thông tin người dùng
    $("#btnUpdate").click(function(e){
                e.preventDefault();
           jQuery('input[type="text"]').removeClass('validation-failed');
           jQuery('#updateFullName_error').html('');
           require_fullname = jQuery('#updateFullName').val();
           if (require_fullname == '') {
               jQuery('#updateFullName_error').html('Chưa nhập');
               jQuery('#updateFullName').addClass('validation-failed');
               jQuery('#updateFullName').focus();
               return false;
           }
           jQuery('#updateFullName_error').html('');
            email = jQuery('#updateEmailMoney').val();
            email_pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (email != "" && !email.match(email_pattern)) {
                jQuery('#updateEmailMoney').addClass('validation-failed');
                jQuery('#updateFullName_error').html('Email không hợp lệ.');
                jQuery('#updateEmailMoney').focus();
                return false;
            }
            img = jQuery('#fulImage').val();
            jQuery('#updatePhone_error').html('');
            phone = jQuery('#updatePhone').val();
            phone_pattern = /^(\+84|0)(([0-9]{9}))$/;
           if (phone!= "" && !phone.match(phone_pattern)) {
               jQuery('#updatePhone').addClass('validation-failed');
               jQuery('#updatePhone_error').html('Số ĐT không hợp lệ.');
               jQuery('#updatePhone').focus();
               return false;
           }
            let myForm = document.getElementById('formprofile');
            let formData = new FormData(myForm);
           $.ajax({
            type: 'post',
            url: 'changeprofile',
            data: formData ,
            processData: false,
            contentType: false,
            success: function (data) {
                if(data.tt!=0){
                     alert('Không thành công.');
                }
                if(data.tt==0){
                     window.location.reload();
            }
        }
           })
            jQuery('#btnUpdate').addClass('popup_btn SaveSuccess');
       })
    $("#fulImage").change(function(){
            var url = document.getElementById("fulImage").value;
            if ((url.lastIndexOf('.jpg') == -1) && (url.lastIndexOf('.JPG') == -1) && (url.lastIndexOf('.png') == -1) && (url.lastIndexOf('.PNG') == -1) && (url.lastIndexOf('.gif') == -1) && (url.lastIndexOf('.GIF') == -1)) {
                alert('Chỉ được chọn file ảnh');
                document.getElementById('fulImage').value = "";
               return false;
           }
       })





});
