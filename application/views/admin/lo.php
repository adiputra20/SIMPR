                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="btn btn-sm btn-info mb-1 btn-icon-split ml-auto" href="<?php echo base_url('admin/lo/printData/'); ?>" target="_blank"><span class="icon text-white-50"><i class="fas fa-print"></i></span><span class="text"><?php echo $title; ?></span></a>
                        </div>
                        <div class="card-body">
                            <small>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="9%">Kode</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center"width="9%">Realisasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($lra as $data): ?>
                                                <tr>
                                                    <td><?php echo $data->kode; ?></td>
                                                    <td><?php echo $data->nama; ?></td>
                                                    <td class="text-right"><?php echo number_format($data->nilai,0,',','.'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </small>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            