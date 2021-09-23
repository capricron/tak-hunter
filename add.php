<?php
    require 'other/conn.php';

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        $link = $_POST['link'];

        $masuk = mysqli_query($koneksi, "INSERT INTO tak VALUES('$nama','$tanggal','$jam','$link')");
        
        if ($masuk) {
            echo "<div class='alert alert-success'>Siswa berhasil ditambahkan</div>";
            header("Location: index.php");
        } else {
            echo "<div class='alert alert-danger'>Siswa gagal ditambahkan</div>";
        };
    };
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
        <input type="text" id="nama" name="nama">
    </div>
    <br>
    <div class="tanggal">
        <label for="tanggal">Tanggal Event: </label>
        <input type="date" name="tanggal" 
        placeholder="dd-mm-yyyy" value="">
    </div>
    <br>
    <div class="jam">
        <label for="jam">Jam Pelaksanaan</label>
        <input type="time" id="jam" name="jam">
    </div>
    <br>
    <div class="link">
        <label for="link">Link Pendaftaran</label>
        <input type="text" id="link" name='link'>
        <p>*harap tambahkan https://</p>
    </div>
    <br>
    <button type="submit" name="submit">Kirim</button>
</form>
