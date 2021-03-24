<?php
$link  = mysqli_connect("127.0.0.1", "root", "user123", "pos");
$query = $link->query("SELECT * FROM rfm_value");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$data = [];
$customer_id = [];
while ($row = $query->fetch_assoc()) {
    $data[] = $row;
    $customer_id[] = $row['customer_id'];
}
//hitung Euclidean Distance Space
//hitung Euclidean Distance Space
function jarakEuclidean($data = array(), $centroid = array())
{
    return sqrt(pow(($data[0] - $centroid[0]), 2) + pow(($data[1] - $centroid[1]), 2) + pow(($data[2] - $centroid[2]), 2));
}

function jarakTerdekat($jarak_ke_centroid = array(), $centroid)
{
    $minimum = [];
    foreach ($jarak_ke_centroid as $key => $value) {
        if (!isset($minimum)) {
            $minimum = $value;
            $cluster = ($key + 1);
            continue;
        } else if ($value < $minimum) {
            $minimum = $value;
            $cluster = ($key + 1);
        }
    }
    return array(
        'cluster' => $cluster,
        'value' => $minimum,
    );
}

function perbaruiCentroid($table_iterasi, &$hasil_cluster)
{
    $hasil_cluster = [];
    //looping untuk mengelompokan x dan y sesuai cluster
    foreach ($table_iterasi as $key => $value) {
        $hasil_cluster[($value['jarak_terdekat']['cluster'] - 1)][0][] = $value['data'][0]; //data x
        $hasil_cluster[($value['jarak_terdekat']['cluster'] - 1)][1][] = $value['data'][1]; //data y
        $hasil_cluster[($value['jarak_terdekat']['cluster'] - 1)][2][] = $value['data'][2]; //data z
    }
    $new_centroid = [];
    //looping untuk mencari nilai centroid baru dengan cara mencari rata2 dari masing2 data(0=x, 1=y dan 2=z) 
    foreach ($hasil_cluster as $key => $value) {
        $new_centroid[$key] = [
            array_sum($value[0]) / count($value[0]),
            array_sum($value[1]) / count($value[1]),
            array_sum($value[2]) / count($value[2])
        ];
    }
    //sorting berdasarkan cluster
    ksort($new_centroid);
    return $new_centroid;
}

function centroidBerubah($centroid, $iterasi)
{
    $centroid_lama = flatten_array($centroid[($iterasi - 1)]); //flattern array
    $centroid_baru = flatten_array($centroid[$iterasi]); //flatten array
    //hitbandingkan centroid yang lama dan baru jika berubah return true, jika tidak berubah/jumlah sama=0 return false
    $jumlah_sama = 0;
    for ($i = 0; $i < count($centroid_lama); $i++) {
        if ($centroid_lama[$i] === $centroid_baru[$i]) {
            $jumlah_sama++;
        }
    }
    return $jumlah_sama === count($centroid_lama) ? false : true;
}

function flatten_array($arg)
{
    return is_array($arg) ? array_reduce($arg, function ($c, $a) {
        return array_merge($c, flatten_array($a));
    }, []) : [$arg];
}

function pointingHasilCluster($hasil_cluster)
{
    $result = [];
    foreach ($hasil_cluster as $key => $value) {
        for ($i = 0; $i < count($value[0]); $i++) {
            $result[$key][] = [$hasil_cluster[$key][0][$i], $hasil_cluster[$key][1][$i], $hasil_cluster[$key][2][$i]];
        }
    }
    return ksort($result);
}

//start program
// get data dari database
$link  = mysqli_connect("127.0.0.1", "root", "user123", "pos");
// cek koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}
$query = $link->query("SELECT * FROM rfm_value");
$data = [];
//masukan data jumlah r norm, f norm  dan m norm ke array data
while ($row = $query->fetch_assoc()) {
    $data[] = [$row['r_norm'], $row['f_norm'], $row['m_norm']];
}

//jumlah cluster
$cluster = $_POST['jumlah_cluster'];
$variable_x = 'R Norm';
$variable_y = 'F Norm';
$variable_z = 'M Norm';

$rand = [];
//centroid awal ambil random dari data
for ($i = 0; $i < $cluster; $i++) {
    $temp = rand(0, (count($data) - 1));
    while (in_array([$rand], [$temp])) {
        $temp = rand(0, (count($data) - 1));
    }
    $rand[] = $temp;
    $centroid[0][] = [
        $data[$rand[$i]][0],
        $data[$rand[$i]][1],
        $data[$rand[$i]][2]
    ];
}

$hasil_iterasi = [];
$hasil_cluster = [];

//iterasi
$iterasi = 0;
while (true) {
    $table_iterasi = array();
    //untuk setiap data ke i (x dan y)
    foreach ($data as $key => $value) {
        //untuk setiap table centroid pada iterasi ke i
        $table_iterasi[$key]['data'] = $value;
        foreach ($centroid[$iterasi] as $key_c => $value_c) {
            //hitung jarak euclidean 
            $table_iterasi[$key]['jarak_ke_centroid'][] = jarakEuclidean($value, $value_c);
        }
        //hitung jarak terdekat dan tentukan cluster nya
        $table_iterasi[$key]['jarak_terdekat'] = jarakTerdekat($table_iterasi[$key]['jarak_ke_centroid'], $centroid);
    }
    array_push($hasil_iterasi, $table_iterasi);
    $centroid[++$iterasi] = perbaruiCentroid($table_iterasi, $hasil_cluster);
    $lanjutkan = centroidBerubah($centroid, $iterasi);
    $boolval = boolval($lanjutkan) ? 'ya' : 'tidak';
    // echo 'proses iterasi ke-'.$iterasi.' : lanjutkan iterasi ? '.$boolval.'<br>';
    if (!$lanjutkan)
        break;
    //loop sampai setiap nilai centroid sama dengan nilai centroid sebelumnya
}
?>

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


<?php if (!empty($rfm)) : ?>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Data RFM Pelanggan</b></h3>
                <div class="pull-right">
                    <a href="<?= site_url('clustering') ?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="row" id="rfm">
                <div class="col-lg-12">
                    <div class="box box-widget">
                        <div class="box-body table-responsive">
                            <table id="table1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align:center">Id Pelanggan</th>
                                        <th style="text-align:center">Recency Score</th>
                                        <th style="text-align:center">Frequency Score</th>
                                        <th style="text-align:center">Monetary Score</th>
                                        <th style="text-align:center">Recency Normalization</th>
                                        <th style="text-align:center">Frequency Normalization</th>
                                        <th style="text-align:center">Monetary Normalization</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $nilai_r = array();
                                    $nilai_f = array();
                                    $nilai_m = array();
                                    foreach ($rfm as $r) {
                                        $tglAwal = strtotime($r['trans_date']);
                                        $tglAkhir = strtotime(date('Y-m-d'));
                                        $jeda = abs($tglAkhir - $tglAwal);
                                        $nilai_r[] = $jeda / (60 * 60 * 24);
                                        $nilai_f[] = $r['total'];
                                        $nilai_m[] = $r['total_price'];
                                    }
                                    $norm_r = array();
                                    foreach ($nilai_r as $n_r) {
                                        $norm_r[] =  @!is_nan(($n_r - min($nilai_r)) / (max($nilai_r) - min($nilai_r))) ? (($n_r - min($nilai_r)) / (max($nilai_r) - min($nilai_r))) : 0;
                                    }

                                    $norm_f = array();
                                    foreach ($nilai_f as $n_f) {
                                        $norm_f[] = @!is_nan(($n_f - min($nilai_f)) / (max($nilai_f) - min($nilai_f))) ? (($n_f - min($nilai_f)) / (max($nilai_f) - min($nilai_f))) : 0;
                                    }

                                    $norm_m = array();
                                    foreach ($nilai_m as $n_m) {
                                        $norm_m[] = @!is_nan(($n_m - min($nilai_m)) / (max($nilai_m) - min($nilai_m)))  ? (($n_m - min($nilai_m)) / (max($nilai_m) - min($nilai_m))) : 0;
                                    }

                                    $no = 1;
                                    $nf = $nr = $nm = $nlr = 0;
                                    $this->db->query('truncate table rfm_value');
                                    foreach ($rfm as $r) : ?>
                                        <?php
                                        $this->db->query("insert into rfm_value (customer_id,r_norm,f_norm,m_norm) 
                                            values('" . $r['customer_id'] . "','" . $norm_r[$nr] . "','" . $norm_f[$nf] . "','" . $norm_m[$nm] . "')");
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td style="text-align:center"><?= $r['customer_id'] == null ? "" : $r['customer_id'] ?></td>

                                            <td style="text-align:center">
                                                <?php echo $nilai_r[$nlr];
                                                $nlr++;
                                                ?>
                                            </td>

                                            <td style="text-align:center">
                                                <?php
                                                $t = $r['total'];
                                                echo $t;
                                                ?>
                                            </td>

                                            <td style="text-align:center">
                                                <?= $r['total_price']; ?>
                                            </td>

                                            <td style="text-align:center">
                                                <?php echo (round($norm_r[$nr], 4));
                                                $nr++;
                                                ?>
                                            </td>

                                            <td style="text-align:center">
                                                <?php echo round($norm_f[$nf], 4);
                                                ($nf++);
                                                ?>
                                            </td>

                                            <td style="text-align:center">
                                                <?php echo round($norm_m[$nm], 4);
                                                $nm++;
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div id="cluster_result">
                <div class="form-group">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>Hasil Clustering Menggunakan K-Means</b></h3>
                    </div>
                </div>
                <div class="box-body">

                    <div class="form-group">
                        <p>
                            <a href="<?= site_url('print_excel') ?>" class="btn btn-success" style="margin-bottom:10px"><i class="fa fa-file-excel-o"></i> Export</a>
                            <a class="btn btn-info" data-toggle="collapse" style="margin-bottom:10px" href="#multiCollapseExample" role="button" aria-expanded="false" aria-controls="multiCollapseExample">Inisialisasi</a>
                            <?php foreach ($hasil_iterasi as $key => $value) { ?>
                                <a class="btn btn-primary" data-toggle="collapse" style="margin-bottom:10px" href="#multiCollapseExample<?php echo $key ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample<?php echo $key ?>">Iterasi ke-<?php echo ($key + 1); ?></a>
                            <?php }  ?>
                        </p>
                    </div>


                    <div class="collapse multi-collapse" id="multiCollapseExample">

                        <div class="box-header with-border">
                            <h3 class="box-title"><b>Inisialisasi Centroid Awal</b></h3>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box box-widget">
                                    <div class="box-body table-responsive">
                                        <table id="" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">Centroid</th>
                                                    <th style="text-align:center"><?php echo $variable_x; ?></th>
                                                    <th style="text-align:center"><?php echo $variable_y; ?></th>
                                                    <th style="text-align:center"><?php echo $variable_z; ?></th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($centroid[0] as $key_c => $value_c) { ?>
                                                    <tr>
                                                        <td style="text-align:center"><?php echo ($key_c + 1); ?></td>
                                                        <td style="text-align:center"><?php echo $value_c[0]; ?></td>
                                                        <td style="text-align:center"><?php echo $value_c[1]; ?></td>
                                                        <td style="text-align:center"><?php echo $value_c[2]; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php

                        $this->db->query('truncate table cluster_temp');


                        foreach ($hasil_iterasi as $key => $value) { ?>
                            <!-- <div class="col"> -->
                            <div class="collapse multi-collapse" id="multiCollapseExample<?php echo $key; ?>">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><b>Iterasi ke-<?php $it = ($key + 1);
                                                                        echo $it; ?></b></h3>
                                </div>
                                <div class=" col-lg-12">
                                    <div class="box box-widget">
                                        <div class="box-body table-responsive">
                                            <table id="table1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">No</th>
                                                        <th rowspan="2" style="text-align:center">Id Pelanggan</th>
                                                        <th rowspan="2" style="text-align:center"><?php echo $variable_x; ?></th>
                                                        <th rowspan="2" style="text-align:center"><?php echo $variable_y; ?></th>
                                                        <th rowspan="2" style="text-align:center"><?php echo $variable_z; ?></th>
                                                        <th rowspan="1" style="text-align:center" colspan="<?php echo $cluster; ?>">Centroid</th>
                                                        <th rowspan="2" style="text-align:center">Jarak terdekat</th>
                                                        <th rowspan="2" style="text-align:center">Cluster</th>
                                                    </tr>
                                                    <tr>
                                                        <?php for ($i = 1; $i <= $cluster; $i++) { ?>
                                                            <th style="text-center"><?php echo $i; ?></th>
                                                        <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($value as $key_data => $value_data) {

                                                    ?>
                                                        <tr>

                                                            <td style="text-align:center"><?php echo $key_data + 1; ?></td>
                                                            <td style="text-align:center"><?php $cust = $customer_id[$key_data];
                                                                                            echo $cust;
                                                                                            ?></td>
                                                            <td style="text-align:center"><?php echo $value_data['data'][0]; ?></td>
                                                            <td style="text-align:center"><?php echo $value_data['data'][1]; ?></td>
                                                            <td style="text-align:center"><?php echo $value_data['data'][2]; ?></td>
                                                            <?php
                                                            foreach ($value_data['jarak_ke_centroid'] as $key_jc => $value_jc) { ?>
                                                                <td style="text-align:center"><?php echo round($value_jc, 4); ?></td>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td class="text-center"><?php echo round($value_data['jarak_terdekat']['value'], 4); ?></td>

                                                            <td class="text-center"><?php $rc = $value_data['jarak_terdekat']['cluster'];
                                                                                    echo $rc;
                                                                                    ?></td>

                                                        </tr>


                                                        <?php
                                                        $this->db->query("insert into cluster_temp (customer_id,cluster, iteration) 
                                                        values('" . $cust . "','" . $rc . "', '" . $it . "')");

                                                        ?>



                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- <div class="box-body">
                <div id="bar-chart" style="height: 300px;"></div>

            </div> -->
        </div>
    </section>
<?php endif; ?>