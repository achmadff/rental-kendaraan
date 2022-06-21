<?php
include("koneksi.php");
    $id = $_GET['id'];
    $select_employee	= mysqli_query($koneksi, "SELECT * FROM employee WHERE id_employee='$id'");
    $row_employee		= mysqli_fetch_assoc($select_employee);

    if(isset($_POST['update-employee'])){
        $id = $_POST['id'];
        $name		= mysqli_real_escape_string($koneksi, $_POST['name']);
        $username	= mysqli_real_escape_string($koneksi, $_POST['username']);
        $password	= mysqli_real_escape_string($koneksi, $_POST['password']);
        $phone		= mysqli_real_escape_string($koneksi, $_POST['phone']);

        $sql = "UPDATE employee SET name_employee='$name', username='$username', password='$password', phone='$phone' WHERE id_employee='$id'";
        $query = mysqli_query($koneksi, $sql);
        if( $query ){
            header('Location: index.php?page=master/employee/list-employee');
        } else {        
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location.href='index.php?page=master/employee/list-employee';
            </script>";
        }
    }
?>

<div class="row">
        <div class="col-sm-8">
            <section class="panel panel-default">
                <div class="panel panel-heading">Update employee</div>
                <div class="panel panel-body">

                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?= $row_employee['id_employee']; ?>">
					<div class="row">
						<div class="col-md-12">
                            <p>
                                <label for="name">Name</label><br />
                                <input class="form-control" name="name" id="name" type="text" required value="<?=$row_employee['name_employee'];?>" style="width: 100%" />
                            </p>
                            <p>
                                <label for="username">Username</label><br />
                                <input class="form-control" name="username" id="username" type="text" required value="<?=$row_employee['username'];?>" style="width: 100%"/>
                            </p>
                            <p>
                                <label for="password">Password</label><br />
                                <input class="form-control" name="password" id="password" type="password" required value="<?=$row_employee['password'];?>" style="width: 100%"/>
                            </p>

                            <p>
                                <label for="phone">Phone</label><br />
                                <input class="form-control" name="phone" id="phone" type="text" required value="<?=$row_employee['phone'];?>" style="width: 100%"/>
                            </p>
                            <p>
                                <!-- level -->
                                <label for="level">Level</label><br />
                                <select class="form-control" name="level" id="level" required style="width: 100%">
                                    <option value="">-- Pilih Level --</option>
                                    <option value="admin" <?php if($row_employee['level'] == 'admin'){ echo "selected"; } ?>>Admin</option>
                                    <option value="employee" <?php if($row_employee['level'] == 'user'){ echo "selected"; } ?>>User</option>
                            <br>
							<button type="submit" name="update-employee" class="btn btn-primary">SAVE</button>
						</div>
					</div>
				</form>

                </div>
            </section>
        </div>
</div>
