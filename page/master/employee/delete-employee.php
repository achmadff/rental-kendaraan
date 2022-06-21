<?php
include("koneksi.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM employee WHERE id_employee='$id'";
    $query = mysqli_query($koneksi, $sql);

    if( $query ){
        header('Location: index.php?page=master/employee/list-employee');
    } else {        
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='index.php?page=master/employee/list-employee';
        </script>";
    }
?>