<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Kunjungan Debitur Non Potensial</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Desk Care</a></li>
                        <li class="breadcrumb-item"><a href="#">Kunjungan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Debitur Non Potensial</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
  <div class="row">
        <div class="col-12">
            <div class="card border-info card-hover">
                <div class="card-header bg-info">
					<h4 class="mb-0 text-white">Filter Data</h4></div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-4">
                            <select class="select2 form-control custom-select" name="asuransi" id="asuransi" style="width: 100%; height:36px;">  
                                <option value="">-- Pilih Asuransi --</option>
                                <?php foreach ($asuransi as $a): ?>
                                    <option value="<?= $a['id_asuransi'] ?>"><?= $a['asuransi'] ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="select2 form-control custom-select" name="cabang_asuransi" id="cabang_asuransi" style="width: 100%; height:36px;">  
                                <option value="">-- Pilih Cabang Asuransi --</option>
                                
                            </select>
                            <div id="loading_cab_as" style="margin-top: 10px;" align='center'>
                                <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select class="select2 form-control custom-select" name="bank" id="bank" style="width: 100%; height:36px;">  
                                <option value="">-- Pilih Bank --</option>
                                <?php foreach ($bank as $b): ?>
                                    <option value="<?= $b['id_bank'] ?>"><?= $b['bank'] ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-4 mt-2">
                            <select class="select2 form-control custom-select" name="cabang_bank" id="cabang_bank" style="width: 100%; height:36px;">  
                                <option value="">-- Pilih Cabang Bank --</option>
                                
                            </select>
                            <div id="loading_cab_bank" style="margin-top: 10px;">
                                <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <select class="select2 form-control custom-select" name="capem_bank" id="capem_bank" style="width: 100%; height:36px;">  
                                <option value=" ">-- Pilih Capem Bank --</option>
                                
                            </select>
                            <div id="loading_cap_bank" style="margin-top: 10px;">
                                <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="ti-calendar"></span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="tgl_awal" placeholder="Tanggal Awal Periode" id="tanggal">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="ti-calendar"></span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="tgl_akhir" placeholder="Tanggal Akhir Periode" id="tanggal2">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                <div class="col-md-12" align="center">
						<button class="btn btn-success" onclick="b()" name="cari">Tampilkan</button><?= nbs(3) ?>
						<button class="btn btn-warning" onclick="b()" name="all">Tampil Semua</button>
					</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-hover">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Data Kunjungan Debitur Non Potensial</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="tabel">
						<thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Id Care</th>
                                <th>No Klaim</th>
                                <th>Nama Debitur</th>
                                <th>SHS</th>
                                <th>Bank</th>
                                <th>Cabang Bank</th>
                                <th>Capem Bank</th>
                                <th>Tanggal OTS</th>
                                <th>Verifikator</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                            <td><button type="button" class="btn waves-effect waves-light btn-rounded btn-outline-info">Kembalikan Data</button></td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>template/assets/libs/jquery/dist/jquery.min.js"></script>

<script>

    $(document).ready(function () {

        $('#loading_cab_as').hide();
        $('#loading_cab_bank').hide();
        $('#loading_cap_bank').hide();

        $('#asuransi').on('change', function () {
            var id_asuransi = $("#asuransi").val();

            $('#cabang_asuransi').next('.select2-container').hide();
            $('#loading_cab_as').show();

            $.ajax({
                url         : "<?= base_url('c_data/ambil_cabang_asuransi') ?>",
                type        : "POST",
                beforeSend 	: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charshet=UTF-8");
                    }				
                },
                data        : {id_asuransi:id_asuransi},
                dataType    : "JSON",
                success     : function (data) {
                    $('#loading_cab_as').hide();
                    $('#cabang_asuransi').next('.select2-container').show();
                    $('#cabang_asuransi').html(data.cabang_as);
                },
                error 		: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })

        $('#bank').change(function () {
            var id_bank = $(this).find('option:selected').val();

            $('#cabang_bank').next('.select2-container').hide();
            $('#loading_cab_bank').show();

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
                    $('#loading_cab_bank').hide();
                    $('#cabang_bank').next('.select2-container').show();
                    $('#cabang_bank').html(data.cabang_bank);

                    $('#capem_bank').select2("val", ' ');
                },
                error 		: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })

        // mencari capem bank
        $('#cabang_bank').change(function () {
            var id_cabang_bank = $(this).find('option:selected').val();

            $('#capem_bank').next('.select2-container').hide();
            $('#loading_cap_bank').show();

            $.ajax({
                url         : "<?= base_url('c_data/ambil_capem_bank') ?>",
                type        : "POST",
                beforeSend  : function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charshet=UTF-8");
                    }
                },
                data        : {id_cabang_bank:id_cabang_bank},
                dataType    : "JSON",
                success     : function (data) {
                    $('#loading_cap_bank').hide();
                    $('#capem_bank').next('.select2-container').show();
                    $('#capem_bank').html(data.capem_bank);
                },
                error 		: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })
        
    })
    
</script>