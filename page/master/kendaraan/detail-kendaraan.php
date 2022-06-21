<?php
include("koneksi.php");
    $id = $_GET['id'];
    $select_kendaraan	= mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE id_kendaraan='$id'");
    $row_kendaraan		= mysqli_fetch_assoc($select_kendaraan);
?>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Detail Mobil - <?= $row_kendaraan['name_kendaraan']?></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="" class="img-thumbnail mb-3">
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><b><?= $row_kendaraan['name_kendaraan']?></b></td>
                            </tr>
                            <tr>
                                <td>Transmisi</td>
                                <td>:</td>
                                <td><b><?= $row_kendaraan['transmisi']?></b></td>
                            </tr>
                            <tr>
                                <td>Nomer Plat</td>
                                <td>:</td>
                                <td><b><?= $row_kendaraan['plat']?></b></td>
                            </tr>
                            <tr>
                                <td>Harga Sewa</td>
                                <td>:</td>
                                <td><b>Rp. <?=$row_kendaraan['price']?></b></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><b>
                                    <?php
                                    if($row_kendaraan['status'] == 'ready'){
                                    ?> <span class="label label-success">Ready</span><?php   
                                    } else if($row_kendaraan['status'] == 'rented'){
                                    ?> <span class="label label-warning">Rented</span><?php
                                    } else {
                                    ?> <span class="label label-danger">Not Available</span><?php
                                    }
                                    ?>
                                </td> </b></td>
                            </tr>
                            
                        </table>	
                    </div>				
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <a href="index.php?page=master/kendaraan/list-kendaraan" class="btn btn-sm btn-info btn-warning"><i class="fa fa-reply"></i> Kembali</a>
                        <?php if($_SESSION['level'] == 'admin'){?>
                        <a href="index.php?page=master/kendaraan/delete-kendaraan&id=<?=$row_kendaraan['id_kendaraan']?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
                        <a href="index.php?page=master/kendaraan/update-kendaraan&id=<?=$row_kendaraan['id_kendaraan']?>" class="btn btn-sm btn-info"><i class="fa fa-pencil-square"></i> UPDATE</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>