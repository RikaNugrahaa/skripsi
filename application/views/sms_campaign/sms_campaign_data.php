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
        <?php $this->view('messages') ?>      
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Data Pesan</b></h3>
                <div class="pull-right">
                    <a href="<?=site_url('campaign/add')?>" class="btn btn-primary btn-flat">
                       <i class="fa fa-plus"> Tambah </i>
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="tabel table-bordered table striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Hp</th>
                            <th>Isi Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                        foreach($row as $data) { ?>
                        <tr>
                            <td style="width:5%;"><?=$no++?>.</td>
                            <td><?=$data->phone?></td>
                            <td ><?=$data->detail?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('campaign/del/'.$data->message_id)?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-xs">
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

   