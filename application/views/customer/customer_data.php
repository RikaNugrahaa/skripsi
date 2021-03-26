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
    <?php $this->view('messages') ?>  
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Data Pelanggan</b></h3>
                <div class="pull-right">
                <?php if($this->fungsi->user_login()->level == 2) { ?> 
                    <a href="<?=site_url('customer/add')?>" class="btn btn-primary btn-flat">
                       <i class="fa fa-plus"></i> Tambah
                    </a>
                <?php } ?>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="tabel table-bordered table striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Phone</th>
                            <th>Jenis Kelamin</th>
                           
                            <th>Aksi</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#table1').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?=site_url('customer/get_customer')?>",
                    "type": "POST"
                },
                
            })
        })
    </script>