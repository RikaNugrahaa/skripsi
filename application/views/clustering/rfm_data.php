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
            <h3 class="box-title"><b>Analisa RFM Berdasarkan Periode </b></h3>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <form action="<?= site_url('clustering') ?>" method="POST">
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
                            <input type="date" name="start_date" id="start_date" class=" form-control" required>
                            <?= form_error('start_date', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="col col-md-4">
                        <div class="form-group">
                            <label>Hingga Tanggal *</label>
                            <input type="date" name="end_date" id="end_date" class=" form-control" required>
                            <?= form_error('end_date', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>


                </div>

                <div class="form-group">
                    <button id="btnproses" type="submit" name="submit" class="btn btn-primary"><i class=" fa fa-eye"></i> Tampil RFM</button>

                </div>
            </form>

            <?php if (!empty($rfm)) : ?>
                <!-- <section class="content"> -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><b>Data RFM Pelanggan</b></h3>
                        <div class="pull-right">
                            <!-- <a href="<?= site_url('clustering') ?>" class="btn btn-warning btn-flat">
                            <i class="fa fa-undo"></i> Kembali
                        </a> -->
                        </div>
                    </div>
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
                                                $norm_r[] =  @!is_nan(($n_r - min($nilai_r)) / (max($nilai_r) - min($nilai_r))) ? (($n_r - min($nilai_r)) / (max($nilai_r) - min($nilai_r))) : 0;
                                            }

                                            $norm_f = array();
                                            foreach ($nilai_f as $n_f) {
                                                $norm_f[] = @!is_nan(($n_f - min($nilai_f)) / (max($nilai_f) - min($nilai_f))) ? (($n_f - min($nilai_f)) / (max($nilai_f) - min($nilai_f))) : 0;
                                            }

                                            $norm_m = array();
                                            foreach ($nilai_m as $n_m) {
                                                $norm_m[] = @!is_nan(($n_m - min($nilai_m)) / (max($nilai_m) - min($nilai_m)))  ? (($n_m - min($nilai_m)) / (max($nilai_m) - min($nilai_m))) : 0;
                                            }

                                            $no = 1;
                                            $nf = $nr = $nm = $nlr = 0;
                                            $this->db->query('truncate table rfm_value');
                                            foreach ($rfm as $r) : ?>
                                                <?php
                                                $this->db->query("insert into rfm_value (customer_id,r_norm,f_norm,m_norm) 
                                            values('" . $r['customer_id'] . "','" . $norm_r[$nr] . "','" . $norm_f[$nf] . "','" . $norm_m[$nm] . "')");
                                                ?>
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
                                                        <?php echo (round($norm_r[$nr], 4));
                                                        $nr++;
                                                        ?>
                                                    </td>

                                                    <td style="text-align:center">
                                                        <?php echo (round($norm_f[$nf], 4));
                                                        $nf++;
                                                        ?>
                                                    </td>

                                                    <td style="text-align:center">
                                                        <?php echo (round($norm_m[$nm], 4));
                                                        $nm++;
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
               
                <div class="box-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="box-header with-border">
                                <h3 class="box-title"><b>Proses Clustering Menggunakan K-Means</b></h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <form action="<?= site_url('clustering/clustering_process') ?>" method="POST">

                                <div class="form-group">

                                    <label for="jumlah_cluster">Jumlah Cluster*</label><br>
                                    <input type="radio" name="jumlah_cluster" id="jumlah_cluster" value="2" required> 2<br>
                                    <input type="radio" name="jumlah_cluster" id="jumlah_cluster" value="3" required> 3<br>
                                    <input type="radio" name="jumlah_cluster" id="jumlah_cluster" value="4" required> 4<br>
                                    <?= form_error('jumlah_cluster', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <button id="btnproses" type="submit" name="proses" class="btn btn-primary"><i class=" fa fa-refresh"></i> Proses</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                </div>
                <?php endif; ?>

        </div>
    </div>
</section>