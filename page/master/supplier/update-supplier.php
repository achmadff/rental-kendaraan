<?php
include("koneksi.php");
    $id = $_GET['id'];
    $select_supplier	= mysqli_query($koneksi, "SELECT * FROM supplier WHERE id_supplier='$id'");
    $row_supplier		= mysqli_fetch_assoc($select_supplier);

    if(isset($_POST['update-supplier'])){
        $id = $_POST['id'];
        $name		= mysqli_real_escape_string($koneksi, $_POST['name']);
        $email		= mysqli_real_escape_string($koneksi, $_POST['email']);
        $phone		= mysqli_real_escape_string($koneksi, $_POST['phone']);
        $address	= mysqli_real_escape_string($koneksi, $_POST['address']);

        $sql = "UPDATE supplier SET name_supplier='$name', email='$email', phone='$phone', address='$address' WHERE id_supplier='$id'";
        $query = mysqli_query($koneksi, $sql);
        if( $query ){
            header('Location: index.php?page=master/supplier/list-supplier');
        } else {        
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location.href='index.php?page=master/supplier/list-supplier';
            </script>";
        }
    }
?>

</style>`
<div class="row">
        <div class="col-sm-8">
            <section class="panel panel-default">
                <div class="panel panel-heading">Update supplier</div>
                <div class="panel panel-body">

                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?= $row_supplier['id_supplier']; ?>">
					<div class="row">
						<div class="col-md-12">
                            <p>
                                <label for="name">Name</label><br />
                                <input class="form-control" name="name" id="name" type="text" required value="<?=$row_supplier['name_supplier'];?>" style="width: 100%" />
                            </p>
                            <p>
                                <label for="email">Email</label><br />
                                <input class="form-control" name="email" id="email" type="text" required value="<?=$row_supplier['email'];?>" style="width: 100%"/>
                            </p>
                            <p>
                                <label for="phone">Phone</label><br />
                                <input class="form-control" name="phone" id="phone" type="text" required value="<?=$row_supplier['phone'];?>" style="width: 100%"/>
                            </p>
                            <p>
                                <label for="address">Alamat</label><br />
                                <input class="form-control" name="address" id="address" type="text" required value="<?=$row_supplier['address'];?>" style="width: 100%"/>
                            </p>
                            <br>
							<button type="submit" name="update-supplier" class="btn btn-primary">SAVE</button>
						</div>
					</div>
				</form>

                </div>
            </section>
        </div>
</div>
