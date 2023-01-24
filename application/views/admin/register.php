                <!-- Begin Page Content -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary">Pilih <?php echo $title; ?> yang Anda Inginkan</h6>
                        </div>
                        <div class="card-body">
                            <small>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item alert-light"><a href="#wpr" class="alert-link" data-toggle="collapse">Wajib Pajak dan Retribusi</a></li>
                                    <div id="wpr" class="collapse ml-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item alert-light"><a class="alert-link" href="<?php echo base_url('admin/daftarp/printRegister'); ?>">Wajib Pajak Daerah</a></li>
                                            <li class="list-group-item alert-light"><a class="alert-link" href="<?php echo base_url('admin/daftarr/printRegister'); ?>">Wajib Retribusi Daerah</a></li>
                                        </ul>
                                    </div>
                                    <li class="list-group-item alert-light"><a href="#skd" class="alert-link" data-toggle="collapse">Penetapan Pajak dan Reribusi</a> </li>
                                    <div id="skd" class="collapse ml-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item alert-light"><a class="alert-link" href="<?php echo base_url('admin/skpd/printRegister'); ?>">Surat Ketetapan Pajak Daerah (SKP-D)</a></li>
                                            <li class="list-group-item alert-light"><a class="alert-link" href="<?php echo base_url('admin/skrd/printRegister'); ?>">Surat Ketetapan Retribusi Daerah (SKRD)</a></li>
                                        </ul>
                                    </div>
                                    <li class="list-group-item alert-light"><a href="#ssd" class="alert-link" data-toggle="collapse">Setoran Pajak dan Retribusi</a></li>
                                    <div id="ssd" class="collapse ml-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item alert-light"><a class="alert-link" href="<?php echo base_url('admin/sspd/printRegister'); ?>">Surat Setoran Pajak Daerah (SSPD)</a></li>
                                            <li class="list-group-item alert-light"><a class="alert-link" href="<?php echo base_url('admin/ssrd/printRegister'); ?>">Surat Setoran Retribusi Daerah (SSRD)</a></li>
                                        </ul>
                                    </div>
                                    <li class="list-group-item alert-light"><a href="#std" class="alert-link" data-toggle="collapse">Tagihan/Teguran Pajak dan Retribusi</a></li>
                                    <div id="std" class="collapse ml-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item alert-light"><a class="alert-link" href="<?php echo base_url('admin/stpd/printRegister'); ?>">Tagihan Pajak Daerah (STPD)</a></li>
                                            <li class="list-group-item alert-light"><a class="alert-link" href="<?php echo base_url('admin/strd/printRegister'); ?>">Tagihan Retribusi Daerah (STRD)</a></li>
                                        </ul>
                                    </div>
                                    <li class="list-group-item alert-light"><a href="<?php echo base_url('admin/nsts/printRegister'); ?>" class="alert-link">Pendapatan Asli Daerah Lainnya</a></li>
                                    <li class="list-group-item alert-light"><a href="#rekap" class="alert-link" data-toggle="collapse">Rekapitulasi Pajak dan Retribusi</a></li>
                                    <div id="rekap" class="collapse ml-4">
                                        <ul class="list-group list-group-flush">
                                            <?php
                                            $obyek   = $this->db->query('select DISTINCT(obyek) FROM sspd UNION ALL select DISTINCT(obyek) FROM ssrd')->result_array();

                                            foreach ($obyek as $row) :
                                            ?>
                                                <li class="list-group-item alert-light"><a class="alert-link" href="<?php echo base_url('admin/register/print/' . base64_encode($row['obyek'])); ?>"><?= $row['obyek']; ?></a></li>
                                            <?php endforeach ?>
                                            <!-- <li class="list-group-item alert-light"><a class="alert-link" href="<?php //echo base_url('admin/stpd/printRegister'); 
                                                                                                                        ?>">Tagihan Pajak Daerah (STPD)</a></li>
                                            <li class="list-group-item alert-light"><a class="alert-link" href="<?php //echo base_url('admin/strd/printRegister'); 
                                                                                                                ?>">Tagihan Retribusi Daerah (STRD)</a></li> -->
                                        </ul>
                                    </div>
                                </ul>
                            </small>
                        </div>
                    </div>
                </div>
                </div>
                <!-- End of Main Content -->