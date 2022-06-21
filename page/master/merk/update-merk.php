<?php
include("koneksi.php");
    $id = $_GET['id'];
    $select_type = mysqli_query($koneksi, "SELECT * FROM merk WHERE id_merk='$id'");
    $row_merk = mysqli_fetch_assoc($select_type);

    if(isset($_POST['update-merk'])){
        $name_merk		= $_POST['name-m'];
        $sql = "UPDATE merk SET name_merk='$name_merk' WHERE id_merk='$id'";
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
                <div class="panel panel-heading">Update Merk Kendaraan</div>
                <div class="panel panel-body">
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?= $row_merk['id_merk']; ?>">
					<div class="row">
						<div class="col-md-12">
                            <p>
                                <label for="name-m">Name Type</label><br />
                                <input class="form-control" name="name-m" id="name-m" type="text" required value="<?=$row_merk['name_merk'];?>" style="width: 100%" />
                            </p>
                            <br>
							<button type="submit" name="update-merk" class="btn btn-primary">SAVE</button>
						</div>
					</div>
				</form>
                </div>
            </section>
        </div>
</div>
