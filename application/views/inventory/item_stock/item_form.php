<section class="content-header">
      <h1>Items
        <small>Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Inventori Barang</li>
        <li class="active">Barang</li>
      </ol>
</section>
    
    <section class="content">
    <?php $this->view('messages') ?>
        <div class="box">
            <div class="box-header">
                <h2 class="box-title"><b> <?=ucfirst($show)?> Barang</b></h2>
                <div class="pull-right">
                    <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat">
                       <i class="fa fa-undo"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('item/process')?>" method="post">
                            <div class="form-group">
                                <label>Nama Barang *</label>
                                <input type="hidden" name="id" value="<?=$row->item_id?>">
                                <input type="text" name="item_name" value="<?=$row->name?>" class=" form-control" required> 
                            </div>
                            <div class="form-group">
                                <label>Harga Satuan *</label>
                                <input type="number" name="item_price" value="<?=$row->price?>" class=" form-control" required> 
                            </div>
                            <div class="form-group">
                                <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
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