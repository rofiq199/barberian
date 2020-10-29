<!DOCTYPE html>
<html lang="en">

<head>
  <title>TOKO SAYUR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
<center><h1>KERANJANG BELANJA MENGGUNAKAN LOCAL STORAGE</h1><H4>Anggap saja dibawah ini adalah product content ecommerce anda</H4></center>
<HR> 
<div class="container">
  <div class="row">
    <div class="col-lg-4">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" height="300px" width="300px" src="fading.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">fading (1000)</h5>
          <p class="card-text">fading</p>
          <button class="add btn btn-success" data-id="1" data-nama="fading" data-qty="1" data-price="1000"><i class="fa fa-shopping-cart" aria-hidden="true" ></i> Add</button>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" height="300px" width="300px" src="army.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">army (2000)</h5>
          <p class="card-text">army</p>
          <button class="add btn btn-success" data-id="2" data-nama="army" data-qty="1" data-price="2000"><i class="fa fa-shopping-cart" aria-hidden="true" ></i> Add</button>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" height="300px" width="300px" src="kim.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">kim jong un (3000)</h5>
          <p class="card-text">kim jong un</p>
          <button class="add btn btn-success" data-id="3" data-nama="kim" data-qty="1" data-price="3000"><i class="fa fa-shopping-cart" aria-hidden="true" ></i> Add</button>
        </div>
      </div>
    </div>
  </div>
  <br>
         
  <div id="cart" class=" bookmark-height-well well well-sm table-responsive"> 
        <center><h2>Keranjang Belanja Toko barber </h2><p>Anggap saja ini keranjang anda</p></center><hr>
        <ul id="cartBody" class="list-group"></ul>
        <div id="totalCart" class="col-lg-12"></div>
  </div>
  

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
  var mycart = [];
        $(function () {
            if (localStorage.mycart)
            {
                mycart = JSON.parse(localStorage.mycart);
                showCart();
            }
        });

      
      // mengambil data button ketika button dengan class add di click
      $('.add').click(function(){

        var id   = $(this).data("id");
        var nama   = $(this).data("nama");
        var qty   = $(this).data("qty");
        var price   = $(this).data("price");
        var subtotal = price * qty;
        addToCart(id,nama,qty,price,subtotal);   //kirimkan nilai ke fungsi addToCart, berhati - hati penggunaan inserting data usahakan serverside process, ini hanya untuk pembelajaran

      })

      function addToCart(id,nama,qty,price,subtotal) {
           //cek data in cart then update qty
            for (var i in mycart) {
                if(mycart[i].Id == id)
                {
                    //jika data available then
                    mycart[i].Qty = mycart[i].Qty+qty;
                    mycart[i].Subtotal = subtotal * mycart[i].Qty;
                    showCart(); //panggil fungsi showCart
                    saveCart(); // panggil fungsi saveCart untuk insert data
                    return;
                  
                }
            
            }


            // jika tidak ada insert all

            var item = { Id: id, Nama:nama, Qty:qty, Price:price, Subtotal:subtotal}; 
            mycart.push(item);
            saveCart();
            showCart();
        }

        function deleteItem(index){
            mycart.splice(index,1); // hapus item berdasarkan index
            showCart();
            saveCart();
        }

        function saveCart() {
            if ( window.localStorage)
            {
                localStorage.mycart = JSON.stringify(mycart);
            }
        }

        function showCart() {
          if (mycart.length == 0) { //cek nilai mycart, jika kosong maka hidden div dengan id cart
                $("#cart").css("visibility", "hidden");
                return;
          }

          $("#cart").css("visibility", "visible"); // jika tersedia maka tampilkan 
          $("#cartBody").empty();

          for (var i in mycart) { //tampilkan data dari local storage mycart, template bisa anda sesuaikan
            var item = mycart[i];
            var row = '<div class="media"><div class="media-left media-top"></div><div class="media-body"><div class="col-lg-12"><div class="col-lg-10"><p>Nama Product <span style="padding-left:0.8em">: </span>'
                        + item.Nama +'</p><p>Jumlah <span style="padding-left:4em">:</span> '+ item.Qty +'</p><p>Harga <span style="padding-left:4.5em">:</span> '+ item.Price +'</p></div><div class="col-lg-2"><br><button class="btn btn-danger btn-circle" onclick="deleteItem(' 
                              + i + ')"><i class="fa fa-trash"  ></i></button></div></div></div></div><hr>' ;
    
            $("#cartBody").append(row); //append ul dengan id cartbody
          }

          // untuk total
          var total = 0;
          for(var i = 0; i < mycart.length; i++) {
              total += mycart[i].Subtotal; //jumlahkan keseluruhan row subtotal dari mycart untuk mendapatkan total
          }
          totalCart.innerHTML='<label>Total Belanja Anda : '+total+'  </label><br><br><br>'; 
          //isikan div dengan id totalcart dengan nilai diatas
        }
</script>

</body>
</html>
