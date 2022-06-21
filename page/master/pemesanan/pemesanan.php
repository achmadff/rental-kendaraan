<?php
include('koneksi.php');

$select_pemesanan	= mysqli_query($koneksi, 
"SELECT pemesanan.*,customer.name_customer, employee.name_employee, 
detail_pemesanan.*, kendaraan.name_kendaraan, kendaraan.price FROM pemesanan
LEFT JOIN customer ON pemesanan.customer_id = customer.id_customer 
LEFT JOIN employee ON pemesanan.employee_id = employee.id_employee 
LEFT JOIN detail_pemesanan ON pemesanan.id_pemesanan = detail_pemesanan.pemesanan_id
LEFT JOIN kendaraan ON detail_pemesanan.kendaraan_id = kendaraan.id_kendaraan;");

$select_idpemesanan = mysqli_query($koneksi,"SELECT pemesanan.id_pemesanan FROM pemesanan ORDER BY id_pemesanan DESC LIMIT 1");
$hasil = mysqli_fetch_assoc($select_idpemesanan);
$idpemesanan = $hasil['id_pemesanan']+1;


if(isset($_POST['regis-pemesanan'])){
    $create_at      = date("Y-m-d");
    $pemesanan_id   = $idpemesanan;
    $tgl_awal	    = $_POST['tgl_awal'];
    $tgl_akhir	    = $_POST['tgl_akhir'];
    $kendaraan_id   = $_POST['kendaraan_id'];
    $customer_id    = $_POST['name_pemesan'];
    $employee_id	= $_POST['name_pegawai'];

    $selisih    = strtotime($tgl_akhir) - strtotime($tgl_awal);
    $selisih    = $selisih / (60 * 60 * 24);
    $selisih    = $selisih + 1;
    $duration   = $selisih;

    $select_kendaraan	= mysqli_query($koneksi, "SELECT kendaraan.price FROM kendaraan WHERE id_kendaraan='$kendaraan_id'");
    $row_kendaraan		= mysqli_fetch_assoc($select_kendaraan);
    $total_price	    = $row_kendaraan['price'] * $duration;

    $sql = "INSERT INTO pemesanan (id_pemesanan,create_at, order_date, return_date, duration, customer_id, employee_id) VALUES ('$pemesanan_id','$create_at','$tgl_awal','$tgl_akhir','$duration','$customer_id','$employee_id')";   
    $sql2 = "INSERT INTO detail_pemesanan (pemesanan_id,kendaraan_id,total_price) VALUES ('$pemesanan_id','$kendaraan_id','$total_price')";

    $query = mysqli_query($koneksi, $sql);
    $query2 = mysqli_query($koneksi, $sql2);
    if($query&&$query2){
        echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
    }else{
        echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
    }
    //refresh halaman
    echo "<meta http-equiv='refresh' content='1;url=?page=master/pemesanan/list-pemesanan'>";
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
					<div class="row">
						<div class="col-md-8">
                            <div class="form-group">
                            <p>
                                <label for="name_pegawai">Nama_Pegawai</label><br />
                                <select class="form-control" name="name_pegawai" id="name_pegawai" required>
                                    <?php
                                        $select_employee	= mysqli_query($koneksi, "SELECT * FROM employee");
                                        $num_employee = mysqli_num_rows($select_employee);
                                        if($num_employee > 0){
                                            while($row_car = mysqli_fetch_assoc($select_employee)){
                                                echo "<option value='".$row_car['id_employee']."'>".$row_car['name_employee']."</option>";
                                            }
                                        }else{
                                            echo "<option value=''>Pegawai Kosong!</option>";
                                        }
                                    ?>
                                </select>
                            </p>
                            <p>
                                <label for="name_pemesan">Nama_Pemesan</label><br />
                                <select class="form-control" name="name_pemesan" id="name_pemesan" required>
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
                                <input type="date" class="form-control" name="tgl_awal" style="width: 55%;" required/>
                            </p>
                            <p>
                                <label for="tgl_akhir">Tanggal Akhir</label><br />
                                <input type="date" class="form-control" name="tgl_akhir" style="width: 55%;" required/>
                            </p>
                            <p>
                                <label for="kendaraan_id">Kendaraan</label><br />
                                <select class="form-control" name="kendaraan_id" id="kendaraan_id" required>
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
                            <br />
                            <button type="submit" class="btn btn-primary" name="regis-pemesanan">ADD</button>
                        </div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
