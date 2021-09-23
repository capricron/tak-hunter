<?php
    require 'other/conn.php';

    $query = mysqli_query($koneksi, 'SELECT * FROM tak ORDER BY tanggal ASC');
    $datas = [];
    while($dt = mysqli_fetch_assoc($query)){
        $datas[] = $dt;
    };
?>

<?php 
    foreach($datas as $data){
        if(date('Y-m-d') > $data['tanggal'] ){
            mysqli_query($koneksi, "DELETE FROM tak WHERE tanggal='$data[tanggal]'");
        };
    };
?>

<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>TAK HUNTER</title>
  </head>
  <body>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-1">
                    <img src="pp.png" alt="">
                </div>
                <div class="col-lg-11">
                    <h1>TAK HUNTER</h1>
                    <p>Saling Share Informasi Webinar Penghasil TAK</p>
                </div>
            </div>
        </div>
        <div class="tambahan">
            <a href="add.php">
                <span>Tambah Event</span>
            </a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="konten">
        <table class="table" border="0">
            <tr>
                <th>Event</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Link</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php foreach($datas as $data) : ?>
            <?php
                if(date('Y-m-d') == $data['tanggal'] ){
                    echo '<tr style=" background-color: #25e698;">';
                }else {echo '<tr>';};
            ?>
                <td>
                    <p><?=$data['event']?></p> 
                </td>
                <td>
                    <p>
                        <?php
                            $tanggal = $data['tanggal'];
                            $tanggal = str_replace('/', '-', $tanggal);
                            echo date('d M Y', strtotime($tanggal));
                        ?>
                    </p>
                </td>
                <td>
                    <p><?=$data['jam']?></p>
                </td>
                <td>
                    <a target="_blank" href="<?=$data['link']?>"> 
                        <p><?=$data['link']?></p>
                    </a>
                </td>
                <td>
                    <a href="edit.php?nama=<?= $data['event']?>">Ubah</a>                </td>
                <td>
                    <a href="delete.php?nama=<?= $data['event']?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>