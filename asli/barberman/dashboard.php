<?php
$koneksi     = mysqli_connect("localhost", "root", "", "penjualan");
$bulan       = mysqli_query($koneksi, "SELECT bulan FROM penjualan WHERE tahun='2016' order by id asc");
$penghasilan = mysqli_query($koneksi, "SELECT hasil_penjualan FROM penjualan WHERE tahun='2016' order by id asc");
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin1.css">
    <script src="https://kit.fontawesome.com/ef8e8d5793.js" crossorigin="anonymous"></script>
    <title>DASHBOARD</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand text-white" href="">BARBERIAN</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
          <i class="fas fa-bars"></i> 
        </button>

          <form class="form-inline my-2 my-lg-0 ml-auto">
            
          </form>
          <div class="icon ml-4">
              <h5>
              <i class="fas fa-bell text-white mr-3"></i>
              <i onclick="window.location.href='../logout.php'" class="fas fa-sign-out-alt mr-3 text-white" data-toggle="tooltip" title="Sign Out"></i>
              </h5>

          </div>
        </div>
      </nav>

      <div class="row no-gutters mt-5">
        <div class="col-md-2,5 bg-dark mt-2 pt-4 ">
                <ul class="nav flex-column">
                    <ul class="nav flex-column">
                        <ul class="sidebar navbar-nav"> 
                             <li class="nav-item">
                                  <a class="nav-link active text-white" href="dashboard.php"><i class="fas fa-shopping-cart mr-2"></i>DASHBOARD</a><hr class="bg-secondary">
                             </li>    
                             <li class="nav-item">
                                  <a class="nav-link active text-white" href="Order.php"><i class="fas fa-tags mr-2"></i>LIHAT ORDERAN</a><hr class="bg-secondary">
                             </li>
                             <li class="nav-item">
                                  <a class="nav-link active text-white" href="profilbm.php"><i class="fas fa-user mr-2"></i>LIHAT PROFIL</a><hr class="bg-secondary">
                             </li>
                             <li class="nav-item">
                                  <a class="nav-link text-white" href="history.php"><i class="fas fa-history mr-2"></i>HISTORY ORDER</a><hr class="bg-secondary">
                             </li>
                      </ul>
        </div>
        <div class="col-md-8 p-5 pt-2">
          <h3><i class="fas fa-shopping-cart mr-2"></i>DASHBOARD</h3><hr>
          <table class="table table-striped table-bordered">

        
          <html>
    <head>
        <title>grafik</title>
        <script src="Chart.bundle.js"></script>
 
        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($bulan)) { echo '"' . $b['bulan'] . '",';}?>],
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php while ($p = mysqli_fetch_array($penghasilan)) { echo '"' . $p['hasil_penjualan'] . '",';}?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
    </body>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin1.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  </body>
</html>