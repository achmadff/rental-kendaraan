<?php
include("koneksi.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM type_kendaraan WHERE id_type='$id'";
    $query = mysqli_query($koneksi, $sql);

    if( $query ){
        header('Location: index.php?page=master/merk/list-merk');
    } else {        
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='index.php?page=master/merk/list-merk';
        </script>";
    }
?>