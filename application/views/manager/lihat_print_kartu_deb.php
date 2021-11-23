<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

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

<h5 style="font-weight: bold;"><?= $report ?></h5>

<table border="1" width=="100%">
    <thead>
        <tr>
            <th>No Reff</th>
            <th>No Klaim</th>
            <th>Nama Debitur</th>
            <th>No Telp</th>
            <th>Alamat</th>
            <th>Jenis Kredit</th>
            <th>Bank</th>
            <th>Cabang Bank</th>
            <th>Capem Bank</th>
            <th>SHS</th>
            <th>Kewajiban</th>
            <th>Pokok</th>
            <th>No SPK</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $d_debitur['no_reff'] ?></td>
            <td><?= $d_debitur['no_klaim'] ?></td>
            <td><?= $d_debitur['nama_debitur'] ?></td>
            <td><?= $d_debitur['telp_debitur'] ?></td>
            <td><?= $d_debitur['alamat_deb'] ?></td>
            <td><?= $d_debitur['jenis_kredit'] ?></td>
            <td><?= $d_debitur['bank'] ?></td>
            <td><?= $d_debitur['cabang_bank'] ?></td>
            <td><?= $d_debitur['capem_bank'] ?></td>
            <td>Rp. <?php $s = $d_debitur['subrogasi'] - $d_debitur['recoveries']; echo number_format($s,'0','.','.') ?></td>
            <td>Rp. <?php $c = $d_debitur['subrogasi'] + $d_debitur['bunga'] + $d_debitur['nominal_denda']; echo number_format($c, '0', '.', '.') ?></td>
            <td>Rp. <?= number_format($d_debitur['subrogasi'], '0', '.', '.') ?></td>
            <td><?= $d_debitur['no_spk'] ?></td>
        </tr>
    </tbody>
</table><?= br() ?>

<h6 style="font-weight: bold;">List Bayar</h6>
<table border="1" width=="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Bayar</th>
            <th>Pembayaran</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($d_recov as $r) : ?>
            <tr>
                <td align="center"><?= $no++ ?>.</td>
                <td><?= tgl_indo($r['tgl_bayar']) ?></td>
                <td>Rp. <?= number_format($r['nominal'],2,',','.') ?></td>
            </tr> 
        <?php endforeach ?>
        
    </tbody>
</table>
    
</body>
</html>