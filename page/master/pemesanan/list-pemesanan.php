<?php
    include('koneksi.php');
    $select_pemesanan	= mysqli_query($koneksi, 
    "SELECT pemesanan.*,customer.name_customer, employee.name_employee, 
    detail_pemesanan.*, kendaraan.name_kendaraan, kendaraan.price FROM pemesanan
    LEFT JOIN customer ON pemesanan.customer_id = customer.id_customer
    LEFT JOIN employee ON pemesanan.employee_id = employee.id_employee
    LEFT JOIN detail_pemesanan ON pemesanan.id_pemesanan = detail_pemesanan.pemesanan_id
    LEFT JOIN kendaraan ON detail_pemesanan.kendaraan_id = kendaraan.id_kendaraan;");
    
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
                <div class="panel panel-heading">List Pemesanan</div>
                <div class="panel panel-body">
                    <a href="index.php?page=master/pemesanan/pemesanan" class="btn btn-primary btn-md"> + Tambahkan </a>
                    <br />  <br />
                    <table id="list-pemesanan" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID_Pemesanan</th>
                                <th>Customer</th>  
                                <th>Employee</th>
                                <th>Order_date</th>
                                <th>Return_date</th>
                                <th>Duration</th>
                                <th>Price</th>
                                <th>total_price</th>
                                <th>Kendaraan</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row_pemesanan = mysqli_fetch_array($select_pemesanan)){
                            ?>
                            <tr>
                                <td><?= $row_pemesanan['id_pemesanan']; ?></td>
                                <td><?= $row_pemesanan['name_customer']; ?></td>
                                <td><?= $row_pemesanan['name_employee']; ?></td>
                                <td><?= $row_pemesanan['order_date']; ?></td>
                                <td><?= $row_pemesanan['return_date']; ?></td>
                                <td><?= $row_pemesanan['duration']; ?></td>
                                <td><?= $row_pemesanan['price']; ?></td>
                                <td><?= $row_pemesanan['total_price']; ?></td>
                                <td><?= $row_pemesanan['name_kendaraan']; ?></td>
                                <td>
                                    <?php
                                    if($row_pemesanan['status'] == 1){
                                    ?> <span class="label label-success">Done</span><?php   
                                    } else if($row_pemesanan['status'] == 0){
                                    ?> <span class="label label-warning">Process</span><?php
                                    } else if($row_pemesanan['status'] == 2){
                                    ?> <span class="label label-danger">Cancel</span><?php
                                    }   
                                    ?>
                                </td>
                                <td>
                                    <a href="index.php?page=master/pemesanan/update-pemesanan&id=<?= $row_pemesanan['id_pemesanan']; ?>" class="btn btn-sm btn-primary"> UPDATE </a>
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