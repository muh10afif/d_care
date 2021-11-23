<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Summary Asuransi</title>

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

<h5 style="font-weight: bold;">Data Summary Asuransi</h5>
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
</table><br>
<table border="1" width=="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Cabang Asuransi</th>
            <th>Debitur Kelolaan</th>
            <th>Debitur Sudah OTS</th>
            <th>% Sudah OTS</th>
            <th>Potensial</th>
            <th>Non Potensial</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($data_deb)): ?>

            <tr>
                <td align="center" colspan="12">DATA KOSONG</td>
            </tr>

        <?php else : ?>

            <?php $no=0; foreach ($data_deb as $d): 

                if ($a['debitur_kelolaan'] == 0) {
                    $persen_ots = 0;
                } else {
                    $persen_ots = ($d['sudah_ots'] / $d['debitur_kelolaan']) * 100;
                }
            
                $no++;
                
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $d['cabang_asuransi'] ?></td>
                    <td align="center"><?= $d['debitur_kelolaan'] ?></td>
                    <td align="center"><?= $d['sudah_ots'] ?></td>
                    <td><?= number_format($persen_ots,'2','.','.') ?> %</td>
                    <td align="center"><?= $d['potensial'] ?></td>
                    <td align="center"><?= $d['non_potensial'] ?></td>
                </tr>
            <?php endforeach; ?>

        <?php endif; ?>
    </tbody>
</table>
    
</body>
</html>