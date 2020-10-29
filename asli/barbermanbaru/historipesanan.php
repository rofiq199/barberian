
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6b0af4bcb3.js" crossorigin="anonymous"></script>

    <title>Barberian</title>
  </head>
  <?php
  include "../koneksi.php";
  include "sidebar.php";
  $username = $_SESSION['usernamebm'];
    $query = "SELECT * FROM pesan inner join data_customer on pesan.username_cs=data_customer.username_cs  WHERE ( status_pesan='selesai' or status_pesan='batal') and username_bm='".$username."' ";
    $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
    ?>
    <div class="content">
   		<nav class="navbar navbar-expand-lg">
   			<i class="fas fa-align-justify" id="sidebarCollapse"></i>
   		
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="far fa-bell"></i></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </div>
</nav>
<h3><i class="fas fa-history mr-2"></i>HISTORY ORDER</h3><hr>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">NO</th>
                <th scope="col">NAMA CUSTOMER</th>
                <th scope="col">ORDERAN</th>
                <th scope="col">HARGA</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">STATUS ORDERAN</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $no=1;
            while($data=mysqli_fetch_array($sql)){ ?>
              <tr>
                  <th scope="row"><?php echo $no++;?></th>
                  <td><?php echo $data['nama_cs'];?></td>
                  <td>Cukur Rambut</td>
                  <td>Rp <?php echo number_format($data['total_pesan'],0,",",".");?></td>
                  <td><?php echo date("d F Y",strtotime($data['tanggal_pesan']));?></TD>
                  <td><?php echo $data['status_pesan'];?></td>
              </tr>
            <?php }?>
            </tbody>
          </table>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script>
	    $(document).ready(function(){
			$('#sidebarCollapse').on('click',function(){
				$('#sidebar').toggleClass('active');
			});
        });  
	</script>
    
    
    
    
    
  </body>
</html>