                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <a class="btn btn-sm btn-primary mb-1 btn-icon-split" href="<?php echo base_url($kembali); ?>"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span><span class="text">Kembali</span></a>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title.' '.base64_decode($skpd); ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <small>
                                    <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No. Setoran</th>
                                                <th class="text-center">Obyek Pajak</th>
                                                <th class="text-center">Nilai</th>
                                                <th class="text-center">Keterangan</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($ssprd as $wp): ?>
                                                <tr>
                                                    <td><?php echo $wp->sspd; ?></td>
                                                    <td><?php echo $wp->obyek; ?></td>
                                                    <td class="text-right"><?php echo number_format($wp->nilai,0,',','.'); ?></td>
                                                    <td><?php echo $wp->keterangan; ?></td>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" data-placement="top" title="cetak <?php echo strtoupper($jenis); ?>" href="<?php echo base_url('admin/'.$jenis.'/printData/'.base64_encode($wp->sspd)); ?>">
                                                                <i class="fas fa-print"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-circle btn-primary"  data-toggle="tooltip" data-placement="top" title="edit <?php echo strtoupper($jenis); ?>" href="<?php echo base_url('admin/'.$jenis.'/editData/'.base64_encode($wp->sspd)).'/'.$skpd; ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </a>                                                        
                                                            <a onclick="konfirmasi('<?php echo strtoupper($jenis); ?> pada','<?php echo $wp->sspd; ?>','<?php  echo base_url('admin/'.$jenis.'/deleteData/'.base64_encode($wp->sspd).'/'.$skpd); ?>')" class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" data-placement="top" title="hapus <?php echo strtoupper($jenis); ?>" href="#">
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            