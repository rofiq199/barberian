<!doctype html>
<html lang="en">
  <head>
  <?php 
    include "../koneksi.php";
    include "navbar.php";
    $nama = $_SESSION['usernamebs'];
    $query1 = "SELECT * FROM antrian where username_bs='".$nama."' ";
    $sql1 = mysqli_query($koneksi, $query1);  // Eksekusi/Jalankan query dari variabel $query
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="admin2.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin1.css">
    <script src="https://kit.fontawesome.com/ef8e8d5793.js" crossorigin="anonymous"></script>
    <title>History</title>
  </head>
  <body>
        <div class="col-md-8 p-5 pt-2">
          <h3><i class="fas fa-history mr-2"></i>HISTORY ORDER</h3><hr>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">KODE ANTRIAN</th>
                <th scope="col">NAMA CUSTOMER</th>
                <th scope="col">NO ANTRIAN</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">STATUS ORDERAN</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            while($data=mysqli_fetch_array($sql1)){ ?>
              <tr>
                  <th scope="row"><?php echo $data['kode_antrian'];?></th>
                  <td><?php echo $data['username_cs'];?></td>
                  <td><?php echo $data['no_antrian'];?></td>
                  <td><?php echo date("d F Y H:i",strtotime($data['tanggal_antrian']));?></TD>
                  <td><?php echo $data['status_antrian'];?></td>
              </tr>
            <?php }?>
            </tbody>
          </table>
          </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin1.js"></script>

  </body>
</html>