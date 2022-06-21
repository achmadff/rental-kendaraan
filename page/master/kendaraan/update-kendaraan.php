<?php
include("koneksi.php");
    $id = $_GET['id'];
    $select_kendaraan	= mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE id_kendaraan='$id'");
    $row_kendaraan		= mysqli_fetch_assoc($select_kendaraan);

    $select_supd	= mysqli_query($koneksi, "SELECT * FROM supplier_kendaraan WHERE kendaraan_id='$id'");
    $row_supd		= mysqli_fetch_assoc($select_supd);

    if(isset($_POST['update-kendaraan'])){
        $id = $_POST['id'];
        $name	=  $_POST['name'];
        $transmisi	=  $_POST['transmisi'];
        $color	= $_POST['warna'];
        $plat	= $_POST['plat'];
        $price		= $_POST['harga'];
        $merk	= $_POST['merk'];
        $type	=  $_POST['type'];
        $status = $_POST['status'];
        $supplier_id = $_POST['supplier_id'];

        $sql = "UPDATE kendaraan SET name_kendaraan='$name', transmisi='$transmisi', color='$color', plat='$plat', price='$price', status='$status', merk_id='$merk', type_id='$type' WHERE id_kendaraan='$id'";
        $sql2 = "UPDATE supplier_kendaraan SET kendaraan_id='$id', supplier_id='$merk' WHERE kendaraan_id='$id'";

        $query = mysqli_query($koneksi, $sql);
        $query2 = mysqli_query($koneksi, $sql2);
        if( $query && $query2){
            header('Location: index.php?page=master/kendaraan/list-kendaraan');
        } else {        
            echo "<script>
                alert('Data Gagal Update');
                window.location.href='index.php?page=master/kendaraan/list-kendaraan';
            </script>";
        }
    }
    
?>

<div class="row">
        <div class="col-sm-8">
            <section class="panel panel-default">
                <div class="panel panel-heading">Update Customer</div>
                <div class="panel panel-body">
                    <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $row_kendaraan['id_kendaraan']; ?>">
                    <div class="row">
						<div class="col-md-8">
                            <p>
                                <label for="type">Tipe Kendaraan</label><br />
                                <select class="form-control" name="type" id="type" value="<?=$row_kendaraan['type_id'];?>">
                                    <?php
                                        $select_type = mysqli_query($koneksi, "SELECT * FROM type_kendaraan");
                                        while($row_type = mysqli_fetch_assoc($select_type)){
                                            echo "<option value='$row_type[id_type]'>$row_type[name_type]</option>";
                                        }
                                    ?>
                                </select>
                            </p>
                            <p>
                                <label for="merk">Merk Kendaraan</label><br /> 
                                <select class="form-control" name="merk" id="merk" value="<?=$row_kendaraan['merk_id'];?>">
                                    <?php
                                        $select_merk = mysqli_query($koneksi, "SELECT * FROM merk");
                                        while($row_merk = mysqli_fetch_assoc($select_merk)){
                                            echo "<option value='$row_merk[id_merk]'>$row_merk[name_merk]</option>";
                                        }
                                    ?>
                                </select>
                            </p>
                            <p>
                                <label for="name">Nama Kendaraan</label><br />
                                <input class="form-control" name="name" id="name" type="text" value="<?=$row_kendaraan['name_kendaraan'];?>"/>
                            </p>
                            <p>
                                <label for="transmisi">Transmisi Kendaraan</label><br />
                                <select class="form-control" name="transmisi" id="transmisi" value="<?=$row_kendaraan['transmisi'];?>">
                                    <option value="Manual">Manual</option>
                                    <option value="Automatic">Automatic</option>
                                </select>
                            </p>
                            <p>
                                <label for="warna">Warna Kendaraan</label><br />
                                <input class="form-control" name="warna" id="warna" type="text" value="<?=$row_kendaraan['color'];?>" style="width: 100%" />
                            </p>
                            <p>
                                <label for="plat">Plat Kendaraan</label><br />
                                <input class="form-control" name="plat" id="plat" type="text" value="<?=$row_kendaraan['plat'];?>" style="width: 100%"/>
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
                                <input class="form-control" name="harga" id="harga" type="text" value="<?=$row_kendaraan['price'];?>" style="width: 100%" />
                            </p>
                            <p>
                                <label for="status">Status</label><br />
                                <select class="form-control" name="status" id="status" value="<?=$row_kendaraan['status'];?>">
                                        <option value="1">Ready</option>
                                        <option value="2">Rented</option>
                                        <option value="3">Not Available</option>
                                </select>
                            </p>

                            <!-- <p>
                                <label for="gambar">Gambar</label><br />
                                <input class="form-control" name="gambar" id="gambar" type="file" />
                            </p> -->
                            <a href="index.php?page=master/kendaraan/list-kendaraan" class="btn btn-sm btn-danger">CANCEL</a> 
                            <button type="submit" class="btn btn-sm btn-primary" name="update-kendaraan">SAVE</button>
                        </div>
                    </div>
                    </form>
                </div>
            </section>
        </div>
</div>
