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
            <h3 class="box-title">Analisa RFM Pelanggan Berdasarkan Periode</h3>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <form action="" method="POST">
                <div class="row">
                    <?php if ($this->session->flashdata('pesan')) : ?>
                        <div class="alert alert-error alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="icon fa fa-ban"></i>
                            </button>
                            Data tidak ditemukan.
                        </div>
                    <?php endif; ?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Dari Tanggal *</label>
                            <input type="date" name="start_date" id="start_date" class=" form-control">
                            <?= form_error('start_date', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <!-- /.form-group -->
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Hingga Tanggal *</label>
                            <input type="date" name="end_date" id="end_date" class=" form-control">
                            <?= form_error('end_date', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" id="submit" class="btn btn-primary">Tampil RFM</button>
                    <button onclick="prosesReset()" type="button" class="btn btn-secondary btn-danger"><i class="fa fa-ban"></i> Reset</button>
                </div>
            </form>
        </div>

        <?php if (!empty($rfm)) : ?>
            <div class="row" id="rfm">
                <div class="col-lg-12">
                    <div class="box box-widget">
                        <div class="box-body table-responsive">
                            <table id="table1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align:center">Id Pelanggan</th>
                                        <th style="text-align:center">Recency Score</th>
                                        <th style="text-align:center">Frequency Score</th>
                                        <th style="text-align:center">Monetary Score</th>
                                        <th style="text-align:center">Recency Normalization</th>
                                        <th style="text-align:center">Frequency Normalization</th>
                                        <th style="text-align:center">Monetary Normalization</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nilai_r = array();
                                    $nilai_f = array();
                                    $nilai_m = array();
                                    foreach ($rfm as $r) {
                                        $tglAwal = strtotime($r['trans_date']);
                                        $tglAkhir = strtotime(date('Y-m-d'));
                                        $jeda = abs($tglAkhir - $tglAwal);
                                        $nilai_r[] = $jeda / (60 * 60 * 24);
                                        $nilai_f[] = $r['total'];
                                        $nilai_m[] = $r['total_price'];
                                    }
                                    $norm_r = array();
                                    foreach ($nilai_r as $n_r) {
                                        $norm_r[] = ($n_r - min($nilai_r)) / (max($nilai_r) - min($nilai_r));
                                    }

                                    $norm_f = array();
                                    foreach ($nilai_f as $n_f) {
                                        $norm_f[] = ($n_f - min($nilai_f)) / (max($nilai_f) - min($nilai_f));
                                    }

                                    $norm_m = array();
                                    foreach ($nilai_m as $n_m) {
                                        $norm_m[] = ($n_m - min($nilai_m)) / (max($nilai_m) - min($nilai_m));
                                    }

                                    $no = 1;
                                    $nf = $nr = $nm = $nlr = 0;
                                    foreach ($rfm as $r) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td style="text-align:center"><?= $r['customer_id'] == null ? "" : $r['customer_id'] ?></td>

                                            <td style="text-align:center">
                                                <?php echo $nilai_r[$nlr];
                                                $nlr++;
                                                ?>
                                            </td>

                                            <td style="text-align:center">
                                                <?php
                                                $t = $r['total'];
                                                echo $t;
                                                ?>
                                            </td>

                                            <td style="text-align:center">
                                                <?= $r['total_price']; ?>
                                            </td>

                                            <td style="text-align:center">
                                                <?php echo round($norm_r[$nr], 4);
                                                $nr++;
                                                ?>
                                            </td>

                                            <td style="text-align:center">
                                                <?php echo $norm_f[$nf];
                                                $nf++;
                                                ?>
                                            </td>

                                            <td style="text-align:center">
                                                <?php echo round($norm_m[$nm], 4);
                                                $nm++;
                                                ?>
                                            </td>

                                        <?php endforeach; ?>

                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-body" id="formcluster">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jumlah Cluster</label>
                                <input type="number" name="totalcluster" id="totalcluster" class=" form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit" class="btn btn-primary">Proses</button>
                    </div>
                </form>
            </div>


            <!-- <div class="row" id="cluster">
                <div class="col-lg-12">
                    <div class="box box-widget">
                        <div class="box-body table-responsive">
                            <table id="message1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th style="text-align:center">Cluster</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
        <?php endif; ?>
    </div>
</section>

<script type="text/javascript">
    function prosesReset() {
        $("#submit").show();

        $("#rfm").hide();
        $("#cluster").hide();
        $("#formcluster").hide();


        $("#start_date").val('');
        $("#end_date").val('');
        $("#totalcluster").val('');

    }
</script>