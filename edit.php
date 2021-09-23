<?php
    require 'other/conn.php';

    $id = $_GET['nama'];

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        $link = $_POST['link'];

        mysqli_query($koneksi, "UPDATE tak SET event='$nama', tanggal='$tanggal', jam='$jam', link='$link' WHERE event='$id'");
        header('Location: index.php');
    };

    $query = mysqli_query($koneksi, "SELECT * FROM tak WHERE event='$id'");
    $data = mysqli_fetch_assoc($query);
?>

<style>
    @media (max-width:1000px) {
        label,input,button{
            font-size:30px;
            width: 500px;
            height: 50px
        }

    }
</style>

<form action="" method="post">
    <div class="nama">
        <label for="nama">Nama Event: </label>
        <input type="text" id="nama" name="nama" value="<?= $data['event'] ?>">
    </div>
    <br>
    <div class="tanggal">
        <label for="tanggal">Tanggal Event: </label>
        <input type="date" name="tanggal" 
        placeholder="dd-mm-yyyy" value="<?= $data['tanggal']?>">
    </div>
    <br>
    <div class="jam">
        <label for="jam">Jam Pelaksanaan</label>
        <input type="time" id="jam" name="jam" value="<?=$data['jam']?>">
    </div>
    <br>
    <div class="link">
        <label for="link">Link Pendaftaran</label>
        <input type="text" id="link" name='link' value="<?=$data['link']?>">
        <p>*harap tambahkan https://</p>
    </div>
    <br>
    <button type="submit" name="submit">Kirim</button>
</form>
