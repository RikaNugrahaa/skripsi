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
            <div class="pull-right">
                <a href="<?= site_url('sms_marketing') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>
            <div class="form-group">

                <div class="box-body">

                    <div class="col-md-4 col-md-offset-4">
                        <!-- <div class="collapse multi-collapse" id="multiCollapseExample2"> -->


                        <form action="<?= site_url('sms_marketing/sendSMS') ?>" method="post">
                            <div class="form-group">
                                <label style="margin-left:10px">Isi Pesan *</label>
                                <textarea name="message" value="" style="height: 100px; margin-left:10px" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label style="margin-left:10px">Penerima *</label>
                                <!-- <input type="text" style="margin-left:10px" name="recipient" value="" class=" form-control"  required> -->
                                <select name="recipient" id="recipient" class="form-control" style="margin-left:10px"> -->
                                    <option value="">Select</option>
                                    <?php foreach ($cluster_temp as $i => $data) { 
                                   echo '<option value="'.$data->phones.'">'.$data->cluster.'</option>';
                                } ?>
                                </select>
                            </div>

                            <div class="form-group" style="margin-left:10px">
                                <button type="submit" name="add" class="btn btn-success btn-flat">

                                    <i class="fa fa-paper-plane"></i> Kirim
                                </button>
                                <button type="reset" class="btn btn-secondary btn-danger"><i class="fa fa-ban"></i> Reset</button>
                            </div>
                        </form>






                        <!-- </div>
                    </div> -->

                    </div>
                </div>
            </div>
        </div>
</section>