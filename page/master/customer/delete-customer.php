<?php
include("koneksi.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM customer WHERE id_customer='$id'";
    $query = mysqli_query($koneksi, $sql);

    if( $query ){
        header('Location: index.php?page=master/customer/list-customers');
    } else {        
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='index.php?page=master/customer/list-customers';
        </script>";
    }
?>