<section class="content-header">
      <h1>Suppliers
        <small>Pemasok Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Supplier</li>
      </ol>
</section>
    
    <section class="content">
        <?php $this->view('messages') ?>  
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Data Supplier</b></h3>
                <div class="pull-right">
                <?php if($this->fungsi->user_login()->level == 1) { ?>
                    <a href="<?=site_url('supplier/add')?>" class="btn btn-primary btn-flat">
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
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Deskripsi</th>
                            <?php if($this->fungsi->user_login()->level == 1) { ?> <th>Aksi</th><?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%";><?=$no++?>.</td>
                            <td><?=$data->name?></td>
                            <td><?=$data->phone?></td>
                            <td><?=$data->address?></td>
                            <td><?=$data->description?></td>
                            <?php if($this->fungsi->user_login()->level == 1) { ?>  
                                <td class="text-center" width="160px">
                                <a href="<?=site_url('supplier/edit/'.$data->supplier_id)?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a href="<?=site_url('supplier/del/'.$data->supplier_id)?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>
                            <?php } ?>
                            </td>
                        </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>