<section class="content-header">
    <h1>SMS Marketing
        <small>SMS Marketing</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>CRM</li>
        <li class="active">SMS Marketing</li>
    </ol>
</section>

<section class="content">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><b> Tambah Pesan</b></h2>
            <div class="pull-right">
                <a href="<?= site_url('sms_marketing') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('sms_marketing/sendSMS') ?>" method="post">
                        <div class="form-group">
                            <label>Isi Pesan *</label>
                            <textarea name="message" value="" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Penerima *</label>
                            <!-- <input type="number" name="recipient" value="" class=" form-control"  required> -->
                            <select name="recipient" class="form-control">
                            <option value="">- Pilih -</option>
                                <?php foreach ($cluster_temp as $i => $data) {
                                    echo '<option value="' . $data->cluster.   '">Cluster '  . $data->cluster . '</option>';
                                } ?>
                            </select>

                        </div>

                        <div class="form-group">
                            <button type="submit" name="add" class="btn btn-success btn-flat">

                                <i class="fa fa-paper-plane"></i> Kirim
                            </button>
                            <button type="reset" class="btn btn-secondary btn-danger"><i class="fa fa-ban"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>