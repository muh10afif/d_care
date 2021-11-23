<style>
    #tabel_eksekusi_jaminan tr th {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }  
    .ubah-status-info {
        cursor: pointer;
    }
    .ubah-sifat-asset {
        cursor: pointer;
    }
    .ubah-proses {
      cursor: pointer;
    }
</style>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Eksekusi Jaminan</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">D-care</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Eksekusi Jaminan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
  <div class="row">
      <div class="col-12">
          <div class="card border-info shadow">
              <div class="card-header bg-info">
                  <div class="col-12" style="text-align: right;">
                        <a href="<?= base_url("manager/unduh_data_eks") ?>"><button type="button" class="btn btn-sm btn-warning ">Unduh Excel</button></a><?= nbs(3) ?>
                        <a href="http://acare.skdigital.id/login" target="_blank"><button type="button" class="btn btn-sm btn-success ">Link A-Care</button></a> 
                  </div>
                    
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tabel_eksekusi_jaminan" width="100%">
                        <thead class="bg-info text-white">
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
                          <!-- <tbody>
                          <?php foreach ($record as $r) {?>
                              <tr class="gradeU">
                                  <td><?php echo $r['nama_debitur'];?></td>
                                  <td><?php echo $r['no_klaim'];?></td>
                                  <td><?php echo $r['bank'];?></td>
                                  <td><?php echo $r['cabang_bank'];?></td>
                                  <td><?php echo $r['capem_bank'];?></td>
                                  <td><?php if($r['status_info']==1){
                                            echo '<span class="badge badge-primary">'.'Lengkap'.'</span>';
                                          }elseif($r['status_info']==2){
                                            echo '<span class="badge badge-danger">'.'Tidak Lengkap'.'</span>';
                                          }else{
                                            echo anchor('manager/actInfoLengkap/'.$r['id_debitur'],'Lengkap',array('class'=>'badge badge-primary'));
                                            echo anchor('manager/actInfoTlengkap/'.$r['id_debitur'],'Tidak Lengkap',array('class'=>'badge badge-danger'));
                                          }
                                        ?>
                                    </td>
                                  <td><?php if($r['id_sifat_asset']==1){
                                            echo '<span class="badge badge-success">'.'Ya'.'</span>';
                                          }elseif($r['id_sifat_asset']==2){
                                            echo '<span class="badge badge-success">'.'Tidak'.'</span>';
                                          }else{
                                            echo anchor('manager/actSifatMarketable/'.$r['id_debitur'],'Ya',array('class'=>'badge badge-success'));
                                            echo anchor('manager/actSifatNmarketable/'.$r['id_debitur'],'Tidak',array('class'=>'badge badge-warning'));
                                          }
                                        ?>
                                  </td>
                                  <td>
                                      <?php if($r['status_proses']==1){
                                            echo '<span class="badge badge-default">'.'Pending'.'</span>';
                                          }elseif($r['status_proses']==2){
                                            echo '<span class="badge badge-warning">'.'Negosiasi'.'</span>';
                                          }elseif($r['status_proses']==3){
                                            echo '<span class="badge badge-success">'.'Acare'.'</span>';
                                          }
                                          else{
                                            echo anchor('manager/actPending/'.$r['id_tr_potensial'],'Pending',array('class'=>'badge badge-info'));
                                            echo anchor('manager/actNegosiasi/'.$r['id_tr_potensial'],'Negosiasi',array('class'=>'badge badge-warning'));
                                            echo anchor('manager/actAcare/'.$r['id_tr_potensial'],'Acare',array('class'=>'badge badge-success'));
                                          }
                                        ?>
                                  </td>
                              </tr>
                          <?php }?>
                          </tbody> -->
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<!-- Modal untuk aksi status info -->

<div id="modal_st_info" class="modal fade" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="judul_k">Aksi Status Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body"> 
                <input type="hidden" id="id_debitur">
                <?php $no=0;
                $warna = ['success', 'danger', 'warning'];
                foreach ($st_info as $i): ?>
                  <div class="row d-flex justify-content-center">
                      <div class="col-md-6 ">
                          <div class="custom-control custom-radio">
                              <input type="radio" id="st_info_<?= $no ?>" name="aksi_st_info" class="custom-control-input" value="<?= $no ?>">
                              <label class="custom-control-label" for="st_info_<?= $no ?>"><h4><span class="badge badge-<?= $warna[$no] ?>"><?= $i['status_info'] ?></span></h4></label>
                          </div>
                      </div>
                  </div>
                <?php $no++; endforeach; ?>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" id="simpan_st_info">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk aksi status info -->

<!-- Modal untuk aksi sifat asset -->

<div id="modal_mkt" class="modal fade" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="judul_k">Aksi Sifat Asset</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body"> 
                <input type="hidden" id="id_debitur">
                <?php $no=1;
                $warna = ['warning','success', 'danger'];
                foreach ($mkt as $i): ?>
                  <div class="row d-flex justify-content-center">
                      <div class="col-md-6 ">
                          <div class="custom-control custom-radio">
                              <input type="radio" id="mkt_<?= $no ?>" name="aksi_mkt" class="custom-control-input" value="<?= $no ?>">
                              <label class="custom-control-label" for="mkt_<?= $no ?>"><h4><span class="badge badge-<?= $warna[$no] ?>"><?= $i['sifat_asset'] ?></span></h4></label>
                          </div>
                      </div>
                  </div>
                <?php $no++; endforeach; ?>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" id="simpan_mkt">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk aksi sifat asset -->

<!-- Modal untuk aksi status proses -->

<div id="modal_st_proses" class="modal fade" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="judul_k">Aksi Status Proses</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body"> 
                <input type="hidden" id="id_tr_pot">
                <?php $no=0;
                $warna_2 = ['success', 'info', 'primary'];
                foreach ($st_proses as $i): ?>
                  <div class="row d-flex justify-content-center">
                      <div class="col-md-6 ">
                          <div class="custom-control custom-radio">
                              <input type="radio" id="proses_<?= $no ?>" name="aksi_st_proses" class="custom-control-input" value="<?= $no ?>">
                              <label class="custom-control-label" for="proses_<?= $no ?>"><h4><span class="badge badge-<?= $warna_2[$no] ?>"><?= ucfirst($i['status_proses']) ?></span></h4></label>
                          </div>
                      </div>
                  </div>
                <?php $no++; endforeach; ?>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" id="simpan_proses">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk aksi status proses -->

<script src="<?= base_url() ?>template/assets/libs/jquery/dist/jquery.min.js"></script>

<script>

$(document).ready(function () {
    var tabel_eksekusi_jaminan = $('#tabel_eksekusi_jaminan').DataTable({
        "processing"    : true,
        "ajax"          : "<?= base_url('manager/tampil_ek_jaminan') ?>",
        stateSave       : true,
        "order"         : []
    })

    $('#tabel_eksekusi_jaminan').on('click', '.ubah-status-info', function () {
        var id_deb  = $(this).data('id');
        var angka   = $(this).attr('angka');

        $('#id_debitur').val(id_deb);

        $('#modal_st_info').modal('show');

        if (angka == 0) {
          $('#st_info_0').attr('checked', true);
        } else if(angka == 1) {
          $('#st_info_1').attr('checked', true);
        }
    })

    $('#tabel_eksekusi_jaminan').on('click', '.ubah-sifat-asset', function () {
        var id_deb  = $(this).data('id');
        var angka   = $(this).attr('angka');

        $('#id_debitur').val(id_deb);

        $('#modal_mkt').modal('show');

        if (angka == 1) {
          $('#mkt_1').attr('checked', true);
        } else if(angka == 2) {
          $('#mkt_2').attr('checked', true);
        }
    })

    $('#tabel_eksekusi_jaminan').on('click', '.ubah-proses', function () {
        var id_tr_pot   = $(this).data('id');
        var angka       = $(this).attr('angka');

        $('#id_tr_pot').val(id_tr_pot);

        $('#modal_st_proses').modal('show');

        if (angka == 1) {
          $('#proses_1').attr('checked', true);
        } else if(angka == 2) {
          $('#proses_2').attr('checked', true);
        } else if(angka == 0) {
          $('#proses_0').attr('checked', true);
        }
    })

    $('#simpan_proses').on('click', function () {
        var angka_proses  = $("input[name=aksi_st_proses]:checked").val();
        var id_tr_pot     = $('#id_tr_pot').val();

        if (angka_proses) {
          $.ajax({
                url         : "<?= base_url('manager/ubah_status_proses') ?>",
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
                data        : {id_tr_pot:id_tr_pot, angka:angka_proses},
                success     : function (data) {
                    tabel_eksekusi_jaminan.ajax.reload(null, false);

                    swal(
                        'Berhasil',
                        'Status Proses berhasil diubah',
                        'success'
                    )

                    $('#modal_st_proses').modal('hide');

                    $('#proses_0').attr( 'checked', false );
                    $('#proses_1').attr( 'checked', false );
                    $('#proses_2').attr( 'checked', false );
                }
            })

            return false;
        } else {
          swal(
                  'Peringatan',
                  'Harap pilih dahulu aksi status proses',
                  'warning'
              )
        }
    })

    $('#simpan_mkt').on('click', function () {
        var angka_mkt = $("input[name=aksi_mkt]:checked").val();
        var id_deb    = $('#id_debitur').val();

        if (angka_mkt) {
          $.ajax({
                url         : "<?= base_url('manager/ubah_sifat_asset') ?>",
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
                data        : {id_debitur:id_deb, angka:angka_mkt},
                success     : function (data) {
                    tabel_eksekusi_jaminan.ajax.reload(null, false);

                    swal(
                        'Berhasil',
                        'Sifat asset berhasil diubah',
                        'success'
                    )

                    $('#modal_mkt').modal('hide');

                    $('#mkt_1').attr( 'checked', false );
                    $('#mkt_2').attr( 'checked', false );
                }
            })

            return false;
        } else {
          swal(
                  'Peringatan',
                  'Harap pilih dahulu aksi sifat asset',
                  'warning'
              )
        }
    })

    $('#simpan_st_info').on('click', function () {
        var angka_st_info = $("input[name=aksi_st_info]:checked").val();
        var id_debitur    = $('#id_debitur').val();

        if (angka_st_info) {
          $.ajax({
                url         : "<?= base_url('manager/ubah_status_info') ?>",
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
                data        : {id_debitur:id_debitur, angka:angka_st_info},
                success     : function (data) {
                    tabel_eksekusi_jaminan.ajax.reload(null, false);

                    swal(
                        'Berhasil',
                        'Status Info berhasil diubah',
                        'success'
                    )

                    $('#modal_st_info').modal('hide');

                    $('#st_info_0').attr( 'checked', false );
                    $('#st_info_1').attr( 'checked', false );
                }
            })

            return false;
        } else {
          swal(
                  'Peringatan',
                  'Harap pilih dahulu aksi status info',
                  'warning'
              )
        }
    })


})

</script>