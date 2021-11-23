<div class="modal-header bg-info">
    <h4 class="modal-title text-white" id="judul_ver">Edit Kelolaan</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body"> 
    <div class="row d-flex justify-content-center mt-3 mb-3">
        <input type="hidden" id="id_penempatan_ver" value="<?= $id_penempatan ?>">

        <!-- <div class="row d-flex justify-content-center mt-3 mb-3">
            <div class="col-md-10">
                <div class="row">
                    <label class="col-md-3 control-label col-form-label">Nama Lengkap</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama">
                    </div>
                </div>
            </div> -->

        <div class="col-md-10">
            <div class="row">
                <label class="col-md-3 control-label col-form-label">Verifikator</label>
                <div class="col-md-9">
                    <input type="text" value="<?= $nm_karyawan ?>" class="form-control" readonly>
                </div>
            </div>
        </div>

        <div class="col-md-10 mt-3">
            <div class="row">
                <label class="col-md-3 control-label col-form-label">Bank</label>
                <div class="col-md-9">
                    <select class="select2 form-control custom-select" name="bank_ver" id="bank_ver" style="width: 100%; height:36px;">  
                        <option value="a">-- Pilih Bank --</option>
                        <?php foreach ($list_bank as $b): ?>
                            <option value="<?= $idb = $b['id_bank'] ?>" <?= ($idb == $id_bank) ? 'selected' : '' ?>><?= $b['bank'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-10 mt-3">
            <div class="row">
                <label class="col-md-3 control-label col-form-label">Cabang Bank</label>
                <div class="col-md-9">
                    <select class="select2 form-control custom-select" name="cabang_bank_ver" id="cabang_bank_ver" style="width: 100%; height:36px;">  
                        <option value="a">-- Pilih Cabang Bank --</option>
                        <?php foreach ($list_cabang as $b): ?>
                            <option value="<?= $idcb = $b['id_cabang_bank'] ?>" <?= ($idcb == $id_cbg_bank) ? 'selected' : '' ?>><?= $b['cabang_bank'] ?></option>
                        <?php endforeach;?>
                    </select>
                    <div id="loading_cab_bank_ver" style="margin-top: 10px;" align='center'>
                        <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-10 mt-3">
            <div class="row">
                <label class="col-md-3 control-label col-form-label">Capem Bank</label>
                <div class="col-md-9">
                    <select class="select2 form-control custom-select" name="capem_bank_ver" id="capem_bank_ver" style="width: 100%; height:36px;">  
                        <option value="b"><?= $nm_capem ?></option>
                        <?php foreach ($list_capem as $ca): ?>
                            <option value="<?= $idcp = $ca['id_capem_bank'] ?>" <?= ($idcp == $id_capem) ? 'selected' : '' ?>><?= $ca['capem_bank'] ?></option>
                        <?php endforeach;?>
                    </select>
                    <div id="loading_cap_bank_ver" style="margin-top: 10px;" align='center'>
                        <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-info waves-effect" id="simpan_kel_ver">Simpan</button><?= nbs(3) ?>
    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
</div>

<!-- Select2 -->
<script src="<?= base_url() ?>template/assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/select2/dist/js/select2.min.js"></script>
<script src="<?= base_url() ?>template/dist/js/pages/forms/select2/select2.init.js"></script>

<script>

    $(document).ready(function () {
        
        $('#loading_cab_bank_ver').hide();
        $('#loading_cap_bank_ver').hide();

        // cari pada form edit kelolaan
        $('#bank_ver').change(function () {
            var id_bank = $(this).find('option:selected').val();

            $('#cabang_bank_ver').next('.select2-container').hide();
            $('#loading_cab_bank_ver').show();

            $.ajax({
                url         : "<?= base_url('c_data/ambil_cabang_bank') ?>",
                type        : "POST",
                beforeSend 	: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charshet=UTF-8");
                    }				
                },
                data        : {id_bank:id_bank},
                dataType    : "JSON",
                success     : function (data) {
                    $('#loading_cab_bank_ver').hide();
                    $('#cabang_bank_ver').next('.select2-container').show();
                    $('#cabang_bank_ver').html(data.cabang_bank);

                    $('#capem_bank_ver').html(data.option1);
                },
                error 		: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })

        $('#cabang_bank_ver').change(function () {
            var id_cabang_bank = $(this).find('option:selected').val();

            $('#capem_bank_ver').next('.select2-container').hide();
            $('#loading_cap_bank_ver').show();

            $.ajax({
                url         : "<?= base_url('c_data/ambil_capem_bank') ?>",
                type        : "POST",
                beforeSend  : function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charshet=UTF-8");
                    }
                },
                data        : {id_cabang_bank:id_cabang_bank, aksi:'cari_capem'},
                dataType    : "JSON",
                success     : function (data) {
                    $('#loading_cap_bank_ver').hide();
                    $('#capem_bank_ver').next('.select2-container').show();
                    $('#capem_bank_ver').html(data.capem_bank);
                },
                error 		: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })

    })

</script>