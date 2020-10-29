$(document).ready(function(){
    $('#cari').on('click',function() {
        $('#tampil').load('pcart.php?act=add&amp;barang_id=' + $('#produk').val() + '&amp;ref=halproduk.php');
        console.log($('#produk').val())

    });
    // pcart.php?act=add&amp;barang_id=<?=$rows->kode_produk?>&amp;ref=halproduk.php
});