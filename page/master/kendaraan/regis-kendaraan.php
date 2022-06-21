
<?php
    
    include('koneksi.php');
    $select_kendaraan	= mysqli_query($koneksi, "SELECT * FROM kendaraan");
    $num_kendaraan		= mysqli_num_rows($select_kendaraan);
    if($_SESSION['level'] != 'admin'){
        header("Location: index.php");
    }

    if(isset($_POST['regis-kendaraan'])){
        $name		=  $_POST['name'];
        $transmisi	=  $_POST['transmisi'];
        $color	= $_POST['warna'];
        $plat	= $_POST['plat'];
        $price		= $_POST['harga'];
        $id_merk	= $_POST['type'];
        $id_type	=  $_POST['merk'];

        $sql = "INSERT INTO kendaraan (name_kendaraan, transmisi, color, plat, price, merk_id, type_id) VALUES ('$name', '$transmisi', '$color', '$plat', '$price', '$id_merk', '$id_type')";
        $query = mysqli_query($koneksi, $sql);
        if($query){
            echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
        }else{
            echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
        }
        echo "<meta http-equiv='refresh' content='1;url=?page=master/kendaraan/list-kendaraan'>";
    }
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Registrasi Kendaraan</h3>
			</div>
			<div class="panel-body">
				<form method="POST" action="">
					<div class="row">
						<div class="col-md-8">
                                <p>
                                    <label for="type">Tipe Kendaraan</label><br />
                                    <select class="form-control" name="type" id="type" required>
                                        <?php
                                            $select_type	= mysqli_query($koneksi, "SELECT * FROM type_kendaraan");
                                            $num_type       = mysqli_num_rows($select_type);
                                            if($num_type > 0){
                                                while($row_type = mysqli_fetch_assoc($select_type)){
                                                    echo "<option value='".$row_type['id_type']."'>".$row_type['name_type']."</option>";
                                                }
                                            }else{
                                                echo "<option value=''>Type Kendaraan Kosong!</option>";
                                            }
                                        ?>
                                    </select>
                                </p>
                                <p>
                                    <label for="merk">Merk Kendaraan</label><br /> 
                                    <select class="form-control" name="merk" id="merk" required>
                                        <?php
                                            $select_merk	= mysqli_query($koneksi, "SELECT * FROM merk");
                                            $num_merk		= mysqli_num_rows($select_merk);
                                            if($num_merk > 0){
                                                while($row_merk = mysqli_fetch_assoc($select_merk)){
                                                    echo "<option value='".$row_merk['id_merk']."'>".$row_merk['name_merk']."</option>";
                                                }
                                            }else{
                                                echo "<option value=''>Merk Kendaraan Kosong!</option>";
                                            }
                                        ?>
                                    </select>
                                </p>
                                <p>
                                    <label for="name">Nama Kendaraan</label><br />
                                    <input class="form-control" name="name" id="name" type="text" required />
                                </p>
                                <p>
                                    <label for="transmisi">Transmisi Kendaraan</label><br />
                                    <select class="form-control" name="transmisi" id="transmisi" required>
                                        <option value="">Pilih Transmisi</option>
                                        <option value="Manual">Manual</option>
                                        <option value="Automatic">Automatic</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="warna">Warna Kendaraan</label><br />
                                    <input class="form-control" name="warna" id="warna" type="text" required />
                                </p>
                                <p>
                                    <label for="plat">Plat Kendaraan</label><br />
                                    <input class="form-control" name="plat" id="plat" type="text" required />
                                </p>
                                <p>
                                    <label for="supplier_id">Nama Supplier</label><br />
                                    <select class="form-control" name="supplier_id" id="supplier_id" required>
                                    <?php
                                        $select_supplier = mysqli_query($koneksi, "SELECT * FROM supplier");
                                        while($row_supplier = mysqli_fetch_assoc($select_supplier)){
                                            echo "<option value='$row_supplier[id_supplier]'>$row_supplier[name_supplier]</option>";
                                        }
                                    ?>
                                    </select>
                                </p>
                                <p>
                                    <label for="harga">Harga Kendaraan</label><br />
                                    <input class="form-control" name="harga" id="harga" type="text" required />
                                </p>
                                <br />
                                <a href="index.php?page=master/kendaraan/list-kendaraan" class="btn btn-sm btn-info btn-warning"><i class="fa fa-reply"></i> Kembali</a>
                                <button type="submit" class="btn btn-sm btn-primary" name="regis-kendaraan">ADD</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>