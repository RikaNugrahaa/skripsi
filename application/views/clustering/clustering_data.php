<section class="content-header">
    <h1>Customer Segmentation
        <small>Segmentasi Pelanggan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>CRM</li>
        <li class="active">Segmentasi Pelanggan</li>
    </ol>
</section>

<section class="content">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">

        <div class="box-header with-border">
            <h3 class="box-title"><b>Analisa RFM Berdasarkan Periode dan Clustering Menggunakan K-Means </b></h3>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <form action="<?=site_url('clustering/index')?>" method="POST">
                <div class="row">
                    <input name="rfmvalue" type="hidden">
                    <?php if ($this->session->flashdata('pesan')) : ?>
                        <div class="alert alert-error alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="icon fa fa-ban"></i>
                            </button>
                            Data tidak ditemukan.
                        </div>
                    <?php endif; ?>

                    <div class="col col-md-4">
                        <div class="form-group">
                            <label>Dari Tanggal *</label>
                            <input type="date" name="start_date" id="start_date" class=" form-control">
                            <?= form_error('start_date', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="col col-md-4">
                        <div class="form-group">
                            <label>Hingga Tanggal *</label>
                            <input type="date" name="end_date" id="end_date" class=" form-control">
                            <?= form_error('end_date', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                        
                            <label for="jumlah_cluster" >Jumlah Cluster</label><br>
                            <input type="radio" name="jumlah_cluster" id="jumlah_cluster" value="2"> 2<br>
                            <input type="radio" name="jumlah_cluster" id="jumlah_cluster" value="3"> 3<br>
                            <input type="radio" name="jumlah_cluster" id="jumlah_cluster" value="4"> 4<br>
                            <?= form_error('jumlah_cluster', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button id="btnproses" type="submit" name="submit" class="btn btn-primary"><i class=" fa fa-refresh"></i> Proses</button>
                    
                </div>
            </form>
        </div>

       
    </div>
</section>


