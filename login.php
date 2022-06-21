<?php
ob_start();
session_start();
include 'page/koneksi.php';
?>
<?php
if(isset($_POST['login']) && !empty($_POST['login'])){
    $username 	= mysqli_real_escape_string($koneksi, $_POST['username']);
    $password	= mysqli_real_escape_string($koneksi, $_POST['password']);
    $sql = "SELECT * FROM employee WHERE username = '$username' AND password = '$password'";
	$select_user	= mysqli_query($koneksi, $sql);
	$num_user		= mysqli_num_rows($select_user);
	$row_user		= mysqli_fetch_array($select_user);
	if($num_user > 0){
		if($row_user['username'] == $username && $row_user['password'] == $password){
            $_SESSION['username'] = $row_user['username'];
            $_SESSION['level'] = $row_user['level'];
            header('location: page/index.php');
        }
	}
    else{ 

        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
?>
<script>
    window.location.href = 'index.php';
</script>
<?php
    }
}
?>
