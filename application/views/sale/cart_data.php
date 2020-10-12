<?php $no = 1;
if ($cart->num_rows() > 0) {
    foreach ($cart->result() as $c => $data) { ?>
        <tr>
            <td><?= $no++ ?>.</td>
            <td><?= $data->product_code ?></td>
            <td><?= $data->product_name ?></td>
            
            <td class="text-left"><?= $data->cart_price ?></td>
            
            <td class="text-left"><?= $data->discount_product ?></td>
            <td class="text-left" id="total"><?= $data->total ?></td>
            <td class="text-center" width="160px">
                <button id="update_cart" data-toggle="modal" data-target="#modal-product-edit"
                data-cartid="<?= $data->cart_id ?>" 
                data-product_code="<?= $data->product_code ?>" 
                data-product="<?= $data->product_name ?>" 
                
                data-price="<?= $data->cart_price ?>" 
                
                data-discount="<?= $data->discount_product ?>" 
                data-total="<?= $data->total ?>" 
                class="btn btn-xs btn-primary">
                    <i class="fa fa-pencil"></i> Edit
                </button>
                <button id="del_cart" data-cartid="<?= $data->cart_id ?>" class="btn btn-xs btn-danger">
                    <i class="fa fa-trash"></i> Hapus
                </button>
            </td>
        </tr>
<?php
    }
} else {
    echo '<tr>
        <td colspan="8" class="text-center">Tidak ada Produk Layanan </td>
    </tr>';
} ?>