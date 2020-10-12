<section class="content-header">
    <h1>SMS Campaigns
        <small>Pesan Kampanye </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Pesan Kampanye</li>
    </ol>
</section>

<section class="content">
    <?php $this->view('messages') ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">

                    <h3 class="box-title">Data Pesan</h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="tabel table-bordered table striped" id="table1">
                        <tr>
                            <div class="form-group">
                                <a href="<?= site_url('campaign/add') ?>" class="btn btn-primary btn-flat">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>

                                <a href="#" class="btn btn-success btn-flat">
                                    <i class="fa fa-inbox"></i> Inbox
                                </a>

                                <a href="#" class="btn btn-warning btn-flat">
                                    <i class="fa  fa-envelope"></i> Outbox
                                </a>
                            </div>
                        </tr>

                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>No Hp</th>
                            <th>Isi Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>