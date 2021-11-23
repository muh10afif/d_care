<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown mt-3">
                        <div class="user-pic"><img src="<?= base_url() ?>template/assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu ml-2">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 user-name font-medium"><?= ucwords($this->session->userdata('username'))?><?= nbs(3) ?><i class="fa fa-angle-down"></i></h5>
                                <span class="op-5 user-email"><?= ucwords($this->session->userdata('level')) ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="<?= base_url('c_login/logout') ?>"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- User Profile-->
                <!-- <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Data Debitur</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="index.html" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> All Debitur </span></a></li>
                        <li class="sidebar-item"><a href="index2.html" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Debitur Potensial </span></a></li>
                        <li class="sidebar-item"><a href="index3.html" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Debitur Non Potensial </span></a></li>
                    </ul> 
                </li>-->
                <?php if ($this->session->userdata('level') == 'manager'): ?>
                    <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/manager') ?>" aria-expanded="false"><i class="fas fa-location-arrow"></i><span class="hide-menu">Debitur Potensial</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('manager/callDebitur') ?>" aria-expanded="false"><i class="fas fa-phone"></i><span class="hide-menu">Call Debitur</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('manager/tindakanHukum') ?>" aria-expanded="false"><i class="fas fa-gavel"></i><span class="hide-menu">Tindakan Hukum</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('manager/eksekusi') ?>" aria-expanded="false"><i class="fas fa-lemon"></i><span class="hide-menu">Eksekusi Jaminan</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('manager/ots') ?>" aria-expanded="false"><i class="fas fa-street-view"></i><span class="hide-menu">OTS</span></a></li> -->
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-database"></i><span class="hide-menu">Kelolaan</span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="<?= base_url('manager/list_kelolaan') ?>" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> List Kelolaan </span></a></li>
                            <li class="sidebar-item"><a href="<?= base_url('manager/list_prioritas') ?>" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> List Prioritas </span></a></li>
                        </ul> 
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-universal-access"></i><span class="hide-menu">Kunjungan</span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="<?= base_url('kunjungan') ?>" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">History Kunjungan </span></a></li>
                            <li class="sidebar-item"><a href="<?= base_url('c_data/kunjungan_debitur/1') ?>" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Debitur Potensial </span></a></li>
                            <li class="sidebar-item"><a href="<?= base_url('c_data/kunjungan_debitur/2') ?>" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Debitur Non Potensial </span></a></li>
                        </ul> 
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('manager/lat_long') ?>" aria-expanded="false"><i class="fa fa-map"></i><span class="hide-menu">Lat Long</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('manager/on_the_spot') ?>" aria-expanded="false"><i class="fas fa-street-view"></i><span class="hide-menu">Validasi Data Agunan</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('manager/desk_col') ?>" aria-expanded="false"><i class="fas fa-inbox"></i><span class="hide-menu">Desk Collection</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('manager/tasklist') ?>" aria-expanded="false"><i class="fas fa-list-alt"></i><span class="hide-menu">Tasklist</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('manager/tindakanHukum') ?>" aria-expanded="false"><i class="fas fa-gavel"></i><span class="hide-menu">Tindakan Hukum</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('manager/eksekusi') ?>" aria-expanded="false"><i class="fas fa-lemon"></i><span class="hide-menu">Eksekusi Jaminan</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('manager/summary') ?>" aria-expanded="false"><i class="fas fa-table"></i><span class="hide-menu">Summary</span></a></li>
                <?php elseif($this->session->userdata('level') == 'operator') :?>
                    <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/operator') ?>" aria-expanded="false"><i class="fas fa-phone"></i><span class="hide-menu">Call Debitur</span></a></li> -->
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('manager/desk_col') ?>" aria-expanded="false"><i class="fas fa-inbox"></i><span class="hide-menu">Desk Collection</span></a></li>
                <?php elseif($this->session->userdata('level') == 'lawyer') :?>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/lawyer') ?>" aria-expanded="false"><i class="fas fa-gavel"></i><span class="hide-menu">Tindakan Hukum</span></a></li>
                <?php elseif($this->session->userdata('level') == 'managerSyariah') :?>
                    <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/managerSyariah') ?>" aria-expanded="false"><i class="fas fa-location-arrow"></i><span class="hide-menu">Debitur Potensial</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('managerSyariah/callDebitur') ?>" aria-expanded="false"><i class="fas fa-phone"></i><span class="hide-menu">Call Debitur</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('managerSyariah/tindakanHukum') ?>" aria-expanded="false"><i class="fas fa-gavel"></i><span class="hide-menu">Tindakan Hukum</span></a></li> -->
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Data Debitur</span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="<?= base_url('c_data/kunjungan_debitur/1/syariah') ?>" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Debitur Potensial </span></a></li>
                            <li class="sidebar-item"><a href="<?= base_url('c_data/kunjungan_debitur/2/syariah') ?>" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Debitur Non Potensial </span></a></li>
                        </ul> 
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('manager/desk_col/syariah') ?>" aria-expanded="false"><i class="fas fa-inbox"></i><span class="hide-menu">Desk Collection</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('manager/tindakanHukum/syariah') ?>" aria-expanded="false"><i class="fas fa-gavel"></i><span class="hide-menu">Tindakan Hukum</span></a></li>
                <?php elseif($this->session->userdata('level') == 'lawyerSyariah') :?>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/lawyer/syariah') ?>" aria-expanded="false"><i class="fas fa-gavel"></i><span class="hide-menu">Tindakan Hukum</span></a></li>
                <?php endif; ?>
                
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>