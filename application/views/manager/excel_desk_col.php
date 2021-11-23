<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kunjungan <?= $status ?></title>

    <!-- Custom CSS -->
    <link href="<?= base_url() ?>template/dist/css/style.min.css" rel="stylesheet">

    <style>
        th, td {
        padding: 5px;
        font-size: 12px;
        }
        th {
        text-align: center;
        }
        thead tr th {
        background-color: #eee;
        }
        body {
        margin: 20px 20px 20px 20px;
        color: black;
        }
    </style>
</head>
<body>

<h5 style="font-weight: bold;">Desk Collection</h5>
<table>
    <tbody>
        <?php if(!empty($asuransi)) : ?>
            <tr>
                <td width="150px">Asuransi</td>
                <td>:</td>
                <td><?= $asuransi ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($cbg_asuransi)) : ?>
            <tr>
                <td width="150px">Cabang Asuransi</td>
                <td>:</td>
                <td><?= $cbg_asuransi ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($bank)) : ?>
            <tr>
                <td width="150px">Bank</td>
                <td>:</td>
                <td><?= $bank ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($cbg_bank)) : ?>
            <tr>
                <td width="150px">Cabang Bank</td>
                <td>:</td>
                <td><?= $cbg_bank ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($cpm_bank)) : ?>
            <tr>
                <td width="150px">Capem Bank</td>
                <td>:</td>
                <td><?= $cpm_bank ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($tgl_awal)) : ?>
            <tr>
                <td width="150px">Tanggal Awal</td>
                <td>:</td>
                <td><?= tgl_indo($tgl_awal) ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($tgl_akhir)) : ?>
            <tr>
                <td width="150px">Tanggal Akhir</td>
                <td>:</td>
                <td><?= tgl_indo($tgl_akhir) ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($ver)) : ?>
            <tr>
                <td width="150px">Verifikator</td>
                <td>:</td>
                <td><?= $ver ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($no_spk)) : ?>
            <tr>
                <td width="150px">Nomer SPK</td>
                <td>: <?= ($no_spk == 'No SPK') ? 'Tidak ada SPK' : $no_spk ?></td>
            </tr>
        <?php endif ?>
    </tbody>
</table><?= br() ?>
<table border="1" width=="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Deal Reff</th>
            <th>No Klaim</th>
            <th>Nama Debitur</th>
            <th>No Telp</th>
            <th>Last Call</th>
            <th>FU</th>
            <th>Status Tindakan</th>
            <th>Bank</th>
            <th>Cabang Bank</th>
            <th>Capem Bank</th>
        </tr>
    </thead>
    <tbody>

        <?php if(empty($data_deb)) : ?>
            <tr>
                <td align="center" colspan="11">DATA KOSONG</td>
            </tr>
        <?php else: ?>

            <?php $no=0; foreach ($data_deb as $d): 
            
            $no++;

            $st = $this->model_manager->cari_data_status_tindakan($d['id_debitur'])->row_array();

            $tf = $this->model_manager->cari_data_fu($d['id_tr_potensial']);

            $fu = $tf->row_array();

            if (!empty($tf)) {
            $t = $tf->row_array(1);
            $last_call = $t['tgl_fu'];
            } else {
            $last_call = "-";
            }

            if ($st['id_status_tindakan'] == 1) {
                $status = $st['status_tindakan'];
            } elseif($st['id_status_tindakan'] == 2) {
                $status = $st['status_tindakan'];
            } else {
                $status = $st['status_tindakan'];
            }
                
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $d['no_reff'] ?></td>
                    <td><?= $d['no_klaim'] ?></td>
                    <td><?= $d['nama_debitur'] ?></td>
                    <td><?= $d['telp_debitur'] ?></td>
                    <td><?= nice_date($last_call, "d-M-Y"); ?></td>
                    <td>FU-<?= $fu['fu'] ?></td>
                    <td><?= $status ?></td>
                    <td><?= $d['bank'] ?></td>
                    <td><?= $d['cabang_bank'] ?></td>
                    <td><?= $d['capem_bank'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif ?>
    </tbody>
</table>
    
</body>
</html>