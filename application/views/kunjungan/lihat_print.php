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

<h5 style="font-weight: bold;">Kunjungan <?= $status_deb ?></h5>
<table>
    <tbody>
        <?php if(!empty($asuransi)) : ?>
            <tr>
                <td width="150px">Asuransi</td>
                
                <td>: <?= $asuransi ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($cbg_asuransi)) : ?>
            <tr>
                <td width="150px">Cabang Asuransi</td>
                
                <td>: <?= $cbg_asuransi ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($bank)) : ?>
            <tr>
                <td width="150px">Bank</td>
                
                <td>: <?= $bank ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($cbg_bank)) : ?>
            <tr>
                <td width="150px">Cabang Bank</td>
                
                <td>: <?= $cbg_bank ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($cpm_bank)) : ?>
            <tr>
                <td width="150px">Capem Bank</td>
                
                <td>: <?= $cpm_bank ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($tgl_awal)) : ?>
            <tr>
                <td width="150px">Tanggal Awal</td>
                
                <td>: <?= nice_date($tgl_awal, 'd-M-Y') ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($tgl_akhir)) : ?>
            <tr>
                <td width="150px">Tanggal Akhir</td>
                
                <td>: <?= nice_date($tgl_akhir, 'd-M-Y') ?></td>
            </tr>
        <?php endif ?>
        <?php if(!empty($ver)) : ?>
            <tr>
                <td width="150px">Verifikator</td>
                
                <td>: <?= $ver ?></td>
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
            <th>SHS</th>
            <th>Bank</th>
            <th>Cabang Bank</th>
            <th>Capem Bank</th>
            <th>Tanggal OTS</th>
            <th>Tanggal Prioritas</th>
            <th>Keterangan</th>
            <th>Verifikator</th>
            <?php if($status == 1): ?>

                <th>Status</th>

            <?php endif ?>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($data_deb)): ?>
            <tr>
            <?php if($status == 1): ?>

                <td align="center" colspan="13">DATA KOSONG</td>

            <?php else : ?>
                <td align="center" colspan="12">DATA KOSONG</td>
            <?php endif ?>
                
            </tr>
        <?php endif; ?>

        <?php $no=0; foreach ($data_deb as $d): 
        
        $no++;
            
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $d['no_reff'] ?></td>
                <td><?= $d['no_klaim'] ?></td>
                <td><?= $d['nama_debitur'] ?></td>
                <td><?= $d['total_shs'] ?></td>
                <td><?= $d['bank'] ?></td>
                <td><?= $d['cabang_bank'] ?></td>
                <td><?= $d['capem_bank'] ?></td>
                <td><?= $d['tanggal_ots'] ?></td>
                <td><?= $d['tanggal_pri'] ?></td>
                <td><?= $d['keterangan'] ?></td>
                <td><?= $d['nama_verifikator'] ?></td>

                <?php if($status == 1): ?>

                    <td>FU - <?= $d['fu'] ?></td>

                <?php endif ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    
</body>
</html>