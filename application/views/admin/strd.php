                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!-- <a class="btn btn-sm btn-primary mb-1 btn-icon-split" href="<?php echo base_url('admin/strd/printRegister/'); ?>"><span class="icon text-white-50"><i class="fas fa-print"></i></span><span class="text">Register</span></a> -->
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
                                                <th class="text-center">No. SKRD</th>
                                                <th class="text-center">Ketetapan</th>
                                                <th class="text-center">Setoran</th>
                                                <th class="text-center">Kurang Bayar</th>
                                                <th class="text-center">No. Tagihan</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($strd as $wp) : ?>
                                                <tr>
                                                    <td><?php echo $wp->npwprd; ?></td>
                                                    <td><?php echo $wp->namausaha . ' / ' . $wp->namapemilik; ?></td>
                                                    <td><?php echo $wp->skrd; ?></td>
                                                    <td class="text-right"><?php echo number_format($wp->ketetapan, 0, ".", ","); ?></td>
                                                    <td class="text-right"><?php echo number_format($wp->nilai, 0, ".", ","); ?></td>
                                                    <td class="text-right"><?php echo number_format($wp->ketetapan - $wp->nilai, 0, ".", ","); ?></td>
                                                    <td><?php echo $wp->nostrd; ?></td>
                                                    <td>
                                                        <center>
                                                            <?php if (!is_null($wp->nostrd)) { ?>
                                                                <a class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" data-placement="top" title="cetak tagihan dan teguran" href="<?php echo base_url('admin/strd/printData/' . str_replace('/', '_', $wp->nostrd) . 'vs' . str_replace('/', '_', $wp->skrd)); ?>"><i class="fas fa-print"></i></a>
                                                            <?php }; ?>
                                                            <a class="btn btn-sm btn-circle btn-primary" data-toggle="tooltip" data-placement="top" title="<?php if (!is_null($wp->nostrd)) {
                                                                                                                                                                echo "edit data";
                                                                                                                                                            } else {
                                                                                                                                                                echo "tambah data";
                                                                                                                                                            }; ?>" href="<?php if (!is_null($wp->nostrd)) {
                                                                                                                                                                                                                                                            echo base_url('admin/strd/editData/' . str_replace('/', '_', $wp->nostrd . 'vs' . str_replace('/', '_', $wp->skrd)));
                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                            echo base_url('admin/strd/addData/' . str_replace('/', '_', $wp->skrd));
                                                                                                                                                                                                                                                        }; ?>"><i class="fas fa-edit"></i></a>
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