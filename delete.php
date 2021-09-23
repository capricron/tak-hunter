<?php 
    include 'other/conn.php';

    $var = $_GET['nama'];

    mysqli_query($koneksi, "DELETE FROM tak WHERE event='$var'");
    header('Location: index.php');
?>