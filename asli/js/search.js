$(document).ready(function(){
    $('#cari').on('keyup',function() {
        $('#tampil').load('caribarber1.php?id=' + $('#cari').val());
        console.log($('#cari').val())

    });

});