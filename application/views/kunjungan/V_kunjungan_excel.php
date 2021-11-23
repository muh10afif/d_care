<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kunjungan <?= $verifikator ?></title>

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

<h5 style="font-weight: bold;">List Kunjungan <?= $verifikator ?> </h5>
<table>
    <tbody>
        <?php if(!empty($asuransi)) : ?>
            <tr>
                <td width="150px">Asuransi</td>
                <td>: <?= $asuransi ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($cabang_asuransi)) : ?>
            <tr>
                <td width="150px">Cabang Asuransi</td>
                <td>: <?= $cabang_asuransi ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($bank)) : ?>
            <tr>
                <td width="150px">Bank</td>
                <td>: <?= $bank ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($cabang_bank)) : ?>
            <tr>
                <td width="150px">Cabang Bank</td>
                <td>: <?= $cabang_bank ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($capem_bank)) : ?>
            <tr>
                <td width="150px">Capem Bank</td>
                <td>: <?= $capem_bank ?></td>
            </tr>
        <?php endif ?>
        <?php if($tanggal_awal != '') : ?>
            <tr>
                <td width="150px">Tanggal Awal</td>
                <td>: <?= nice_date($tanggal_awal, 'd-M-Y') ?></td>
            </tr>
        <?php endif ?>
        <?php if($tanggal_akhir != '') : ?>
            <tr>
                <td width="150px">Tanggal Akhir</td>
                <td>: <?= nice_date($tanggal_akhir, 'd-M-Y') ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($no_spk)) : ?>
                <tr>
                    <td width="150px">Nomer SPK</td>
                    <td>: <?= ($no_spk == 'No SPK') ? 'Tidak ada SPK' : $no_spk ?></td>
                </tr>
        <?php endif ?>
    </tbody>
</table> <br>
<table border="1" width=="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Deal Reff</th>
            <th>Debitur</th>
            <th>Capem Bank</th>
            <th>Cabang Asuransi</th>
            <th>SHS</th>
            <th>PIC</th>
            <th>Status Hubungan</th>
            <th>Status Potensial</th>
            <th>Status OTS</th>
            <th>Keterangan</th>
            <th>Tanggal OTS</th>
            <th>Tanggal Prioritas</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($data)): ?>
            <tr>
                <td align="center" colspan="13">DATA KOSONG</td>
            </tr>

        <?php else : ?>

        <?php $no=0; foreach ($data as $d): 
        
        $no++;

        $shs = ($d['subrogasi_as'] - $d['recoveries_awal_asuransi']) - $d['tot_recov'];

        if ($d['potensial'] == 1) {
            $status = "Potensial";
        } elseif ($d['potensial'] == null) {
            $status = "";
        } elseif ($d['potensial'] == 0) {
            $status = "Non Potensial";
        }

        if ($d['ots'] == 1) {
            $status_o = "OTS";
        } elseif ($d['ots'] == null) {
            $status_o = "";
        } else {
            $status_o = "Bukan OTS";
        }
            
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $d['no_reff'] ?></td>
                <td><?= $d['nama_debitur'] ?></td>
                <td><?= $d['capem_bank'] ?></td>
                <td><?= $d['cabang_asuransi'] ?></td>
                <td><?= $shs ?></td>
                <td><?= $d['pic'] ?></td>
                <td><?= $d['status_hubungan'] ?></td>
                <td><?= $status ?></td>
                <td><?= $status_o ?></td>
                <td><?= $d['keterangan'] ?></td>
                <td><?= nice_date($d['tgl_ots'], 'd-M-Y H:i:s'); ?></td>
                <td><?= nice_date($d['tgl_prioritas'], 'd-M-Y H:i:s'); ?></td>
            </tr>
        <?php endforeach; ?>

        <?php endif; ?>
    </tbody>
</table>
    
</body>
</html>