<style>
    #task tr {
        border-top: hidden;
    }

    #gmbr{
        width: 200px;
        height: 125px;
        cursor: pointer;
    }
</style>
<div class="col-md-12 table-responsive">
        <table id="task" class="table table-hover">
            <tr>
                <th>Nama</th>
                <th>:</th>
                <th><?= $tasklist['nama_lengkap'] ?></th>
            </tr>
            <tr>
                <th>Tugas</th>
                <th>:</th>
                <th><?= $tasklist['tugas'] ?></th>
            </tr>
            <tr>
                <th>Keterangan</th>
                <th>:</th>
                <th><?= $tasklist['keterangan'] ?></th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th>:</th>
                <th><?= tgl_indo($tasklist['expired']) ?></th>
            </tr>
            <tr>
                <th>Hasil</th>
                <th>:</th>
                <th><?= $tasklist['hasil'] ?></th>
            </tr>
            <tr>
                <th>Foto</th>
                <th>:</th>
                <th class="gmbr">
                <img id="gmbr" src="<?= base_url("template/img/foto_tasklist_$id_task.png")?>" style="height: 300px; width: 100%;" class="img-fluid img-thumbnail" alt="img">
                </th>
            </tr>
        </table>
    </div>
</div>