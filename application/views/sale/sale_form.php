<section class="content-header">
    <h1>Sales
        <small>Transaksi Penjualan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Transaksi Penjualan</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <form action="<?= site_url('sale/process') ?>" method="post">
            <div class="col-lg-4">
                <div class="box box-widget">
                    <div class="box-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="date">Tanggal</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" id="date" value="<?= date('Y-m-d') ?>" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top; width:30%">
                                    <label for="user">Kasir</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="user" value="<?= $this->fungsi->user_login()->name ?>" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="customer_id">Pelanggan</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <input type="hidden" id="customer_id">
                                        <input type="hidden" id="gender">
                                        <input type="text" id="customer_name" class="form-control" autofocus>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-customer">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="box box-widget">
                    <div class="box-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top; width:35%">
                                    <label for="product_id">Produk Layanan</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <input type="hidden" id="product_id">
                                        <input type="hidden" id="product_code">
                                        <input type="hidden" id="price">
                                        <input type="text" id="product_name" class="form-control" autofocus>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-product">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                            <td style="vertical-align:top; width:40%">
                                <label for="therapist">Terapis </label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select id="therapist" class="form-control" autofocus>
                                        <option value="">- Pilih -</option>
                                        <?php foreach ($therapist as $cam => $data) {
                                            echo '<option value="' . $data->therapist_id . '">' . $data->name . '</option>';
                                        } ?>
                                    </select>
                                </div>
                            </td>
                            </tr>
                           
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                        <button type="button" id="add_cart" class="btn btn-primary">
                                            <i class="fa fa-cart-plus"></i> Tambah
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="box box-widget">
                    <div class="box-body">
                        <div align="right">
                            <h4>Invoice <b><span id="invoice"><?= $invoice ?></span></b></h4>
                            <h1><b><span id="grand_total2" style="font-size:50pt"></span></b></h1>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Produk</th>
                                <th>Produk Layanan</th>
                                <th>Harga</th>
                                <!-- <th class="text-center">terapis</th> -->
                                <th width="10%">Diskon</th>
                                <th width="15%">Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="cart_table">
                            <?php $this->view('sale/cart_data') ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:40%">
                                <label for="sub_total">Sub Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="sub_total" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="discount">Diskon (%)</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="discount" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="grand_total">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="grand_total" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:40%">
                                <label for="cash">Cash </label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="cash" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="change">Kembalian </label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="change" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="note">Note </label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea id="note" rows="3" class="form-control"></textarea>
                                </div>
                            </td>
                        </tr>
                       
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <div>
                <button id="cancel_payment" class="btn btn-flat btn-warning">
                    <i class="fa fa-refresh"></i> Batal
                </button><br><br>
                <button id="process_payment" class="btn btn-flat btn-success">
                    <i class="fa fa-paper-plane-o"></i>Proses Pembayaran
                </button>
            </div>
        </div>
    </div>
</section>

<!-- modal tambah customer -->
<div class="modal fade" id="modal-customer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Pilih Pelanggan</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customer as $c => $data) { ?>
                            <tr>
                                <td><?= $data->name ?></td>
                                <td class="text-center"><?= $data->phone ?></td>
                                <td class="text-center"><?= $data->gender ?></td>
                                <td class="text-center">
                                    <button class="btn btn-xs btn-info" id="selectcustomer" data-id="<?= $data->customer_id ?>" data-name="<?= $data->name ?>" data-gender="<?= $data->gender ?>" <i class="fa fa-check"></i> Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- modal tambah produk -->
<div class="modal fade" id="modal-product">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Pilih Produk</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table2">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th class="text-center">Kode Produk</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($product as $p => $data) { ?>
                            <tr>
                                <td><?= $data->name ?></td>
                                <td class="text-center"><?= $data->product_code ?></td>
                                <td class="text-center"><?= indo_currency($data->price) ?></td>
                                <td class="text-center">
                                    <button class="btn btn-xs btn-info" id="selectproduct" data-id="<?= $data->product_id ?>" data-name="<?= $data->name ?>" data-product_code="<?= $data->product_code ?>" data-price="<?= $data->price ?>" <i class="fa fa-check"></i> Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal edit data produk -->
<div class="modal fade" id="modal-product-edit">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit Produk</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="cartid_product">
                <div class="form-group">
                    <label for="product">Produk Layanan</label>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" id="productcode" class="form-control" readonly>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="product" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price-product">Harga</label>
                    <input type="number" id="price_product" min="0" class="form-control">
                </div>
                <!-- <div class="form-group">
                    <label for="therapist-name">Terapis</label>
                    <input type="text" id="therapist_name" class="form-control" readonly>
                </div> -->
                <div class="form-group">
                    <label for="total_before">Total Sebelum Diskon</label>
                    <input type="number" id="total_before" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="discount_product">Diskon Per Paket Layanan (%)</label>
                    <input type="number" id="discount_product" min="0" class="form-control">
                </div>
                <div class="form-group">
                    <label for="total_product">Total Setelah Diskon</label>
                    <input type="number" id="total_product" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button type="button" id="edit_cart" class="btn btn-flat btn-success">
                        <i class="fa fa-paper-plane"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '#selectcustomer', function() {
        $('#customer_id').val($(this).data('id'))
        $('#customer_name').val($(this).data('name'))
        $('#gender').val($(this).data('gender'))
        $('#modal-customer').modal('hide')
    })

    $(document).on('click', '#selectproduct', function() {
        $('#product_id').val($(this).data('id'))
        $('#product_name').val($(this).data('name'))
        $('#product_code').val($(this).data('product_code'))
        $('#price').val($(this).data('price'))
        $('#modal-product').modal('hide')
    })

    $(document).on('click', '#add_cart', function() {
        var product_id = $('#product_id').val()
        var price = $('#price').val()
        var therapist_id = $('#therapist').val()
        if (product_id == '') {
            alert('produk belum dipilih')
            $('#product_name').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sale/process') ?>',
                data: {
                    'add_cart': true,
                    'product_id': product_id,
                    'price': price,
                    'therapist_id': therapist_id
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('sale/cart_data') ?>', function() {
                            calculate()
                        })
                        $('#product_id').val('')
                        $('#product_code').val('')
                        $('#product_code').focus()
                        $('#therapist').focus()
                    } else {
                        alert('Gagal tambah produk layanan')
                    }
                }
            })
        }
    })

    $(document).on('click', '#del_cart', function() {
        if (confirm('Apakah Anda Yakin?')) {
            var cart_id = $(this).data('cartid')
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sale/cart_del') ?>',
                dataType: 'json',
                data: {
                    'cart_id': cart_id
                },
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('sale/cart_data') ?>', function() {
                            calculate()
                        })
                    } else {
                        alert('Gagal hapus produk layanan');
                    }
                }
            })
        }
    })

    $(document).on('click', '#update_cart', function() {
        $('#cartid_product').val($(this).data('cartid'))
        $('#productcode').val($(this).data('product_code'))
        $('#product').val($(this).data('product'))
        $('#price_product').val($(this).data('price'))
        // $('#therapist_name').val($(this).data('therapist'))
        $('#total_before').val($(this).data('price'))
        $('#discount_product').val($(this).data('discount'))
        $('#total_product').val($(this).data('total'))
    })

    //hitung total pembayaran otomatis ketika edit jumlah layanan 
    function count_edit_modal() {
        var price = $('#price_product').val()
        // var qty = $('#qty_product').val()
        var discount = $('#discount_product').val()

        total_before = price 
        $('#total_before').val(total_before)

        total = (price - ((discount / 100) * price)) 
        $('#total_product').val(total)

        if (discount == '') {
            $('#discount_product').val(0)
        }
    }
    $(document).on('keyup mouseup', '#price_product,  #discount_product', function() {
        count_edit_modal()
    })

    $(document).on('click', '#edit_cart', function() {
        var cart_id = $('#cartid_product').val()
        var price = $('#price_product').val()
        // var therapist_id = $('#therapist_name').val()
        var discount = $('#discount_product').val()
        var total = $('#total_product').val()
        if (price == '' || price < 1) {
            alert('harga tidak boleh kosong')
            $('#price_product').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sale/process') ?>',
                data: {
                    'edit_cart': true,
                    'cart_id': cart_id,
                    'price': price,
                    // 'therapist_id': therapist_id,
                    'discount': discount,
                    'total': total
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('sale/cart_data') ?>', function() {
                            calculate()
                        })
                        alert('product cart berhasil diubah')
                        $('#modal-product-edit').modal('hide');
                    } else {
                        alert('Data product cart tidak berubah')
                    }
                }
            })
        }
    })

    function calculate() {
        var subtotal = 0;
        $('#cart_table tr').each(function() {
            subtotal += parseInt($(this).find('#total').text())

        })
        isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

        var discount = $('#discount').val()
        var grand_total = subtotal - ((discount / 100) * subtotal)
        if (isNaN(grand_total)) {
            $('#grand_total').val(0)
            $('#grand_total2').text(0)
        } else {
            $('#grand_total').val(grand_total)
            $('#grand_total2').text(grand_total)
        }

        var cash = $('#cash').val();
        cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)

        if (discount == '') {
            $('#discount').val(0)
        }
    }

    $(document).on('keyup mouseup', '#discount, #cash', function() {
        calculate()
    })

    $(document).ready(function() {
        calculate()
    })

    // proses pembayaran
    $(document).on('click', '#process_payment', function() {
        var customer_id = $('#customer_id').val()
        var subtotal = $('#sub_total').val()
        var discount = $('#discount').val()
        var grandtotal = $('#grand_total').val()
        var cash = $('#cash').val()
        var change = $('#change').val()
        var note = $('#note').val()
      
        var date = $('#date').val()
        if (subtotal < 1) {
            alert('Belum ada produk layanan yang dipilih')
            $('product_code').focus()
        } else if (cash < 1) {
            alert('Jumlah uang cash belum diinput')
            $('cash').focus()
        } else {
            if (confirm('Yakin proses transaksi ini?')) {
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('sale/process') ?>',
                    data: {
                        'process_payment': true,
                        'customer_id': customer_id,
                        'subtotal': subtotal,
                        'discount': discount,
                        'grandtotal': grandtotal,
                        'cash': cash,
                        'change': change,
                        'note': note,
                        
                        'date': date,
                    },
                    dataType: 'json',
                    success: function(result) {
                        if(result.success){
                            alert('Transaksi Berhasil');
                            window.open('<?=site_url('sale/print/')?>' + result.sale_id, '_blank')
                        } else {
                            alert('Transaksi Gagal');
                        }
                        location.href='<?=site_url('sale')?>'
                    }
                })
            }
        }
    })

    // fungsi pembatalan pembayaran
    $(document).on('click', '#cancel_payment', function(){
        if(confirm('Apakah Anda yakin?')) {
            $.ajax({
                type: 'POST',
                url: '<?=site_url('sale/cart_del')?>',
                dataType: 'json',
                data: {'cancel_payment': true},
                success: function(result) {
                    if(result.success == true) {
                        $('#cart_table').load('<?=site_url('sale/cart_data')?>', function() {
                            calculate()
                        })
                    }
                }
            })
            $('#discount').val(0)
            $('#cash').val(0)
            $('#customer_name').val('')
            $('#product_name').val('')
            $('#product_name').focus()
            
            $('#note').val('')
        }
    })
</script>