<section class="content-header">
    <h1>Report
        <small>Laporan Detail Penjualan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Laporan</li>
        <li class="active">Laporan Detail Penjualan</li>
    </ol>
</section>


<section class="content">
<div class="row">
    <!-- SELECT2 EXAMPLE -->
    <div class="col-md-5">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Form Filter</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="formfilter" class="form-horizontal">
                <div class="box-body">
                    <input name="valnilai" type="hidden">
                    <div class="form-group">
                        <div id="form-tanggal" class="col col-md-3"><label for="select" class=" form-control-label">Pilih Periode</label></div>
                        <div class="col-12 col-md-9">
                            <select name="periode" id="periode" class="form-control form-control-user" title="Pilih Tahun Ajaran">
                                <option value="">-PILIH-</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="bulan">Bulan</option>
                                <option value="tahun">Tahun</option>
                            </select>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button id="btnproses" type="button" onclick="prosesPeriode()" class="btn btn-secondary btn-primary"><i class="fa fa-edit"></i> Proses</button>

                    <!--ketika di klik tombol Reset, maka akan mengeksekusi fungsi javascript prosesReset() , untuk menyembunyikan form-->
                    <button onclick="prosesReset()" type="button" class="btn btn-secondary btn-danger"><i class="fa fa-ban"></i> Reset</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>

    <!-- row ke2 -->
    <div class="col-lg-7" id="tanggalfilter">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Form Filter Tanggal</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?= site_url('report/sale_detail/filter') ?>" method="post" target="_blank">
                <div class="box-body">
                    <input type="hidden" name="nilaifilter" value="1">
                    <input name="valnilai" type="hidden">

                    <div class="row">
                        <div class="col col-md-2">
                            <label for="select" class=" form-control-label">Dari tanggal</label>
                        </div>
                        <div class="col col-md-4">
                            <input name="tanggalawal" value="" type="date" class="form-control"  id="tanggalawal" required="">
                        </div>
                        <div class="col col-md-2">
                            <label for="select" class=" form-control-label">Sampai tanggal</label>
                        </div>
                        <div class="col col-md-4">
                            <input name="tanggalakhir" value="" type="date" class="form-control"  id="tanggalakhir" required="">
                        </div>
                        <small class="help-block form-text"></small>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-secondary btn-success"><i class="fa fa-print"></i> Print</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>

    <!-- row ke3 -->
    <div class="col-lg-7" id="bulanfilter">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Form Filter Bulan</h3>
            </div>
            <form id="formbulan" action="<?= site_url('report/sale_detail/filter') ?>" method="post" target="_blank">
                <div class="box-body">
                    <input type="hidden" name="nilaifilter" value="2">
                    <input name="valnilai" type="hidden">

                    <div class="row">
                        <div id="form-tanggal" class="col col-md-2"><label for="select" class=" form-control-label">Pilih Tahun</label>
                        </div>
                        <div class="col-12 col-md-10">
                            <select name="tahun1" id="tahun1" class="form-control form-control-user" title="Pilih Tahun">
                                <option value="">-PILIH-</option>
                                <?php foreach ($tahun as $thn) : ?>
                                    <option value="<?php echo $thn->tahun; ?>"><?php echo $thn->tahun; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="help-block form-text"></small>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col col-md-2">
                            <label for="select" class=" form-control-label">Dari bulan</label>
                        </div>
                        <div class="col col-md-4">
                            <select name="bulanawal" id="bulanawal" class="form-control form-control-user" title="Pilih Bulan">
                                <option value="">-PILIH-</option>
                                <option value="1">JANUARI</option>
                                <option value="2">FEBRUARI</option>
                                <option value="3">MARET</option>
                                <option value="4">APRIL</option>
                                <option value="5">MEI</option>
                                <option value="6">JUNI</option>
                                <option value="7">JULI</option>
                                <option value="8">AGUSTUS</option>
                                <option value="9">SEPTEMBER</option>
                                <option value="10">OKTOBER</option>
                                <option value="11">NOVEMBER</option>
                                <option value="12">DESEMBER</option>
                            </select>
                        </div>
                        <div class="col col-md-2">
                            <label for="select" class=" form-control-label">Sampai bulan</label>
                        </div>
                        <div class="col col-md-4">
                            <select name="bulanakhir" id="bulanakhir" class="form-control form-control-user" title="Pilih Bulan">
                                <option value="">-PILIH-</option>
                                <option value="1">JANUARI</option>
                                <option value="2">FEBRUARI</option>
                                <option value="3">MARET</option>
                                <option value="4">APRIL</option>
                                <option value="5">MEI</option>
                                <option value="6">JUNI</option>
                                <option value="7">JULI</option>
                                <option value="8">AGUSTUS</option>
                                <option value="9">SEPTEMBER</option>
                                <option value="10">OKTOBER</option>
                                <option value="11">NOVEMBER</option>
                                <option value="12">DESEMBER</option>
                            </select>
                        </div>
                        <small class="help-block form-text"></small>

                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-secondary btn-success"><i class="fa fa-print"></i> Print</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>

    <!-- row ke4 -->
    <div class="col-lg-7" id="tahunfilter">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Form Filter Tahun</h3>
            </div>
            <form id="formtahun" action="<?= site_url('report/sale_detail/filter') ?>" method="post" target="_blank">
                <input name="valnilai" type="hidden">
                <div class="box-body">
                    <input type="hidden" name="nilaifilter" value="3">
                    <div class="row">
                        <div id="form-tanggal" class="col col-md-2"><label for="select" class=" form-control-label">Pilih Tahun</label>
                        </div>
                        <div class="col-12 col-md-10">
                            <select name="tahun2" id="tahun2" class="form-control form-control-user" title="Pilih Tahun">
                                <option value="">-PILIH-</option>
                                <?php foreach ($tahun as $thn) : ?>
                                    <option value="<?php echo $thn->tahun; ?>"><?php echo $thn->tahun; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="help-block form-text"></small>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-secondary btn-success"><i class="fa fa-print"></i> Print</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>
</section>


<script type="text/javascript">

/*digunakan untuk menyembunyikan form tanggal, bulan dan tahun saat halaman di load */
    $(document).ready(function() {

        $("#tanggalfilter").hide();
        $("#tahunfilter").hide();
        $("#bulanfilter").hide();
        $("#cardbayar").hide();

    });

/*digunakan untuk menampilkan form tanggal, bulan dan tahun*/

    function prosesPeriode(){
        var periode = $("[name='periode']").val();

        if(periode == "tanggal"){
            $("#btnproses").hide();
            $("#tanggalfilter").show();
            $("[name='valnilai']").val('tanggal');

        }else if(periode == "bulan"){
            $("#btnproses").hide();
            $("[name='valnilai']").val('bulan');
            $("#bulanfilter").show();

        }else if(periode == "tahun"){
            $("#btnproses").hide();
            $("[name='valnilai']").val('tahun');
            $("#tahunfilter").show();
        }
    }

/*digunakan untuk menytembunyikan form tanggal, bulan dan tahun*/

    function prosesReset(){
        $("#btnproses").show();

        $("#tanggalfilter").hide();
        $("#tahunfilter").hide();
        $("#bulanfilter").hide();
        $("#cardbayar").hide();

        $("#periode").val('');
        $("#tanggalawal").val('');
        $("#tanggalakhir").val('');
        $("#tahun1").val('');
        $("#bulanawal").val('');
        $("#bulanakhir").val('');
        $("#tahun2").val('');
        $("#targetbayar").empty();

    }

</script>