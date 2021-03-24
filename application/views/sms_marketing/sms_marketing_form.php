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

        <div class="box-header with-border">
            <h4 class="box-title"><b>Pesan Broadcast</b></h4>
        </div>
        <div class="box-body">
            <div class="form-group">
                <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" style="margin-bottom:20px" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">STEP 1. IMPORT CONTACT</a>
                    <a href="<?= site_url('sms_marketing/form_broadcast') ?>" class="btn btn-primary" type="button" style="margin-bottom:20px">STEP 2. SMS BROADCAST</a>
                </p>

            </div>


            <div class="form-group">

                <!-- <div class="box-header with-border" style="margin-bottom:20px">
                        <h4 class="box-title"><b>Import Kontak Berdasarkan Cluster Pelanggan</b></h4>
                    </div> -->

                <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="col-md-12">

                        <!-- <div class="box"> -->
                        <!-- <div class="box-header with-border">
                                <h3 class="box-title">Form Import Kontak Pelanggan Berdasarkan Cluster</h3>
                            </div> -->
                        <form id="import_form" enctype="multipart/form-data" method="post">
                            <div class="form-group" >

                                <label for="exampleInputFile" class=" form-control-label" >Import Kontak Pelanggan*</label>

                                <input type="file" name="file" id="file" accept=".xls,.xlsx" required>
                                <p  class="help-block">Only xls/xlsx File Import</p>
                            </div>

                            <div class="form-group" >
                                <button type="submit" name="submit"  class="btn btn-success btn-flat">
                                    <i class="fa fa-eye"></i> Preview
                                </button>
                            </div>

                        </form>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">

                            <div class="box-body table-responsive">
                                <table class="tabel table-bordered table striped" id="customer_data">

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

</section>

<script>
    $(document).ready(function() {

        function load_data() {
            $.ajax({
                url: '<?= site_url('sms_marketing/fetch') ?>',
                method: "POST",
                success: function(data) {
                    $('#customer_data').html(data);
                    console.log(data);
                }
            })
        }

        $('#import_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '<?= site_url('sms_marketing/import') ?>',
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#file').val('');
                    load_data();
                    alert(data);
                }
            })
        });

    });
</script>