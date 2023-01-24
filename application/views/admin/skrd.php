                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!-- <a class="btn btn-sm btn-primary mb-1 btn-icon-split" href="<?php echo base_url('admin/skrd/printRegister/'); ?>"><span class="icon text-white-50"><i class="fas fa-print"></i></span><span class="text">Register</span></a> -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <small>
                                    <table class="table table-bordered table-hover table-sm" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NPWRD</th>
                                                <th class="text-center">Nama/Merk Usaha</th>
                                                <th class="text-center">No. Ketetapan (SKRD)</th>
                                                <!-- <th>Bulan</th> -->
                                                <th class="text-center">Besar Ketetapan</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($skpd as $wp) : ?>
                                                <tr>
                                                    <td><?php echo $wp->npwprd; ?></td>
                                                    <td><?php echo $wp->namausaha . ' / ' . $wp->namapemilik; ?></td>
                                                    <td><?php echo $wp->skrd; ?></td>
                                                    <!-- <td><?php echo $this->simprmodel->getBulan($wp->bulan); ?></td> -->
                                                    <td class="text-right"><?php if (!is_null($wp->ketetapan)) {
                                                                                echo number_format($wp->ketetapan, 0, '.', ',');
                                                                            };
                                                                            ?></td>
                                                    <td>
                                                        <center>
                                                            <?php if ($wp->skrd != "") { ?>
                                                                <a class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" data-placement="top" title="cetak SKRD" href="<?php echo base_url('admin/skrd/printData/' . base64_encode($wp->skrd)); ?>">
                                                                    <i class="fas fa-print"></i>
                                                                </a>
                                                            <?php }; ?>
                                                            <a class="btn btn-sm btn-circle btn-primary" data-toggle="tooltip" data-placement="top" title="<?php if (!is_null($wp->ketetapan)) {
                                                                                                                                                                echo "edit SKRD";
                                                                                                                                                            } else {
                                                                                                                                                                echo "input SKRD";
                                                                                                                                                            }; ?>" href="<?php if (is_null($wp->ketetapan)) {
                                                                                                                                                                                echo base_url('admin/skrd/addData/' . base64_encode($wp->npwprd));
                                                                                                                                                                            } else {
                                                                                                                                                                                echo base_url('admin/skrd/editData/' . base64_encode($wp->skrd));
                                                                                                                                                                            } ?>">
                                                                <i class="<?php if (!is_null($wp->ketetapan)) {
                                                                                echo "fas fa-edit";
                                                                            } else {
                                                                                echo "fas fa-plus";
                                                                            }; ?>"></i>
                                                            </a>
                                                            <?php if ($wp->skrd != "") { ?>
                                                                <a onclick="konfirmasi('SKRD pada ','<?php echo $wp->skrd; ?>','<?php echo base_url('admin/skrd/deleteData/' . $wp->npwprd); ?>') " class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" data-placement="top" title="hapus SKRD" href="#">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            <?php }; ?>
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->