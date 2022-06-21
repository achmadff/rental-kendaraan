<?php
include('koneksi.php');
$id = $_GET['id'];
$select_pemesanan	= mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id_pemesanan='$id'");
$row_pemesanan		= mysqli_fetch_assoc($select_pemesanan);
$select_dpemesanan	= mysqli_query($koneksi, "SELECT * FROM detail_pemesanan WHERE pemesanan_id='$id'");
$row_dpemesanan		= mysqli_fetch_assoc($select_dpemesanan);


if(isset($_POST['regis-pemesanan'])){
    $create_at      = date("Y-m-d");
    $pemesanan_id   = $_POST['pemesanan_id'];
    $tgl_awal	    = $_POST['tgl_awal'];
    $tgl_akhir	    = $_POST['tgl_akhir'];
    $kendaraan_id   = $_POST['kendaraan_id'];
    $customer_id     = $_POST['name_pemesan'];
    $employee_id	= $_POST['name_pegawai'];
    $status = $_POST['status'];

    //proses hitung selisih hari
    $selisih = strtotime($tgl_akhir) - strtotime($tgl_awal);
    $selisih = $selisih / (60 * 60 * 24);
    $selisih = $selisih + 1;
    $duration       = $selisih;

    //proses hitung total harga
    $select_kendaraan	= mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE id_kendaraan='$kendaraan_id'");
    $row_kendaraan		= mysqli_fetch_assoc($select_kendaraan);
    $total_price	= $row_kendaraan['price'] * $duration;

    //update pemesanan 
    $sql = "UPDATE pemesanan SET order_date='$tgl_awal', return_date='$tgl_akhir', duration='$duration', customer_id='$customer_id', employee_id='$employee_id' WHERE id_pemesanan='$pemesanan_id'";
    //update detail_pemesanan
    $sql2 = "UPDATE detail_pemesanan SET kendaraan_id='$kendaraan_id', total_price='$total_price' , status='$status' WHERE pemesanan_id='$pemesanan_id'";
    $query = mysqli_query($koneksi, $sql);
    $query2 = mysqli_query($koneksi, $sql2);
    if($query && $query2){
        echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
    }else{
        echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
    }
    echo "<meta http-equiv='refresh' content='1;url=?page=master/pemesanan/list-pemesanan'>";
}

function hitung($angka,$angka2) {
    $hasil = $angka * $angka2;
    return $hasil;
}

?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				PEMESANAN
			</div>
            <div class="panel-body">
                <form method="POST" action="">
                    <input type="hidden" name="pemesanan_id" value="<?= $row_pemesanan['id_pemesanan']; ?>">
					<div class="row">
						<div class="col-md-8">
                            <div class="form-group">
                            <p>
                                <label for="name_pegawai">Nama_Pegawai</label><br />
                                <select class="form-control" name="name_pegawai" id="name_pegawai" value="<?=$row_pemesanan['employee_id'];?>" required>
                                    <?php
                                        $select_employee	= mysqli_query($koneksi, "SELECT * FROM employee");
                                        $num_employee = mysqli_num_rows($select_employee);
                                        if($num_employee > 0){
                                            while($row_employee = mysqli_fetch_assoc($select_employee)){
                                                echo "<option value='".$row_employee['id_employee']."'>".$row_employee['name_employee']."</option>";
                                            }
                                        }else{
                                            echo "<option value=''>Pegawai Kosong!</option>";
                                        }
                                    ?>
                                </select>
                            </p>
                            <p>
                                <label for="name_pemesan">Nama_Pemesan</label><br />
                                <select class="form-control" name="name_pemesan" id="name_pemesan" value="<?=$row_pemesanan['customer_id'];?>" required>
                                    <?php
                                        $select_user	= mysqli_query($koneksi, "SELECT * FROM customer");
                                        $num_user = mysqli_num_rows($select_user);
                                        if($num_user > 0){
                                            while($row_car = mysqli_fetch_assoc($select_user)){
                                                echo "<option value='".$row_car['id_customer']."'>".$row_car['name_customer']."</option>";
                                            }
                                        }else{
                                            echo "<option value=''>Customer Kosong!</option>";
                                        }
                                    ?>
                                </select>
                            </p>

                            <p>
                                <label for="tgl_awal">Tanggal Awal</label><br />
                                <input type="date" class="form-control" name="tgl_awal" style="width: 55%;" value="<?=$row_pemesanan['order_date'];?>" required/>
                            </p>
                            <p>
                                <label for="tgl_akhir">Tanggal Akhir</label><br />
                                <input type="date" class="form-control" name="tgl_akhir" style="width: 55%;" value="<?=$row_pemesanan['return_date'];?>" required/>
                            </p>
                            <p>
                                <label for="kendaraan_id">Kendaraan</label><br />
                                <select class="form-control" name="kendaraan_id" id="kendaraan_id" value="<?=$row_dpemesanan['kendaraan_id'];?>" required>
                                    <?php
                                        $select_car	= mysqli_query($koneksi, "SELECT * FROM kendaraan");
                                        $num_car = mysqli_num_rows($select_car);
                                        if($num_car > 0){
                                            while($row_car = mysqli_fetch_assoc($select_car)){
                                                echo "<option value='".$row_car['id_kendaraan']."'>".$row_car['name_kendaraan']."</option>";
                                            }
                                        }else{
                                            echo "<option value=''>Kendaraan Kosong!</option>";
                                        }
                                    ?>
                                </select>
                            </p>
                            <p>
                                <label for="status">Status</label><br />
                                <select class="form-control" name="status" id="status" value="<?=$row_dpemesanan['status'];?>">
                                        <option value="0">Process</option>
                                        <option value="1">Done</option>
                                        <option value="2">Cancel</option>
                                </select>
                            </p>
                            <br />
                            <button type="submit" class="btn btn-primary" name="regis-pemesanan">SAVE</button>
                        </div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
