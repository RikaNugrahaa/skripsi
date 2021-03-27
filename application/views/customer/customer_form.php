<section class="content-header">
      <h1>Customers
        <small>Pelanggan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Customers</li>
      </ol>
</section>
    
    <section class="content">
     
        <div class="box">
            <div class="box-header">
                <h2 class="box-title"><b> <?=ucfirst($show)?> Data Pelanggan</b></h2>
                <div class="pull-right">
                    <a href="<?=site_url('customer')?>" class="btn btn-warning btn-flat">
                       <i class="fa fa-undo"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('customer/process')?>" method="post">
                            <div class="form-group">
                                <label>Nama Pelanggan *</label>
                                <input type="hidden" name="id" value="<?=$row->customer_id?>">
                                <input type="text" name="customer_name" value="<?=$row->name?>" class=" form-control" required> 
                            </div>
                            <div class="form-group">
                                <label>No Hp *</label>
                                <input type="number" name="phone" value="<?=$row->phone?>" class=" form-control" required> 
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin *</label>
                                <select name="gender" class="form-control" required>
                                    <option value="">- Pilih -</option>
                                    <option value="Laki-laki"<?=$row->gender == 'Laki-laki' ? 'selected' : ''?>>Laki-laki</option>
                                    <option value="Perempuan"<?=$row->gender == 'Perempuan' ? 'selected' : ''?>>Perempuan</option>
                                </select>
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