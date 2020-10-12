<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
</head>

<body onload="window.print()">
    
        <section class="content-header">
            <center>
                <b>
                    <h2>Laporan Stok Barang</h2>
                    <h3> Tanggal : <?= date('d-M-Y') ?> </h3>
                </b>
            </center>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body table-responsive">
                    <table class="tabel table-bordered table striped" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah Stok</th>
                                <!-- <th>Barang Masuk</th> -->
                                <th style="text-align:center">Harga Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row as $key => $data) : ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data->name ?></td>

                                    <td style="text-align:center"><?php echo $data->stock ?></td>

                                    <!-- <td  class="text-center"><?= $data->qty ?></td> -->
                                    <td style="text-align:center"> <?php echo indo_currency($data->price); ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div id="form-tanggal" class="col col-md-9"><label for="select" class=" form-control-label"></label></div>
                        <div id="form-tanggal" class="col col-md-3"><label for="select" class=" form-control-label">
                                <h4>Pontianak, <?php echo date('d M Y') ?></h4>
                            </label></div>
                    </div>
                </div>
            </div>



        </section>
    

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

    <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

</body>


</html>