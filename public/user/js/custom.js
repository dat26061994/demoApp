$(document).ready(function () {
    $("#idlogin").ajaxForm({
        dataType: 'json',
        url: '/ajax/login.php',
        beforeSubmit: function () {
            $("#msg_err_login").show();
        },
        success: function (data) {
            if (data.code == 0) {
                alert(data.msg);
                location.href = data.url;
            } else {
                alert(data.msg);
                $("#email_login").focus();
                $("#msg_err_login").hide();
            }
        }
    });
    $("#idRegister").ajaxForm({
        dataType: 'json',
        url: '/ajax/logon.php',
        beforeSubmit: function () {
            $("#msg_err").show();
        },
        success: function (data) {
            //alert(data);
            //return;
            if (data.code == 0) {
                alert(data.msg);
                location.href = data.url;
            } else {
                alert(data.msg);
            }
        }
    });
    $("#changeInformation").ajaxForm({
        dataType: 'json',
        url: '/ajax/changeInformation.php',
        beforeSubmit: function () {
            $("#msg_err").show();
        },
        success: function (data) {
            //alert(data);
            //return;
            if (data.code == 0) {
                alert(data.msg);
                location.href = data.url;
            } else {
                alert(data.msg);
            }
        }
    });
    
       $("#changePass").ajaxForm({
        dataType: 'json',
        url: '/ajax/changepassword.php',
        beforeSubmit: function () {
            $("#msg_err").show();
        },
        success: function (data) {
            //alert(data);
            //return;
            if (data.code == 0) {
                alert(data.msg);
                location.href = data.url;
            } else {
                alert(data.msg);
            }
        }
    });
    
           $("#chatlode").ajaxForm({
        dataType: 'json',
        url: '/ajax/chat.php',
        beforeSubmit: function () {
            $("#msg_err").show();
        },
        success: function (data) {
            //alert(data);
            //return;
            if (data.code == 0) {
                alert(data.msg);
                location.href = data.url;
            } else {
                alert(data.msg);
            }
        }
    });
});






