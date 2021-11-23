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

<h5 style="font-weight: bold;">Tindakan Hukum</h5>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Debitur</th>
            <th>Nomor Klaim</th>
            <th>Bank</th>
            <th>Cabang</th>
            <th>Capem</th>
            <th>Somasi</th>
            <th>Tindakan</th>
            <th>Close</th>
            <th>Keputusan Manajer</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=0; foreach ($data_deb as $d):
            $no++;    

            if ($d['keputusan_manajer'] == 1) {
                $kp = "A-Care";
            } else if($d['keputusan_manajer'] == 2) {
                $kp = "Not Potensial";
            } else if($d['keputusan_manajer'] == 3) {
                $kp = "No Action Needed";
            } else {
                $kp = "";
            }
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $d['nama_debitur'] ?></td>
                <td><?= $d['no_klaim'] ?></td>
                <td><?= $d['bank'] ?></td>
                <td><?= $d['cabang_bank'] ?></td>
                <td><?= $d['capem_bank'] ?></td>
                <td></td>
                <td><?= $d['tindakan_hukum']; ?></td>
                <td></td>
                <td><?= $kp ?></td>
            </tr>
        <?php endforeach; ?>
        
    </tbody>

</table>

</body>
</html>