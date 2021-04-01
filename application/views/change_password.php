<section class="content-header">
  <h1>Change Password
    <small>Ubah Password</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Ubah Password</li>
  </ol>
</section>



<section class="content">
<?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><b>  Ubah Password</b></h2>
            <?= $this->session->flashdata('pesan'); ?>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('User/changePassword') ?>" method="post">

                       
                        <div class="form-group">
                            <label for="passwordlama">Password Lama *</label>
                            <input type="password" name="passwordlama" id="passwordlama" class=" form-control">
                            <?= form_error('passwordlama', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="passwordbaru">Password Baru *</label>
                            <input type="password" name="passwordbaru"  id="passwordbaru" class=" form-control">
                            <?= form_error('passwordbaru', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="passconf">Konfirmasi Password Baru *</label>
                            <input type="password" name="passconf" id="passconf" class=" form-control">
                            <?= form_error('passconf', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
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