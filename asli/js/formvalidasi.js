$(document).ready(function(){		
    $('.lihat').click(function(){
        if($(this).is(':checked')){
            $('#password').attr('type','text');
        }else{
            $('#password').attr('type','password');
        }
    });
$('#tombollogin').click(function (){
    var username = $('#username').val();
    var password = $('#password').val();
    if (username !="" && password !=""){
        return true;
    }else{
        alert('harap diisi!!!');
        return false;
    }
});
// barbershop
$('#tombolloginbs').click(function (){
    var username = $('#usernamebs').val();
    var password = $('#passwordbs').val();
    if (username !="" && password !=""){
        return true;
    }else{
        alert('harap diisi!!!');
        return false;
    }
});
$('.lihatbs').click(function(){
    if($(this).is(':checked')){
        $('#passwordbs').attr('type','text');
    }else{
        $('#passwordbs').attr('type','password');
    }
});
// barberman
$('#tombolloginbm').click(function (){
    var username = $('#usernamebm').val();
    var password = $('#passwordbm').val();
    if (username !="" && password !=""){
        return true;
    }else{
        alert('harap diisi!!!');
        return false;
    }
});
$('.lihatbm').click(function(){
    if($(this).is(':checked')){
        $('#passwordbm').attr('type','text');
    }else{
        $('#passwordbm').attr('type','password');
    }
});
});