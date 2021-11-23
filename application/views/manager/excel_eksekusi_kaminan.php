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
            <th>Status Info</th>
            <th>Marketable</th>
            <th>Proses</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=0; foreach ($data_deb as $d):
            $no++;    

            $info = $this->model_manager->get_data('status_info')->result_array();

            $i=0;
            foreach ($info as $f) {
                
                if ($d['status_info'] == $i) {
                    $st_info = $f['status_info'];
                }
                $i++;
            }

            if ($d['status_info'] == null) {
                $st_info = "";
            }

            $market = $this->model_manager->get_data('m_sifat_asset')->result_array();

            $i=1;
            foreach ($market as $m) {
                
                if ($d['id_sifat_asset'] == $i) {
                    $mkt = $m['sifat_asset'];
                }

                $i++;
            }

            if ($d['id_sifat_asset'] == null) {
                $mkt = "";
            }

            $proses = $this->model_manager->get_data_st_proses()->result_array();

            $i=0;
            foreach ($proses as $p) {
                
                if($d['status_proses'] == $i){
                    $st_proses = ucfirst($p['status_proses']);
                }
                $i++;
            }

            if($d['status_proses'] == null){
                $st_proses = "";
            }

        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $d['nama_debitur'] ?></td>
                <td><?= $d['no_klaim'] ?></td>
                <td><?= $d['bank'] ?></td>
                <td><?= $d['cabang_bank'] ?></td>
                <td><?= $d['capem_bank'] ?></td>
                <td><?= $st_info ?></td>
                <td><?= $mkt ?></td>
                <td><?= $st_proses ?></td>
            </tr>
        <?php endforeach; ?>
        
    </tbody>

</table>

</body>
</html>