<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Tambah Task List</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">D-care</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/managerSyariah');?>">Debitur Potensial</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('managerSyariah/tasklist');?>">Task List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah data Task List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

  <div class="row">
      <div class="col-12">
          <div class="card border-info">
              <div class="card-body">
                  <form class="form-horizontal" method="post" action="<?php echo base_url('managerSyariah/act_tasklist');?>">
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b style="color:#1a305b"> Pilih Verifikator </b></label>
                    <div class="col-sm-9">
                      <select name="id_karyawan"class="form-control col-xs-10 col-sm-5">
                        <option type="text" id="form-field-1" class=" form-controlcol-xs-10 col-sm-5">--Pilih Karyawan--</option>
                        <?php foreach ($verifikator as $r) { ?>
                            <option type="text" id="form-field-1" value="<?php echo $r['id_karyawan']?>" class=" form-controlcol-xs-10 col-sm-5"><?php echo $r['nama_lengkap']?> </option>
                        <?php }?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b style="color:#1a305b"> Tugas </b></label>
                    <div class="col-sm-9">
                      <input type="text" id="form-field-1" name="tugas" class=" form-control col-xs-10 col-sm-5" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b style="color:#1a305b"> Keterangan </b></label>
                    <div class="col-sm-9">
                      <textarea type="text" id="form-field-1" name="keterangan" class=" form-control col-xs-10 col-sm-5"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b style="color:#1a305b"> Tanggal </b></label>
                    <div class="col-sm-9">
                      <input type="date" id="form-field-1" placeholder="Tanggal" name="tanggal" class="form-control col-xs-10 col-sm-5" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-7">
                      <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    </div>
                  </div>              
              </form>
              </div>
          </div>
      </div>
  </div>

</div>