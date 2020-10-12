<section class="content-header">
      <h1>SMS Campaign
        <small>Pesan Kampanye</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>CRM</li>
        <li class="active">Pesan Kampanye</li>
      </ol>
</section>
    
    <section class="content">
     
        <div class="box">
            <div class="box-header">
                <h2 class="box-title"><b> Tambah Pesan</b></h2>
                <div class="pull-right">
                    <a href="<?=site_url('campaign')?>" class="btn btn-warning btn-flat">
                       <i class="fa fa-undo"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('campaign/process')?>" method="post">
                            <div class="form-group">
                                <label>Isi Pesan *</label>
                                <textarea name="description" class=" form-control"></textarea> 
                            </div>
                            <div class="form-group">
                                <label>Penerima *</label>
                                <select name="receiver" class="form-control" >
                                    <option value="">- Pilih -</option>
                                    <option value="1">Cluster 1</option>
                                    <option value="2">Cluster 2</option>
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <button type="submit" name="" class="btn btn-success btn-flat">
                                    <i class="fa fa-paper-plane"></i> Kirim
                                </button>
                                <button type="reset" class="btn btn-flat">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>