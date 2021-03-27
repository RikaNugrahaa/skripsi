<section class="content-header">
      <h1>Products
        <small>Layanan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Paket Layanan</li>
        <li class="active">Produk</li>
      </ol>
</section>
    
    <section class="content">
    <?php $this->view('messages') ?>
        <div class="box">
            <div class="box-header">
                <h2 class="box-title"><b> <?=ucfirst($show)?> Data Produk</b></h2>
                <div class="pull-right">
                    <a href="<?=site_url('product')?>" class="btn btn-warning btn-flat">
                       <i class="fa fa-undo"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('product/process')?>" method="post">
                            <div class="form-group">
                                <label>Kode Produk</label>
                                <input type="hidden" name="id" value="<?=$row->product_id?>">
                                <input type="text" name="product_code" value="<?=$row->product_code?>" class=" form-control" required> 
                            </div>
                            <div class="form-group">
                                <label>Nama Layanan </label>
                                <input type="hidden" name="id" value="<?=$row->product_id?>">
                                <input type="text" name="product_name" value="<?=$row->name?>" class=" form-control" required> 
                            </div>
                            <div class="form-group">
                                <label>Kategori Layanan *</label>
                                <select name="category" class="form-control" required>
                                    <option value="">- Pilih -</option>
                                    <?php foreach($category->result() as $key => $data) { ?>
                                        <option value="<?=$data->category_id?>" <?=$data->category_id == $row->category_id ? "selected" : null?>><?=$data->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga </label>
                                <input type="number" name="product_price" value="<?=$row->price?>" class=" form-control" required> 
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