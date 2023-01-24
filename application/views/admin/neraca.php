                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <a class="btn btn-sm btn-info mb-1 btn-icon-split ml-auto" href="<?php echo base_url('admin/neraca/printData/'); ?>" target="_blank"><span class="icon text-white-50"><i class="fas fa-print"></i></span><span class="text"><?php echo $title; ?></span></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <small>
                                    <table class="table table-bordered table-striped table-sm" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="2%">No.</th>
                                                <th class="text-center">Uraian</th>
                                                <th class="text-center" width="20%">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($neraca as $rek): ?>
                                                <tr>
                                                    <td <?php if($rek->flag=="b"){ ?> class="font-weight-bold" <?php } ?>><?php echo $rek->nomor; ?></td>
                                                    <td <?php if($rek->flag=="b"){ ?> class="font-weight-bold" <?php } ?>><?php echo $rek->nama; ?></td>
                                                    <td <?php if($rek->flag=="b"){ ?> class="font-weight-bold text-right" <?php } ?> class="text-right"><?php if($rek->nomor!='6' && $rek->nomor!='8') { echo number_format($rek->debet,0,',','.'); } ?></td>
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

            