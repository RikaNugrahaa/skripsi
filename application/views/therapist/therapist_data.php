<section class="content-header">
      <h1>Therapists
        <small>Terapis</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Terapis</li>
      </ol>
</section>
    
    <section class="content">
    <?php $this->view('messages') ?>  
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Data Terapis</b></h3>
                <div class="pull-right">
                    <a href="<?=site_url('therapist/add')?>" class="btn btn-primary btn-flat">
                       <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="tabel table-bordered table striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                        foreach($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?=$no++?>.</td>
                            <td><?=$data->name?></td>
                            <td><?=$data->phone?></td>
                            <td><?=$data->gender?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('therapist/edit/'.$data->therapist_id)?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <a href="<?=site_url('therapist/del/'.$data->therapist_id)?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-xs">
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

