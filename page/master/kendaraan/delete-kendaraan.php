<?php
include("koneksi.php");

    $id = $_GET['id'];
    
    $sql2 = "DELETE FROM supplier_kendaraan WHERE kendaraan_id='$id'";
    $query2 = mysqli_query($koneksi, $sql2);
    
    $sql = "DELETE FROM kendaraan WHERE id_kendaraan='$id'";
    $query = mysqli_query($koneksi, $sql);

    if( $query2 && $query ){
        header('Location: index.php?page=master/customer/list-customers');
    } else {        
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='index.php?page=master/customer/list-customers';
        </script>";
    }
?>