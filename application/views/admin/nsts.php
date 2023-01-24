                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <a class="btn btn-sm btn-success mb-1 btn-icon-split" href="<?php echo base_url('admin/nsts/addData/'); ?>"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Tambah Data</span></a>
                    <a class="btn btn-sm btn-primary mb-1 btn-icon-split" href="<?php echo base_url('admin/nsts/printRegister/'); ?>"><span class="icon text-white-50"><i class="fas fa-print"></i></span><span class="text">Register</span></a>
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
                                                <th class="text-center">No. STS</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Obyek</th>
                                                <th class="text-center">Keterangan</th>
                                                <th width="10%" class="text-center">Nilai</th>
                                                <th class="text-center">Rekening</th>
                                                <th width="10%" class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($sts as $nsts) : ?>
                                                <tr>
                                                    <td><?php echo $nsts->nosts; ?></td>
                                                    <td><?php echo date("d M Y", strtotime($nsts->tanggal)); ?></td>
                                                    <td><?php echo $nsts->obyek; ?></td>
                                                    <td><?php echo $nsts->keterangan; ?></td>
                                                    <td class="text-right"><?php echo number_format($nsts->nilai, 0, '.', ','); ?></td>
                                                    <td><?php echo $nsts->norek; ?></td>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-sm btn-circle btn-info" data-toggle="tooltip" data-placement="top" title="cetak STS" href="<?php echo base_url('admin/nsts/printData/' . str_replace('/', '_', $nsts->nosts)); ?>">
                                                                <i class="fas fa-print"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-circle btn-primary" data-toggle="tooltip" data-placement="top" title="edit data" href="<?php echo base_url('admin/nsts/editData/' . str_replace('/', '_', $nsts->nosts)); ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a onclick="konfirmasi('No. STS ','<?php echo $nsts->nosts; ?>','<?php echo base_url('admin/nsts/deleteData/' . str_replace('/', '_', $nsts->nosts)); ?>')" data-toggle="tooltip" data-placement="top" title="hapus data" class="btn btn-sm btn-circle btn-danger" href="#">
                                                                <i class="fas fa-trash"></i>
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
                </div>