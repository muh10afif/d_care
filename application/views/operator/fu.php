<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Follow Up Debitur</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">D-care</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/operator') ?>">Call Debitur</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Follow Up</li>
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
                    <div class="col-md-5">
                        <form method="post" action="<?php echo base_url('operator/simpan_tindakan');?>">
                            <div class="form-group">
                            <input name="id_tr_ots_p" type="hidden" value="<?php echo $get; ?>">
                                <label for="sel1" style="color: #1a305b"><b>Pilih Tindakan</b></label>
                                <select class="form-control" id="tindakan" name="tindakan">
                                    <option>-</option>
                                    <?php foreach ($tindakan as $r){?>
                                        <option value="<?php echo $r->id_tindakan_fu;?>"><?php echo $r->tindakan_fu;?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="sel1" style="color: #1a305b"><b>Pilih Proses</b></label>
                                <select name="proses" id="proses-tindakan" class="form-control" placeholder="Full Name">
                                    <option>-</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="sel1" style="color: #1a305b"><b>Tanggal Janji Bayar</b>
                            </label>
                                <input name="tgl_fu" type="date" class="form-control"/>
                            </div>
                            <span class="badge badge-danger">*hanya diisi bila penangguhan rutin,
                                pembayaran insidentil, pelunasan,angsuran.</span>
                            <div class="form-group">
                            <label for="sel1" style="color: #1a305b"><b>Nominal</b></label>
                                <input name="nominal" type="text" class="form-control"/>
                            </div>
                            <span class="badge badge-danger">*hanya diisi bila penangguhan rutin,
                                pembayaran insidentil, pelunasan,angsuran.</span>
                            <div class="form-group">
                            <label for="sel1" style="color: #1a305b"><b>Termin</b></label>
                                <input name="termin" type="text" class="form-control"/>
                            </div>
                            <span class="badge badge-danger">*hanya diisi bila termin-angsuran.</span>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="float:right" ><b>Simpan</b></button>  
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>template/assets/libs/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">

    $(function(){

      $.ajaxSetup({
      type:"POST",
      url: "<?php echo base_url('index.php/operator/ambil_data') ?>",
      cache: false,
      });

      $("#tindakan").change(function(){

      var value=$(this).val();
      if(value>0){
      $.ajax({
      data:{modul:'tindakan',id:value},
      success: function(respond){
      $("#proses-tindakan").html(respond);
      }
      })
      }

      });

    })

  </script>