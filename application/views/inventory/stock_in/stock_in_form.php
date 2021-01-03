<section class="content-header">
    <h1>Stock In
        <small>Barang Masuk</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Inventori Barang</li>
        <li class="active">Barang Masuk</li>
    </ol>
</section>

<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><b> Tambah Barang Masuk</b></h2>
            <div class="pull-right">
                <a href="<?= site_url('stock/in') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('stock/process') ?>" method="post">
                        <div class="form-group">
                            <label>Tanggal *</label>
                            <input type="date" name="date" value="<?=date('Y-m-d')?>" class=" form-control" required>
                        </div>
                        <div>
                            <label>Nama Barang *</label>
                        </div>
                        <div class="form-group input-group">
                            <input type="hidden" name="item_id" id="item_id">
                            <input type="text" name="item_name" id="item_name" class=" form-control" required autofocus>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <div class="form-group">
                                <label for="stock">Stock Awal</label>
                                <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Supplier </label>
                            <select name="supplier" class="form-control">
                                <option value="">- Pilih -</option>
                                <?php foreach ($supplier as $i => $data) { 
                                   echo '<option value="'.$data->supplier_id.'">'.$data->name.'</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Barang *</label>
                            <input type="number" name="qty" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="stock_in_add" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-secondary btn-danger"><i class="fa fa-ban"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Pilih Barang</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th class="text-center">Harga Satuan</th>
                            <th class="text-center">Jumlah Stok</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($item_stock as $i => $data) { ?>
                        <tr>
                            <td><?=$data->name?></td>
                            <td class="text-center"><?=indo_currency($data->price)?></td>
                            <td class="text-center"><?=$data->stock?></td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-info" id="select"
                                    data-id="<?=$data->item_id?>"
                                    data-name="<?=$data->name?>"
                                    data-stock="<?=$data->stock?>">
                                    <i class="fa fa-check"></i> Pilih
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>        
</div>

<script>
$(document).ready(function() {
    $(document).on('click', '#select', function() {
        var item_id = $(this).data('id');
        var name = $(this).data('name');  
        var stock = $(this).data('stock');
        $('#item_id').val(item_id);
        $('#item_name').val(name);
        $('#stock').val(stock);
        $('#modal-item').modal('hide');
    })
    
})

</script>