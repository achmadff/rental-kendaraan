<?php
    include('koneksi.php');
    $select_merk = mysqli_query($koneksi, "SELECT * FROM merk");
    $select_type = mysqli_query($koneksi, "SELECT * FROM type_kendaraan");
    

    if(isset($_POST['regis-merk'])){
        $name		= mysqli_real_escape_string($koneksi, $_POST['name-merk']);

        $sql = "INSERT INTO merk (name_merk) VALUES ('$name')";
        $query = mysqli_query($koneksi, $sql);
        if($query){
            echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
        }else{
            echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
        }
        header('Refresh: 1;');
    }
    if(isset($_POST['regis-type'])){
        $name		= mysqli_real_escape_string($koneksi, $_POST['name-type']);

        $sql = "INSERT INTO type_kendaraan (name_type) VALUES ('$name')";
        $query = mysqli_query($koneksi, $sql);
        if($query){
            echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
        }else{
            echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
        }
        header('Refresh: 1;');
    }
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
        <div class="col-sm-6">
            <section class="panel panel-default">
                <div class="panel panel-heading">List Merk</div>
                <div class="panel panel-body">
                <?php if($_SESSION['level'] == 'admin'){?>
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#regis-merk"> + Tambahkan </button>
                        <!-- model -->
                        <div class="modal fade" id="regis-merk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="modal-title">Tambahkan Merk</h3>
                                    </div>
                                    <!-- form tambah -->
                                    <form action="" method="POST" autocomplete="off">
                                        <div class="modal-body">
                                            <p>
                                                <label for="name-merk">Name Merk</label><br />
                                                <input class="form-control" name="name-merk" id="name-merk" type="text" required />
                                            </p>
                                        </div>
                                        <div class="modal-footer">  
                                            <button type="close" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                            <button type="submit" class="btn btn-primary" name="regis-merk">ADD</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end model -->
                <?php }?>
                    <br />  <br />
                    <table id="list-merk" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name_Merk</th>
                                <?php if($_SESSION['level'] == 'admin'){?>
                                <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row_merk = mysqli_fetch_array($select_merk)){
                            ?>
                            <tr>
                                <td><?= $row_merk['id_merk']; ?></td>
                                <td><?= $row_merk['name_merk']; ?></td>
                                <?php if($_SESSION['level'] == 'admin'){?>
                                <td>
                                    <a href="index.php?page=master/merk/update-merk&id=<?= $row_merk['id_merk']; ?>" class="btn btn-sm btn-warning">UPDATE</a>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        <div class="col-sm-6">
            <section class="panel panel-default">
                <div class="panel panel-heading">List Type Kendaraan</div>
                <div class="panel panel-body">
                <?php if($_SESSION['level'] == 'admin'){?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#regis-type"> + Tambahkan </button>
                        <!-- model -->
                        <div class="modal fade" id="regis-type" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="modal-title">Tambahkan Type Kendaraan</h3>
                                    </div>
                                    <!-- form tambah -->
                                    <form action="" method="POST" autocomplete="off">
                                        <div class="modal-body">
                                            <p>
                                                <label for="name-merk">Name Type Kendaraan</label><br />
                                                <input class="form-control" name="name-merk" id="name-merk" type="text" required />
                                            </p>
                                        </div>
                                        <div class="modal-footer">  
                                            <button type="close" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                            <button type="submit" class="btn btn-primary" name="regis-type">ADD</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end model -->
                <?php }?>
                    <br />  <br />
                    <table id="list-type" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name_Type</th>
                                <?php if($_SESSION['level'] == 'admin'){?>
                                <th>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row_type = mysqli_fetch_array($select_type)){
                            ?>
                            <tr>
                                <td><?= $row_type['id_type']; ?></td>
                                <td><?= $row_type['name_type']; ?></td>
                                <?php if($_SESSION['level'] == 'admin'){?>
                                <td>
                                    <a href="index.php?page=master/merk/update-type&id=<?= $row_type['id_type']; ?>" class="btn btn-sm btn-warning">UPDATE</a>
                                </td>
                                <?php } ?>
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
