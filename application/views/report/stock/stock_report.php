<section class="content-header">
    <h1>Report
        <small>Laporan Stok Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Laporan</li>
        <li class="active">Laporan Stok Barang</li>
    </ol>
</section>


<section class="content">
    <div class="box">
        <div class="box-header">

            <h3 class="box-title"><b>Data Stok Barang</b></h3>

        </div>

        <div class="box-body table-responsive">
            <table class="tabel table-bordered table striped" id="" width="100%" cellspacing="0">

                <tr>
                    <div class="form-group">
                            <a href="<?= site_url('report/stock_print') ?> " target="_blank" class="btn btn-secondary btn-success">
                                <i class="fa fa-print"> Print </i>
                            </a>

                    </div>
                </tr>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th style="text-align:center">Jumlah Stok</th>

                        <th style="text-align:center">Harga Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row as $key => $data) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data->name ?></td>

                            <td style="text-align:center"><?=$data->stock ?></td>
                            
                            <!-- <td  class="text-center"><?= $data->qty ?></td> -->
                            <td style="text-align:center"> <?php echo indo_currency($data->price); ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-header -->

        <!-- form start -->

    </div>
</section>


<!-- <script type="text/javascript">

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

</script> -->