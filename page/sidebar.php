<aside id="sidebar-wrapper" class="sticky">
  <div class="sidebar-brand"><h2> RENTAL</h2></div>
    <ul class="sidebar-nav nav nav-pills nav-stacked">
        <li>
          <a href="?page=home"><i class="glyphicon glyphicon-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="menu">
          <a href=""><i class="glyphicon glyphicon-wrench"></i><span>Master</span> <i class="caret"></i></a>
            <ul class="sub-menu">
              <li>
                <a href="?page=master/customer/list-customers"><i class="fa fa-user-circle-o"></i>Customers</a>
              </li>
              <?php
                if($_SESSION['level'] == 'admin'){
              ?><li>
                  <a href="?page=master/employee/list-employee"><i class="fa fa-id-card"></i>Employee</a>
                </li>
                <li>
                  <a href="?page=master/supplier/list-supplier"><i class="fa fa-user-circle"></i>Suppliers</a>
                </li>
              <?php
                }
              ?>
            </ul>
        </li>
        <li>
          <a href="?page=master/kendaraan/list-kendaraan"><i class="glyphicon glyphicon-plane"></i><span>Kendaraan</span></a>
        </li>
        <li>
          <a href="?page=master/merk/list-merk"><i class="glyphicon glyphicon-list-alt"></i><span>Merk & Type</span></a>
        </li>
        <li>
          <a href="?page=master/pemesanan/list-pemesanan"><i class="glyphicon glyphicon-shopping-cart"></i><span>Pemesanan</span></a>
        </li>
        <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i><span>Logout</span></a></li>
    </ul>
</aside>