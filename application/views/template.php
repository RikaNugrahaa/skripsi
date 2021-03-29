<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POS . CEO Refleksi</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Morris charts -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/morris.js/morris.css">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url('dashboard') ?>" class="logo">
        <span class="logo-mini"><b>A</b>LT</span>
        <span class="logo-lg"><b>POS</b> CEO Refleksi</span>
      </a>
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url() ?>assets/dist/img/user.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= $this->fungsi->user_login()->username ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="<?= base_url() ?>assets/dist/img/user.png" class="img-circle" alt="User Image">
                  <p> <?= $this->fungsi->user_login()->name ?>
                    <small>CEO REFLEKSI</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <!-- <div class="pull-left">
                    <a href="#" class="btn btn-default bg-blue">Profile</a>
                  </div> -->
                  <div class="pull-right">
                    <a href="<?= site_url('auth/logout') ?>" class="btn btn-default bg-red">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url() ?>assets/dist/img/user.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <h4><b><?= ucfirst($this->fungsi->user_login()->username) ?></h4></b>
          </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
            <a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i><span> Dashboard</span></a>
          </li>
          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li <?= $this->uri->segment(1) == 'supplier' ? 'class="active"' : '' ?>>
              <a href="<?= site_url('supplier') ?>"><i class="fa fa-truck"></i><span> Supplier</span></a>
            </li>
          <?php } ?>
          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li <?= $this->uri->segment(1) == 'therapist' ? 'class="active"' : '' ?>>
              <a href="<?= site_url('therapist') ?>"><i class="fa fa fa-user"></i><span> Terapis</span></a>
            </li>
          <?php } ?>
          <li <?= $this->uri->segment(1) == 'customer' ? 'class="active"' : '' ?>>
            <a href="<?= site_url('customer') ?>"><i class="fa fa-group"></i><span> Pelanggan</span>
            </a>
          </li>
          <?php if ($this->fungsi->user_login()->level == 2) { ?>
            <li <?= $this->uri->segment(1) == 'sale' ? 'class="active"' : '' ?>>
              <a href="<?= site_url('sale') ?>"><i class="fa fa-money"></i><span> Transaksi Penjualan</span>
              </a>
            </li>
          <?php } ?>
          <li class="treeview <?= $this->uri->segment(1) == 'item' || $this->uri->segment(1) == 'stock' ? 'active' : '' ?>">
            <a href="#">
              <i class="fa fa-shopping-cart"></i><span> Inventori Barang</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <?php if ($this->fungsi->user_login()->level == 1) { ?>
                <li <?= $this->uri->segment(1) == 'item' ? 'class="active"' : '' ?>><a href="<?= site_url('item') ?>"><i class="fa fa-circle-o"></i> Stok Barang</a></li>
                <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'class="active"' : '' ?>>
                  <a href="<?= site_url('stock/in') ?>"><i class="fa fa-circle-o"></i> Barang Masuk</a>
                </li>
              <?php } ?>
              <?php if ($this->fungsi->user_login()->level == 2) { ?>
                <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out' ? 'class="active"' : '' ?>>
                  <a href="<?= site_url('stock/out') ?>"><i class="fa fa-circle-o"></i> Barang keluar</a>
                </li>
              <?php } ?>
            </ul>
          </li>
          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li class="treeview <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'product' ? 'active' : '' ?>">
              <a href="#">
                <i class="fa fa-archive"></i><span> Paket Layanan</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <li <?= $this->uri->segment(1) == 'category' ? 'class="active"' : '' ?>><a href="<?= site_url('category') ?>"><i class="fa fa-circle-o"></i>Kategori Layanan</a></li>
                <li <?= $this->uri->segment(1) == 'product' ? 'class="active"' : '' ?>><a href="<?= site_url('product') ?>"><i class="fa fa-circle-o"></i>Produk Layanan</a></li>
              </ul>
            </li>
          <?php } ?>
          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li class="treeview <?= $this->uri->segment(1) == 'clustering' || $this->uri->segment(1) == 'sms_marketing' ? 'active' : '' ?>">
              <a href="#">
                <i class="fa fa-list-alt"></i><span> CRM</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <li <?= $this->uri->segment(1) == 'clustering' ? 'class="active"' : '' ?>><a href="<?= site_url('clustering') ?>"><i class="fa fa-circle-o"></i> Segmentasi Pelanggan </a></li>
                <li <?= $this->uri->segment(1) == 'sms_marketing' ? 'class="active"' : '' ?>><a href="<?= site_url('sms_marketing') ?>"><i class="fa fa-circle-o"></i> SMS Marketing </a></li>
              </ul>
            </li>
          <?php } ?>
          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li class="treeview <?= $this->uri->segment(1) == 'report' || $this->uri->segment(1) == 'report' || $this->uri->segment(1) == 'report' || $this->uri->segment(1) == 'report' ? 'active' : '' ?>">
              <a href="#">
                <i class="fa fa-pie-chart"></i><span> Laporan</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'sale' ? 'class="active"' : '' ?>>
                  <a href="<?= site_url('report/sale') ?>"><i class="fa fa-circle-o"></i> Transaksi Penjualan</a>
                </li>
                <li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'sale_detail' ? 'class="active"' : '' ?>>
                  <a href="<?= site_url('report/sale_detail') ?>"><i class="fa fa-circle-o"></i> Detail Penjualan</a>
                </li>


              </ul>
            </li>
          <?php } ?>
          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li class="header"> SETTING</li>
            <li <?= $this->uri->segment(1) == 'user' ? 'class="active"' : '' ?>>
              <a href="<?= site_url('user') ?>"><i class="fa fa-user-plus"></i> <span> User</span></a>
            </li>
          <?php } ?>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <div class="content-wrapper">
      <?php echo $contents ?>
    </div>
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2019 CEO REFLEKSI.</strong> All rights reserved.
    </footer>
  </div>

  <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>


  <script src="<?= base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/raphael/raphael.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/morris.js/morris.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>

  <script>
    $(document).ready(function() {
      $('#table1').DataTable()
    })

    $(document).ready(function() {
      $('#table2').DataTable()
    })
  </script>

</body>

</html>