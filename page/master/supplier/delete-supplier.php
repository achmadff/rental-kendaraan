<?php
include("koneksi.php");


    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM supplier WHERE id_supplier='$id'";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: index.php?page=master/supplier/list-supplier');
    } else {        
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='index.php?page=master/supplier/list-supplier';
        </script>";
    }
?>