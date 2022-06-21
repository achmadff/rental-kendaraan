<?php
include("koneksi.php");
    $id = $_GET['id'];
    $select_type = mysqli_query($koneksi, "SELECT * FROM type_kendaraan WHERE id_type='$id'");
    $row_type = mysqli_fetch_assoc($select_type);

    if(isset($_POST['update-type'])){
        $name_type		= $_POST['name-t'];
        $sql = "UPDATE type_kendaraan SET name_type='$name_type' WHERE id_type='$id'";
        $query = mysqli_query($koneksi, $sql);
        if($query){
            echo "<div class='alert alert-success'>UPDATE Berhasil!</div>";
        }else{
            echo "<div class='alert alert-danger'>UPDATE Gagal!</div>";
        }
        header('Location: index.php?page=master/merk/list-merk');
    }
?>

<div class="row">
        <div class="col-sm-8">
            <section class="panel panel-default">
                <div class="panel panel-heading">Update Type Kendaraan</div>
                <div class="panel panel-body">
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?= $row_type['id_type']; ?>">
					<div class="row">
						<div class="col-md-12">
                            <p>
                                <label for="name-t">Name Type</label><br />
                                <input class="form-control" name="name-t" id="name-t" type="text" required value="<?=$row_type['name_type'];?>" style="width: 100%" />
                            </p>
                            <br>
							<button type="submit" name="update-type" class="btn btn-primary">SAVE</button>
						</div>
					</div>
				</form>
                </div>
            </section>
        </div>
</div>
