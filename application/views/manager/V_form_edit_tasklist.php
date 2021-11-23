<form id="form_ubah_tl" autocomplete="off">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <input type="hidden" class="id_tasklist" value="<?= $tasklist['id_task_list'] ?>">
                    <label for="inputcom" class="control-label col-form-label">Pilih Verifikator</label>
                    <select class="select2 form-control custom-select karyawan" name="karyawan" style="width: 100%; height:36px;">  
                        <option value="a">-- Pilih Karyawan --</option>

                        <?php $d = $tasklist['id_karyawan']; foreach ($verifikator as $a): ?>
                            <option value="<?= $b = $a['id_karyawan'] ?>" <?= ($d==$b) ? 'selected' : '' ?>><?= $a['nama_lengkap'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="tugas" class="control-label col-form-label">Tugas</label>
                    <input type="text" class="form-control tugas" value="<?= $tasklist['tugas'] ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="tanggal_4" class="control-label col-form-label">Tanggal</label>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <span class="ti-calendar"></span>
                            </span>
                        </div>
                        <input type="text" class="form-control pull-right tanggal2" name="tanggal" value="<?= $tasklist['expired'] ?>" id="tanggal_5">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="ket" class="control-label col-form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control ket" col="2" rows="4"><?= $tasklist['keterangan'] ?></textarea>
                </div>
            </div>
        </div>
    
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-info waves-effect">Simpan</button>
    </div>
</form>

<!-- Select2 -->
<script src="<?= base_url() ?>template/assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/select2/dist/js/select2.min.js"></script>
<script src="<?= base_url() ?>template/dist/js/pages/forms/select2/select2.init.js"></script>

<script>

$('#tanggal_5').dateTimePicker({

// used to limit the date range
limitMax: null, 
limitMin: null, 

// year name
yearName: '',

// month names
monthName: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

// day names
dayName: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],

// "date" or "dateTime"
mode: 'date', 

// custom date format
format: null 

});

</script>