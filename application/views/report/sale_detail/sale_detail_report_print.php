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
    <div id="cardbayar">
        <section class="content-header">
            <center>
                <b>
                    <h2><?php echo $title ?></h2>
                    <h3><?php echo $subtitle ?> </h3>
                </b>
            </center>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body table-responsive">
                    <table class="tabel table-bordered table striped" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="text-align:center">Invoice</th>
                                <th style="text-align:center">Tanggal</th>
                                <th style="text-align:center">Kode Produk</th>
                                
                                <th style="text-align:center">Nama Terapis</th>

                                <th style="text-align:center">Diskon Per Produk</th>
                                <!-- <th>Keterangan</th> -->
                                <!-- <th style="text-align:center">Diskon </th> -->
                                <th style="text-align:center">Total</th>
                            </tr>
                        </thead>
                        <tbody <?php $no = 1;
                                foreach ($datafilter as $row) : ?> <tr>

                            <td ><?php echo $no++; ?></td>
                            <td style="text-align:center"><?php echo $row->sale_id == null ? : $row->invoice ?></td>
                            <td style="text-align:center"><?php echo $row->sale_id == null ?  : $row->date ?></td>
                            <td style="text-align:center"><?php echo $row->product_id == null ?  : $row->product_code ?></td>
                            
                            <td style="text-align:center"><?php echo $row->therapist_id == null ?  : $row->therapist_name ?></td>
                            <td style="text-align:center"><?php echo $row->discount_product; ?>%</td>
                            <td style="text-align:center"><?php echo indo_currency($row->total); ?></td>

                            </tr>
                        <?php endforeach ?>
                        <tr>
                            <td style="text-align:center" colspan="6"><strong>TOTAL PENDAPATAN</strong></td>

                            <td style="text-align:center"><strong><?php echo indo_currency($sum); ?></strong></td>
                        </tr>


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
    </div>

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