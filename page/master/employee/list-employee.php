<?php
include('koneksi.php');

if($_SESSION['level'] != 'admin'){
    header("Location: index.php");
}

$select_employee	= mysqli_query($koneksi, "SELECT * FROM employee");
$num_user		= mysqli_num_rows($select_employee);

if(isset($_POST['regis-employee'])){
    $name		= mysqli_real_escape_string($koneksi, $_POST['name_employee']);
    $username	= mysqli_real_escape_string($koneksi, $_POST['username']);
    $password	= mysqli_real_escape_string($koneksi, $_POST['password']);
    $phone		= mysqli_real_escape_string($koneksi, $_POST['phone']);
    $level      = mysqli_real_escape_string($koneksi, $_POST['level']);

    $sql = "INSERT INTO employee (name_employee, username, password, phone) VALUES ('$name','$username', '$password', '$phone')";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
    }else{
        echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
    }
    header('Location: index.php?page=master/employee/list-employee');
}
?>
<style>

select{
	padding: 7px;
}

input[type=text] {
  background-color: white;
  padding: 5px 5px 5px 10px;
  margin-bottom: 8px;
  
}

table, th, td {
  border: 1px solid #ddd;
}

table{
	width: 100%;
}

th {
  font-weight: bold;
  border: none;
  
}

tr:nth-child(even) {
	background-color: #f2f2f2;
	}

th, td {
  padding: 10px;
  text-align: center;
}

.hidetext { -webkit-text-security: disc; /* Default */ }

</style>
<div class="list-jenis">
    <div class="row">
        <div class="col-sm-12">
        <section class="panel panel-default">
            <div class="panel panel-heading">List Employee</div>
                <div class="panel panel-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#regis-em"> + Tambahkan </button>
                        <br /> <br />
                        <!-- model -->
                        <div class="modal fade" id="regis-em" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="modal-title">Tambahkan Employee</h3>
                                    </div>
                                    <!-- form tambahan -->
                                    <form action="" method="POST" autocomplete="off">
                                        <div class="modal-body">
                                            <p>
                                                <label for="name_employee">Name</label><br />
                                                <input class="form-control" name="name_employee" id="name_employee" type="text" required />
                                            </p>
                                            <p>
                                                <label for="username">Username</label><br />
                                                <input class="form-control" name="username" id="username" type="text" required />
                                            </p>
                                            <p>
                                                <label for="password">Password</label><br />
                                                <input class="form-control" name="password" id="password" type="password" required />
                                            </p>
                                            <p>
                                                <label for="phone">Phone</label><br />
                                                <input class="form-control" name="phone" id="phone" type="number" required />
                                            </p>
                                            <p>
                                                <label for="level">Level</label><br />
                                                <select class="form-control" name="level" id="level" required>
                                                    <option value="">Pilih Level</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="employee">Employee</option>
                                                </select>
                                        </div>
                                        <div class="modal-footer">  
                                            <button type="close" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                            <button type="submit" class="btn btn-primary" name="regis-employee">ADD</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end model -->
                <table id="list-user" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Phone</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while($row	= mysqli_fetch_array($select_employee)){
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$row['id_employee']; ?></td>
                            <td><?=$row['name_employee']; ?></td>
                            <td><?=$row['username']; ?></td>
                            <td><?=$row['password']; ?></td>
                            <td><?=$row['phone']; ?></td>
                            <td><?=$row['level']; ?></td>
                            <td>
                                <a href="index.php?page=master/employee/update-employee&id=<?=$row['id_employee']; ?>" class="btn btn-sm btn-warning btn-sm">Edit</a>
                                <a href="index.php?page=master/employee/delete-employee&id=<?=$row['id_employee']; ?>" class="btn btn-sm btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        </div>
    </div>
</div>