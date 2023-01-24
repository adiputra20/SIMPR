                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!-- <a class="btn btn-sm btn-primary mb-1 btn-icon-split" href="<?php echo base_url('admin/skpd/printRegister/'); ?>"><span class="icon text-white-50"><i class="fas fa-print"></i></span><span class="text">Register</span></a> -->
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
                                                <th class="text-center">NPWPD</th>
                                                <th class="text-center">Nama/Merk Usaha</th>
                                                <th class="text-center">No. Ketetapan (SKPD)</th>
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
                                                    <td><?php echo $wp->skpd; ?></td>
                                                    <!-- <td><?php echo $this->simprmodel->getBulan($wp->bulan); ?></td> -->
                                                    <td class="text-right"><?php if (!is_null($wp->ketetapan)) {
                                                                                echo number_format($wp->ketetapan, 0, '.', ',');
                                                                            };
                                                                            ?></td>
                                                    <td>
                                                        <center>
                                                            <?php if ($wp->skpd != "") { ?>
                                                                <a class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" data-placement="top" title="cetak SKPD" href="<?php echo base_url('admin/skpd/printData/' . base64_encode($wp->skpd)); ?>">
                                                                    <i class="fas fa-print"></i>
                                                                </a>
                                                            <?php }; ?>
                                                            <a class="btn btn-sm btn-circle btn-primary" data-toggle="tooltip" data-placement="top" title="<?php if (!is_null($wp->ketetapan)) {
                                                                                                                                                                echo "edit SKPD";
                                                                                                                                                            } else {
                                                                                                                                                                echo "input SKPD";
                                                                                                                                                            }; ?>" href="<?php if (is_null($wp->ketetapan)) {
                                                                                                                                                                                echo base_url('admin/skpd/addData/' . base64_encode($wp->npwprd));
                                                                                                                                                                            } else {
                                                                                                                                                                                echo base_url('admin/skpd/editdata/' . base64_encode($wp->skpd));
                                                                                                                                                                            } ?>">
                                                                <i class="fas  <?php if (!is_null($wp->ketetapan)) {
                                                                                    echo "fa-edit";
                                                                                } else {
                                                                                    echo "fa-plus";
                                                                                }; ?>"></i>
                                                            </a>
                                                            <?php if ($wp->skpd != "") { ?>
                                                                <a onclick="konfirmasi('SKPD pada','<?php echo $wp->skpd; ?>','<?php echo base_url('admin/skpd/deleteData/' . $wp->npwprd); ?>')" class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" data-placement="top" title="hapus SKPD" href="#">
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