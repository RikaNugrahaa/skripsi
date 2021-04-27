<section class="content-header">
    <h1>Stock Out
        <small>Barang Keluar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Inventori Barang</li>
        <li class="active">Barang Keluar</li>
    </ol>
</section>

<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><b>Data Barang Keluar</b></h3>
            <div class="pull-right">
                <a href="<?= site_url('stock/out/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Tambah 
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="tabel table-bordered table striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="text-center">Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Detail</th>
                        <th class="text-center">Jumlah Barang</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row as $key => $data) { ?>
                        <tr>
                            <td style="width:5%" ;><?= $no++ ?>.</td>
                            <td class="text-center"><?=indo_date($data->date)?></td>
                            <td><?= $data->item_name ?></td>
                            <td><?= $data->detail ?></td>
                            <td  class="text-center"><?= $data->qty ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('stock/out/del/'.$data->stock_id.'/'.$data->item_id) ?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>