<!doctype html>
<html lang="en">
  <?php 
  include "../koneksi.php";
  session_start();
  if(!isset($_SESSION['admin'])){
    echo "<script>alert('Anda Harus Login Terlebih Dahulu!!!');
                window.location='index.html'</script>";
  }
  ?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../admin/admin2.css">
    <script src="https://kit.fontawesome.com/ef8e8d5793.js" crossorigin="anonymous"></script>
    <title>Halaman admin</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light ">
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
          <i class="fas fa-bars"></i> 
        </button>
        <a class="navbar-brand text-white" >BARBERIAN</a>
        <form class="form-inline my-2 my-lg-0 ml-auto">
            
            </form>
            <div class="icon ml-4">
                <h5>
                    <a href="../logout.php" class="fas fa-sign-out-alt mr-3 text-white" data-toggle="tooltip" title="Sign Out"></a>
                </h5>
  
            </div>
        </nav>

      <div class="row no-gutters">
      <div class="col-md-2,5 bg-dark  pt-4 ">
              <ul class="nav flex-column">
                      <ul class="sidebar navbar-nav">
                      <li class="nav-item" id="barbershop">
                          <a class="nav-link text-white" id="barbershop"><i class="fas fa-tags mr-2"></i>List Barbershop </a><hr class="bg-secondary">
                        </li>
                        <li class="nav-item" id="barberman">
                          <a class="nav-link text-white" ><i class="fas fa-store mr-2"></i>List Barberman</a><hr class="bg-secondary">
                        </li>
                        <li class="nav-item" id="customer">
                          <a class="nav-link text-white" ><i class="fas fa-user-edit mr-2"></i>List Customer</a><hr class="bg-secondary">
                        </li>
                        <li class="nav-item" id="order">
                          <a class="nav-link text-white" ><i class="fas fa-money-check mr-2"></i>List Order</a><hr class="bg-secondary">
                        </li>
                        <li class="nav-item" id="penjualan">
                          <a class="nav-link text-white" ><i class="fas fa-dollar-sign mr-3 ml-2"></i>List Penjualan</a><hr class="bg-secondary">
                        </li>
                        <li class="nav-item" id="harga">
                          <a class="nav-link text-white" ><i class="fas fa-dollar-sign mr-3 ml-2"></i>List Harga</a><hr class="bg-secondary">
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white" href="listharga.php"><i class="fas fa-dollar-sign mr-3 ml-2"></i>List Produk</a><hr class="bg-secondary">
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white" href="listharga.php"><i class="fas fa-dollar-sign mr-3 ml-2"></i>Tambah Admin</a><hr class="bg-secondary">
                        </li>
                    </ul>
        </div>
        <div class="col-md-8 p-5 pt-2">
        <div class="badan">

        </div>
            
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.4.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../admin/admin2.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
		$('.nav-item').on('click',function(){
			var menu = $(this).attr('id');
			if(menu == "barbershop"){
				$('.badan').load('barbershop.php');						
			}else if(menu == "barberman"){
				$('.badan').load('barberman.php');						
			}else if(menu == "customer"){
				$('.badan').load('customer.php');						
			}else if(menu == "order"){
				$('.badan').load('order.php');						
			}else if(menu == "penjualan"){
				$('.badan').load('penjualan.php');						
			}else if(menu == "harga"){
				$('.badan').load('harga.php');						
			}
		});
    });
    </script>
  </body>
</html>