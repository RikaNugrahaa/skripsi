<section class="content-header">
    <h1>Customer Segmentation
        <small>Segmentasi Pelanggan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>CRM</li>
        <li class="active">Segmentasi Pelanggan</li>
    </ol>
</section>

<style type="text/css">
    #message1 {

        display: none;
    }
</style>


<section class="content">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Analisa RFM Pelanggan Berdasarkan Periode</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Dari Tanggal *</label>
                        <input type="date" name="start_date" id="start_date" class=" form-control">
                    </div>
                    <!-- /.form-group -->
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Hingga Tanggal *</label>
                        <input type="date" name="end_date" id="end_date" class=" form-control">
                    </div>
                </div>
            </div>

            <div class="form-group" >
                <button type="submit" id="submit" class="btn btn-primary">Tampil RFM</button>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="box box-widget">
                    <div class="box-body table-responsive">
                        <table id="message1" class="table table-bordered table-striped" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Pelanggan</th>
                                    <th>tanggal Transaksi</th>
                                    <th>Total Price</th>
                                    <!-- <th>Frequency</th>
                                    <th>Recency Score</th>
                                    <th>Frequency Score</th>
                                    <th>Monatery Score</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</section>

<script>
    $("#submit").click(function() {
        $("#message1").toggle();
    });

    $("#start_date").val("");
    $("#end_date").val("");
    $("#submit").click(function() {
        var x = 1;
        var start_date =$('#start_date').val();
        var end_date =$('#end_date').val();
        if (start_date == "" && end_date == "") {
            $("#start_date").val();
            $("#end_date").val();
            $("#submit").attr("disabled", true);
            $('#message1').append("<tr>not found</tr>");
            setTimeout(function() {

                $("#submit").attr("disabled", false);
                $('#message1 tbody').empty();
                $("input").focus();
            }, 1000);
        } else {
            $.ajax({
                type: "POST",
                url: 'clustering',
                data: {
                    "start_date": start_date,
                    "end_date": end_date
                },
                dataType: "json",
                success: function(data) {
                    $.each(data, function( key, value) {

                        $('#message1').append(
                            "<tr><th scope='row'>" + (x++) + "</th><td>" 
                            + value.customer + "</td><td>" 
                            + value.date + "</td><td>" 
                            + value.total_price + "</td>"
                        )
                    });
                }
            })
        }
            $("#start_date").val("");
            $("#end_date").val("");
            return false;

    });

    // $("#start_date").datepicker({
    //     format:"yyyy/mm/dd",
    //     autoclose: true,
    //     todayHighlight:true
    // });
    // $("#end_date").datepicker({
    //     format:"yyyy/mm/dd",
    //     autoclose: true,
    //     todayHighlight:true
    // });
</script>