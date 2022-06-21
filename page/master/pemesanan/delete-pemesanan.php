<?php
include("koneksi.php");

    $id = $_GET['id'];
    
    $sql2 = "DELETE FROM detail_pemensanan WHERE pemensanan_id='$id'";
    $query2 = mysqli_query($koneksi, $sql2);
    
    $sql = "DELETE FROM pemesanan WHERE id_pemesanan='$id'";
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