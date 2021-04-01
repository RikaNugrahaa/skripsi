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
                <h3 class="box-title"><b>Data Produk</b></h3>
                <div class="pull-right">
                    <a href="<?=site_url('Product/add')?>" class="btn btn-primary btn-flat">
                       <i class="fa fa-plus"> Tambah </i>
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="tabel table-bordered table striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
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
                    "url": "<?=site_url('Product/get_product')?>",
                    "type": "POST"
                },
                "columnDefs": [
                    {
                        "targets": [1, 2, 3, 4, 5],
                        "className": 'text-center'
                    },
                ]
                
            })
        })
    </script>