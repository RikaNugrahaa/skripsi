<section class="content-header">
  <h1>Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>



<!-- Main Content -->
<section class="content">
  <div class="row">
  <div class="alert alert-success disable alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Selamat Datang :)</h4>
</div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-archive"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"><h4>Produk</h4></span>
          <span class="info-box-number"><?= $this->fungsi->count_product() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"><h4>Supplier</h4></span>
          <span class="info-box-number"><?= $this->fungsi->count_supplier() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-purple"><i class="fa fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text "><h4>Pelanggan</h4></span>
          <span class="info-box-number"><?= $this->fungsi->count_customer() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"><h4>Terapis</h4></span>
          <span class="info-box-number"><?= $this->fungsi->count_therapist() ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    
  </div>
  <!-- /.row -->
</section>