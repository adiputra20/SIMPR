                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!-- <a class="btn btn-sm btn-primary mb-1 btn-icon-split" href="<?php echo base_url('admin/sspd/printRegister/'); ?>"><span class="icon text-white-50"><i class="fas fa-print"></i></span><span class="text">Register</span></a> -->
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
                                                <th class="text-center">No. SKPD</th>
                                                <th class="text-center">Ketetapan</th>
                                                <th class="text-center">Setoran</th>
                                                <th class="text-center">Kurang Bayar</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($skpd as $wp) : ?>
                                                <tr>
                                                    <td><?php echo $wp->npwprd; ?></td>
                                                    <td><?php echo $wp->namausaha . ' / ' . $wp->namapemilik; ?></td>
                                                    <td><?php echo $wp->skpd; ?></td>
                                                    <td class="text-right"><?php echo number_format($wp->ketetapan, 0, ".", ","); ?></td>
                                                    <td class="text-right"><?php echo number_format($wp->nilai, 0, ".", ","); ?></td>
                                                    <td class="text-right"><?php echo number_format($wp->ketetapan - $wp->nilai, 0, ".", ","); ?></td>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-sm btn-circle btn-primary" data-toggle="tooltip" data-placement="top" title="<?php if ($wp->ketetapan - $wp->nilai != 0) {
                                                                                                                                                                echo "tambah SSPD";
                                                                                                                                                            } else {
                                                                                                                                                                echo "LUNAS";
                                                                                                                                                            } ?>" href="<?php if ($wp->ketetapan - $wp->nilai != 0) {
                                                                                                                                                                            echo base_url('admin/sspd/addData/' . base64_encode($wp->npwprd));
                                                                                                                                                                        } else {
                                                                                                                                                                            echo "#";
                                                                                                                                                                        } ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <?php if ($wp->nilai != 0) { ?>
                                                                <a class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" data-placement="top" title="detail SSPD" href="<?php echo base_url('admin/sspd/infoData/' . base64_encode($wp->skpd)); ?>">
                                                                    <i class="fas fa-info"></i>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" data-placement="top" title="data Kosong" href="#">
                                                                    <i class="fas fa-info"></i>
                                                                </a>
                                                            <?php }; ?>
                                                            <a class="btn btn-sm btn-circle 
                                                                    <?php if ($wp->ketetapan - $wp->nilai != 0) {
                                                                        echo "btn-warning";
                                                                    } else {
                                                                        echo "btn-primary";
                                                                    } ?>" data-toggle="tooltip" data-placement="top" title="<?php if ($wp->ketetapan - $wp->nilai != 0) {
                                                                                                                                echo "cetak blanko";
                                                                                                                            } else {
                                                                                                                                echo "LUNAS";
                                                                                                                            } ?>" href="<?php if ($wp->ketetapan - $wp->nilai != 0) {
                                                                                                                                            echo base_url('admin/sspd/printBlanko/' . str_replace("/", "_", $wp->skpd));
                                                                                                                                        } else {
                                                                                                                                            echo '#';
                                                                                                                                        } ?>">
                                                                <i class="fas fa-print"></i>
                                                            </a>
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