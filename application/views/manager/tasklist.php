<style>
    #tabel_tasklist_khusus tr th {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }    
    #tabel_tl_kunjungan tr th {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }    
</style>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Task List</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">D-care</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Task List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Data Task List</h4>
                </div>
                <div class="card-body">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs mt-3 mb-3" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#khusus" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Khusus</span></a> </li>
                        <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#kunjungan" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Kunjungan</span></a> </li> -->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane active" id="khusus" role="tabpanel">
                            <!-- <a href="<?php echo base_url('manager/tambah_task');?>"><button class="btn btn-success mb-3">Tambah Tugas</button></a> -->
                            <button class="btn btn-success mb-3" id="tambah_tugas" data-toggle="modal" data-target="#modal_tambah_task">Tambah Tugas</button>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="tabel_tasklist_khusus" width="100%">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Verifikator</th>
                                            <th>Tugas</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            
                        </div>
                        <div class="tab-pane  p-20" id="kunjungan" role="tabpanel">
                            <!-- <a href="<?php echo base_url('manager/tambah_task');?>"><button class="btn btn-success mb-3">Tambah Data</button></a> -->
                           
                                <button class="btn btn-success mb-3" id="tambah_kunjungan" <?= (empty($debitur)) ? 'hidden' : ''; ?>>Tambah Data</button>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="tabel_tl_kunjungan" width="100%">
                                    <thead class="bg-info text-white">
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
                                        <th>Verifikator</th>
                                        <th>Expired</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah task -->
<div id="modal_tambah_task" class="modal fade" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="vcenter">Tambah Tugas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form_tambah_tl" autocomplete="off">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="inputcom" class="control-label col-form-label">Pilih Verifikator</label>
                                <select class="select2 form-control custom-select" name="karyawan" id="karyawan" style="width: 100%; height:36px;">  
                                    <option value="a">-- Pilih Karyawan --</option>
                                    <?php foreach ($verifikator as $a): ?>
                                        <option value="<?= $a['id_karyawan'] ?>"><?= $a['nama_lengkap'] ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tugas" class="control-label col-form-label">Tugas</label>
                                <input type="text" class="form-control" id="tugas" placeholder="Masukkan Tugas">
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
                                    <input type="text" class="form-control pull-right tanggal" name="tanggal" placeholder="Tanggal Tasklist" id="tanggal_4">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ket" class="control-label col-form-label">Keterangan</label>
                                <textarea id="ket" name="keterangan" class="form-control" col="2" rows="4" placeholder="Masukkan Keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- modal tambah data knjungan -->
<div id="modal_tambah_kunjugan" class="modal fade" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="judul_k">Tambah Tasklist Kunjungan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body"> 
                <div class="row">
                    <input type="hidden" id="id_task_list">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="tugas" class="control-label col-form-label">Debitur</label>
                            <div id="nm_deb">
                            <select class="select2 form-control custom-select" name="debitur_k" id="debitur_k" style="width: 100%; height:36px;" required>  
                                <option value="a">-- Pilih Debitur --</option>
                                <?php foreach ($debitur as $a): ?>
                                    <option value="<?= $a['id_debitur'] ?>"><?= $a['nama_debitur'] ?></option>
                                <?php endforeach;?>
                            </select>
                            </div>
                            <div id="deb"></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="tanggal_4" class="control-label col-form-label">Tanggal Expired</label>
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="ti-calendar"></span>
                                    </span>
                                </div>
                                <input type="text" class="form-control pull-right tanggal1" name="tanggal" placeholder="Masukkan Tanggal Expired" id="tanggal_exp" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" id="simpan_tk" data="tambah">Simpan</button>
            </div>
        </div>
    </div>
</div>


<!-- modal edit task -->
<div id="modal_edit_task" class="modal fade" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="judul">Edit Tugas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div id="edit_tasklist"> 
            </div>
        </div>
    </div>
</div>

<!-- modal detail task -->
<div id="modal_detail_task" class="modal fade modal_detail_task" tabindex="-1" role="dialog" aria-labelledby="modal_detail_task" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="modal_detail_task">Detail Tasklist Khusus</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div id="detail_tasklist"> 
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>template/assets/libs/jquery/dist/jquery.min.js"></script>

<script>

   $(document).ready(function () {
       
        var tabel_tasklist_khusus = $('#tabel_tasklist_khusus').DataTable({

            "processing"    : true,
            "serverSide"    : true,
            "order"         : [],
            "ajax"          : {
                "url"   : "<?= base_url("manager/tampil_tasklist_khushus/") ?>",
                "type"  : "POST"
            },
            "columnDefs"    : [{
                "targets"       : [0],
                "orderable"     : false
            }]

        })

        // tidak serverside
        // var tabel_tasklist_khusus = $('#tabel_tasklist_khusus').DataTable({

        //     "processing"    : true,
        //     "ajax"          : "<?= base_url("manager/tampil_tasklist_khushus_2/") ?>",
        //     stateSave       : true,
        //     "order"         : []

        // })

        var tabel_tl_kunjungan = $('#tabel_tl_kunjungan').DataTable({

            "processing"    : true,
            "ajax"          : "<?=base_url("manager/tampil_tasklist_kunjugan")?>",
            stateSave       : true,
            "order"         : []

        })

        $('#tambah_kunjungan').on('click', function () {
            $('#modal_tambah_kunjugan').modal('show');

            $('#judul_k').html('Tambah Tasklist Kunjungan');
            $('#tanggal_exp').val('');
            $('#debitur_k').select2('val', 'a');
            $('#nm_deb').show();
            $('#deb').hide();
            $('#simpan_tk').attr('data', 'tambah')
        })

        // aksi tambah tasklist kunjungan
        $('#simpan_tk').click(function () {
            var id_debitur  = $('#debitur_k').val();
            var tanggal     = $('#tanggal_exp').val();
            var data        = $(this).attr('data');
            var id_tasklist = $('#id_task_list').val();

            if (data == 'tambah') {
                $.ajax({
                    url         : "<?= base_url('manager/simpan_tl_kunjungan') ?>",
                    type        : "POST",
                    beforeSend  : function () {
                        swal({
                            title   : 'Menunggu',
                            html    : 'Memproses data',
                            onOpen  : () => {
                                swal.showLoading();
                            }
                        })
                    },
                    data        : {id_debitur:id_debitur, tanggal_exp:tanggal},
                    dataType    : "JSON",
                    success     : function (data) {
                        tabel_tl_kunjungan.ajax.reload(null, false);

                        swal(
                            'Tambah tasklist kunjungan',
                            'Berhasil menambahkan tasklist kunjungan',
                            'success'
                        )

                        $('#modal_tambah_kunjugan').modal('hide');

                        $('#debitur_k').val('');
                        $('#tanggal_exp').val('');

                        console.log(data.jml_deb);

                        if (data.jml_deb == 0) {
                            $('#tambah_kunjungan').attr('hidden', true);
                        }
                    }
                })
                
                return false; 
            } else {
                $.ajax({
                    url         : "<?= base_url('manager/ubah_tl_kunjungan') ?>",
                    type        : "POST",
                    beforeSend  : function () {
                        swal({
                            title   : 'Menunggu',
                            html    : 'Memproses data',
                            onOpen  : () => {
                                swal.showLoading();
                            }
                        })
                    },
                    data        : {id_tasklist:id_tasklist, tanggal_exp:tanggal},
                    success     : function (data) {
                        tabel_tl_kunjungan.ajax.reload(null, false);

                        swal(
                            'Ubah tasklist kunjungan',
                            'Berhasil mengubah tasklist kunjungan',
                            'success'
                        )

                        $('#modal_tambah_kunjugan').modal('hide');

                        $('#debitur_k').val('');
                        $('#tanggal_exp').val('');
                    }
                })
                
                return false;
            }

            
        })

        // edit tasklist kunjungan
        $('#tabel_tl_kunjungan').on('click','.ubah-kunjungan', function () {
            var id_tasklist = $(this).attr('id_tk');
            var id_debitur  = $(this).attr('id_deb');

            console.log(id_debitur);

            $.ajax({
                url         : "<?= base_url('manager/ambil_nama_deb') ?>",
                type        : "POST",
                beforeSend  : function () {
                    swal({
                        title   : 'Menunggu',
                        html    : 'Memproses data',
                        onOpen  : () => {
                            swal.showLoading();
                        }
                    })
                },
                data        : {id_debitur:id_debitur},
                dataType    : "JSON",
                success     : function (data) {
                    swal.close();

                    $('#modal_tambah_kunjugan').modal('show');
                    $('#judul_k').html('Edit Tasklist Kunjungan');
                    $('#nm_deb').hide();
                    $('#deb').show();
                    $('#deb').html(data.nama);
                    $('#tanggal_exp').val(data.exp);
                    $('#tanggal_exp').addClass('tanggal2');
                    $('#tanggal_exp').removeClass('tanggal1');
                    $('#id_task_list').val(id_tasklist);

                    $('#simpan_tk').attr('data', 'edit');


                }
            })

            return false;   

        })

        // hapus tasklist kunjungan
        $('#tabel_tl_kunjungan').on('click', '.hapus-kunjungan', function () {
            var id_tasklist = $(this).data('id');

            swal({
                title               : 'Konfirmasi',
                text                : "Anda ingin hapus tasklist kunjungan ",
                type                : 'warning',

                showCancelButton    : true,
                confirmButtonText   : 'Hapus',
                confirmButtonColor  : '#d33',
                cancelButtonColor   : '#3085d6',
                cancelButtonText    : 'Tidak',
                reverseButtons      : true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url         : "<?= base_url('manager/hapus_kunjungan') ?>",
                        type        : "POST",
                        beforeSend  : function () {
                            swal({
                                title   : 'Menunggu',
                                html    : 'Memproses data',
                                onOpen  : () => {
                                    swal.showLoading();
                                }
                            })
                        },
                        data        : {id_tasklist:id_tasklist},
                        dataType    : "JSON",
                        success     : function (data) {
                            tabel_tl_kunjungan.ajax.reload(null, false);

                            swal(
                                'Hapus tasklist khusus',
                                'Berhasil menghapus tasklist khusus',
                                'success'
                            )

                            if (data.jml_deb != 0) {
                                $('#tambah_kunjungan').attr('hidden', false);
                            }
                        }
                    })

                    return false;
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal(
                        'Batal',
                        'Anda membatalkan hapus tasklist kunjungan',
                        'error'
                    )
                }
            })

            
        })

        $('#form_tambah_tl').on('submit', function () {

            var id_karyawan = $('#karyawan').val();
            var tugas       = $('#tugas').val();
            var tanggal     = $('.tanggal').val();
            var ket         = $('#ket').val();

            $.ajax({
                url     : "<?= base_url('manager/tambah_tl_khusus') ?>",
                type    : "POST",
                beforeSend  : function () {
                    swal({
                        title   : 'Menunggu',
                        html    : 'Memproses data',
                        onOpen  : () => {
                            swal.showLoading();
                        }
                    })
                },
                data    : {id_karyawan:id_karyawan, tugas:tugas, tanggal:tanggal, ket:ket},
                success : function (data) {
                    tabel_tasklist_khusus.ajax.reload(null, false);
                    
                    swal(
                        'Tambah Tasklist Khusus',
                        'Berhasil tambah Tasklist Khusus',
                        'success'
                    )

                    $('#modal_tambah_task').modal('hide');
                }
            })

            return false;

        })

        // aksi selesai tasklist
        $('#tabel_tasklist_khusus').on('click', '.selesai-tasklist', function () {
            var id_tasklist = $(this).data('id');
            var status      = $(this).data('st');

            swal({
                title               : 'Konfirmasi',
                text                : "Anda ingin ubah status ",
                type                : 'warning',

                showCancelButton    : true,
                confirmButtonText   : 'Ubah',
                confirmButtonColor  : '#3085d6',
                cancelButtonColor   : '#d33',
                cancelButtonText    : 'Tidak',
                reverseButtons      : true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url         : "<?= base_url('manager/ubah_status_tasklist/') ?>"+status,
                        type        : "POST",
                        beforeSend  : function () {
                            swal({
                                title   : 'Menunggu',
                                html    : 'Memproses data',
                                onOpen  : () => {
                                    swal.showLoading();
                                }
                            })   
                        },
                        data        : {id_tasklist:id_tasklist},
                        success     : function (data) {
                            tabel_tasklist_khusus.ajax.reload(null, false);

                            swal(
                                'Ubah status',
                                'Berhasil mengubah ke status Selesai',
                                'success'
                            )
                        }
                    })

                    return false;
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal(
                        'Batal',
                        'Anda membatalkan ubah status',
                        'error'
                    )
                }
            })

            
        })

        // aksi tidak selesai tasklist
        $('#tabel_tasklist_khusus').on('click', '.tdk-selesai-tasklist', function () {
            var id_tasklist = $(this).data('id');
            var status      = $(this).data('st');

            swal({
                title               : 'Konfirmasi',
                text                : "Anda ingin ubah status ",
                type                : 'warning',

                showCancelButton    : true,
                confirmButtonText   : 'Ubah',
                confirmButtonColor  : '#3085d6',
                cancelButtonColor   : '#d33',
                cancelButtonText    : 'Tidak',
                reverseButtons      : true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url         : "<?= base_url('manager/ubah_status_tasklist/') ?>"+status,
                        type        : "POST",
                        beforeSend  : function () {
                            swal({
                                title   : 'Menunggu',
                                html    : 'Memproses data',
                                onOpen  : () => {
                                    swal.showLoading();
                                }
                            })   
                        },
                        data        : {id_tasklist:id_tasklist},
                        success     : function (data) {
                            tabel_tasklist_khusus.ajax.reload(null, false);

                            swal(
                                'Ubah status',
                                'Berhasil mengubah ke status Tidak Selesai',
                                'success'
                            )
                        }
                    })

                    return false;
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal(
                        'Batal',
                        'Anda membatalkan ubah status',
                        'error'
                    )
                }
            })

            
        })

        // detail tasklist
        $('#tabel_tasklist_khusus').on('click', '.detail-tasklist', function () {
            
            var id_tasklist = $(this).data('id');

            $.ajax({
                url     : "<?= base_url('manager/form_detail_tasklist') ?>",
                type    : "POST",
                beforeSend  : function () {
                    swal({
                        title   : 'Menunggu',
                        html    : 'Memproses data',
                        onOpen  : () => {
                            swal.showLoading();
                        }
                    })   
                },
                data        : {id_tasklist:id_tasklist},
                success     : function (data) {
                    swal.close();

                    $('#modal_edit_task').modal('show');
                    $('#edit_tasklist').html(data);
                    $('#judul').html('Detail Tasklist');
                }
            })

            return false;

        })

        // edit tasklist
        $('#tabel_tasklist_khusus').on('click', '.ubah-tasklist', function () {
            
            var id_tasklist = $(this).data('id');

            $.ajax({
                url         : "<?= base_url('manager/form_edit_tasklist') ?>",
                type        : "POST",
                beforeSend  : function () {
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })   
                },
                data        : {id_tasklist:id_tasklist},
                success     : function (data) {
                    swal.close();

                    $('#modal_edit_task').modal('show');
                    $('#edit_tasklist').html(data);

                    $('#form_ubah_tl').on('submit', function () {
                        var id_tasklist = $('.id_tasklist').val();
                        var id_karyawan = $('.karyawan').val();
                        var tugas       = $('.tugas').val();
                        var tanggal     = $('.tanggal2').val();
                        var ket         = $('.ket').val();

                        console.log(id_tasklist);

                        $.ajax({
                            url         : "<?= base_url('manager/ubah_tasklist') ?>",
                            type        : "POST",
                            beforeSend  : function () {
                                swal({
                                    title: 'Menunggu',
                                    html: 'Memproses data',
                                    onOpen: () => {
                                        swal.showLoading()
                                    }
                                })   
                            },
                            data        : {id_tasklist:id_tasklist, id_karyawan:id_karyawan,tugas:tugas, tanggal:tanggal, ket:ket },
                            success     : function (data) {
                                tabel_tasklist_khusus.ajax.reload(null, false);

                                swal(
                                    'Ubah Tasklist Khusus',
                                    'Berhasil ubah Tasklist Khusus',
                                    'success'
                                )

                                $('#modal_edit_task').modal('hide');
                                
                            }
                        })

                        return false;

                    })
                }
            })

        })

        // hapus tasklist
        $('#tabel_tasklist_khusus').on('click', '.hapus-tasklist', function () {
            var id_tasklist = $(this).data('id');

            swal({
                title               : 'Konfirmasi',
                text                : "Anda ingin menghapus ",
                type                : 'warning',

                showCancelButton    : true,
                confirmButtonText   : 'Hapus',
                confirmButtonColor  : '#d33',
                cancelButtonColor   : '#3085d6',
                cancelButtonText    : 'Tidak',
                reverseButtons      : true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url         :"<?=base_url('manager/hapus_tasklist')?>",  
                            method      :"post",
                            beforeSend  :function () {
                            swal({
                                title   : 'Menunggu',
                                html    : 'Memproses data',
                                onOpen  : () => {
                                        swal.showLoading()
                                    }
                                })      
                            },    
                            data        :{id_tasklist:id_tasklist},
                            success     :function(data){
                                tabel_tasklist_khusus.ajax.reload(null, false);

                                swal(
                                    'Hapus',
                                    'Berhasil Terhapus',
                                    'success'
                                )
                                
                    
                            }
                        })
                    } else if (result.dismiss === swal.DismissReason.cancel) {
                        swal(
                            'Batal',
                            'Anda membatalkan penghapusan',
                            'error'
                        )
                    }
                })
        })

   })

</script>
