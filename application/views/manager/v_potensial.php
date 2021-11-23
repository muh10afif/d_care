<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Debitur Potensial</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">D-care</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Debitur Potensial</li>
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
                <div class="card-header">
                    <h3>
                        <a href="<?php echo base_url('manager/tasklist')?>"><button class="btn btn-warning">Task List</button></a>
                    </h3>
                </div>
                <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tabel">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>Nama Debitur</th>
                                <th>Nomor Klaim</th>
                                <th>Bank</th>
                                <th>Cabang</th>
                                <th>Capem</th>
                                <th>FU-1</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($record as $r) {?>
                            <tr class="gradeU">
                                <td><?php echo $r['nama_debitur'];?></td>
                                <td><?php echo $r['no_klaim'];?></td>
                                <td><?php echo $r['bank'];?></td>
                                <td><?php echo $r['cabang_bank'];?></td>
                                <td><?php echo $r['capem_bank'];?></td>
                                <td>
                                    <?php 
                                        echo "<button class='btn btn-sm btn-success'>"."FU-0"."</button>";
                                    ?>
                                    </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


