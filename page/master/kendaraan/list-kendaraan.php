<?php
    include('koneksi.php');
    
    $select_kendaraan	= mysqli_query($koneksi, 
    "SELECT kendaraan.*,supplier.name_supplier, merk.name_merk, type_kendaraan.name_type FROM kendaraan
    LEFT JOIN supplier_kendaraan ON supplier_kendaraan.kendaraan_id = kendaraan.id_kendaraan
    LEFT JOIN supplier ON supplier_kendaraan.supplier_id = supplier.id_supplier
    LEFT JOIN merk ON kendaraan.merk_id = merk.id_merk 
    LEFT JOIN type_kendaraan ON kendaraan.type_id = type_kendaraan.id_type;");

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
                <div class="panel panel-heading">List Kendaraan</div>
                <div class="panel panel-body">
                <?php if($_SESSION['level'] == 'admin'){?>
                <a href="index.php?page=master/kendaraan/regis-kendaraan" class="btn btn-primary"> + Tambahkan </a>
                <?php } ?>
                    <br />  <br />
                    <table id="list-kendaraan" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name_Kendaraan</th>
                                <th>Transmisi</th>
                                <th>Warna</th>
                                <th>Plat</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Merk</th>
                                <th>Type</th>
                                <?php if($_SESSION['level'] == 'admin'){?>
                                <th>Supplier</th>
                                <?php } ?>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row_kendaraan = mysqli_fetch_array($select_kendaraan)){
                                ?>
                            <tr>
                                <td><?= $row_kendaraan['id_kendaraan']; ?></td>
                                <td><?= $row_kendaraan['name_kendaraan']; ?></td>
                                <td><?= $row_kendaraan['transmisi']; ?></td>
                                <td><?= $row_kendaraan['color']; ?></td>
                                <td><?= $row_kendaraan['plat']; ?></td>
                                <td><?= "Rp.".$row_kendaraan['price']; ?></td>
                                <td>
                                    <?php
                                    if($row_kendaraan['status'] == 'ready'){
                                    ?> <span class="label label-success">Ready</span><?php   
                                    } else if($row_kendaraan['status'] == 'rented'){
                                    ?> <span class="label label-warning">Rented</span><?php
                                    } else {
                                    ?> <span class="label label-danger">Not Available</span><?php
                                    }
                                    ?>
                                </td> 
                                <td><?= $row_kendaraan['name_merk']; ?></td>
                                <td><?= $row_kendaraan['name_type']; ?></td>
                                
                                <?php if($_SESSION['level'] == 'admin'){?>
                                <td><?= $row_kendaraan['name_supplier']; ?></td>
                                <?php } ?>
                                <td>
                                    <a href="index.php?page=master/kendaraan/detail-kendaraan&id=<?=$row_kendaraan['id_kendaraan']; ?>" class="btn btn-primary btn-sm">Detail</a>   
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