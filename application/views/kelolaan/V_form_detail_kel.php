<div class="modal-header bg-info">
    <h4 class="modal-title text-white" id="judul">Verfikator <?= $karyawan['verifikator'] ?> | Kelolaan Capem <?= $karyawan['capem_bank'] ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">×</button>
</div>
    <div class="modal-body">
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-bordered table-hover mt-4" width="100%" id="tabel">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>No</th>
                            <th>Deal Reff</th>
                            <th>No Klaim</th>
                            <th>Nama Debitur</th>
                            <th>SHS</th>
                            <th>Asuransi</th>
                            <!-- <th>Bank</th>
                            <th>Cabang Bank</th>
                            <th>Capem Bank</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; 
                        foreach ($debitur as $d): 
                        $shs = ($d['subrogasi_as'] - $d['recoveries_awal_asuransi']) - $d['recoveries'];
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d['no_reff'] ?></td>
                                <td><?= $d['no_klaim'] ?></td>
                                <td><?= $d['nama_debitur'] ?></td>
                                <td>Rp. <?= number_format($shs,'0','.','.') ?></td>
                                <td><?= $d['cabang_asuransi'] ?></td>
                                <!-- <td><?= $d['bank'] ?></td>
                                <td><?= $d['cabang_bank'] ?></td>
                                <td><?= $d['capem_bank'] ?></td> -->
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-info waves-effect" id="simpan_tl" data-dismiss="modal">Close</button>
    </div>

    <script>
        $(document).ready(function () {
            $('#tabel').DataTable();
        })
    </script>