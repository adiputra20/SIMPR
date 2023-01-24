<!-- Begin Page Content -->
<small>
    <div class="container-fluid">
        <?php
        if (isset($_GET['obyek'])) {
            $obyek        = $_GET['obyek'];

            $keterangan   = $_GET['obyek'];
        } else {
            $obyek        = "";

            $keterangan   = "";
        };
        ?>
        <div class="card shadow mb-1">
            <div class="card-header py-3">
                <span class="m-0 font-weight-bold text-secondary">Pilih <?php echo $title; ?> yang Anda Inginkan</span>
            </div>
            <div class="card-body">
                <form class="form-inline">
                    <div class="form-group mb-0">
                        <label class="col-form-label col-form-label-sm sm mb-2 mr-sm-2" for="inlineFormInputName2">Pilih Rekening :&nbsp;</label>
                        <select name="obyek" id="obyek" class="form-control form-control-sm sm mb-2 mr-sm-2" required>
                            <option selected disable value="">Pilih Rekening...</option>
                            <?php foreach ($rek as $kode) : ?>
                                <option value="<?php echo $kode->obyek; ?>" <?= $kode->obyek == $obyek ? "selected" : null ?>><?php echo $kode->obyek; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Rekening Wajib Diisi!!!</div>
                        <button type="submit" class="btn btn-sm btn-info btn-icon-split mb-2 mr-sm-2"><span class="icon text-white-50"><i class="fas fa-eye"></i></span><span class="text">Tampilkan</span></button>
                        <a href="<?php echo base_url('admin/piutang/printData/?obyek=' . $_GET['obyek']); ?>" target="_blank" class="btn btn-sm btn-success btn-icon-split mb-2 mr-sm-2"><span class="icon text-white-50"><i class="fas fa-print"></i></span><span class="text">&nbsp;&nbsp;&nbsp;&nbsp;Cetak&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
                    </div>
                </form>
            </div> <!-- /.Card Body -->
        </div> <!-- Card -->
        <div class="alert alert-sm alert-info">
            Menampilkan Piutang <span class="font-weight-bold"><?php echo $keterangan; ?></span>
        </div>
        <table class="table table-bordered table-hover table-sm" cellspacing="0" width="100%" id="example">
            <thead>
                <th class="text-center">No.</th>
                <th class="text-center">NPWPD</th>
                <th class="text-center">Nama Usaha</th>
                <th class="text-center">No. Ketetapan</th>
                <th class="text-center">Jatuh Tempo</th>
                <th class="text-center">Ketetapan</th>
                <th class="text-center">Setoran</th>
                <th class="text-center">Jml. Piutang</th>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $saldok = 0;
                $saldos = 0;
                $saldop = 0;
                foreach ($piutang as $data) :
                    $saldok += $data->ketetapan;
                    $saldos += $data->setoran;
                    $saldop += ($data->ketetapan - $data->setoran);
                ?>
                    <tr>
                        <td class="text-center" width="3%"><?php echo $i++; ?></td>
                        <td><?php echo $data->npwpd; ?></td>
                        <td><?php echo $data->namausaha; ?></td>
                        <td><?php echo $data->sk; ?></td>
                        <td width="8%"><?php echo date("d-m-Y", strtotime($data->tanggal)); ?></td>
                        <td class="text-right" width="10%"><?php echo number_format($data->ketetapan, 0, '.', ','); ?></td>
                        <td class="text-right" width="10%"><?php echo number_format($data->setoran, 0, '.', ','); ?></td>
                        <td class="text-right" width="10%"><?php echo number_format($data->ketetapan - $data->setoran, 0, '.', ','); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="font-weight-bold">
                    <td class="text-right" colspan="5">Total</td>
                    <td class="text-right" width="10%"><?php echo number_format($saldok, 0, ',', '.'); ?></td>
                    <td class="text-right" width="10%"><?php echo number_format($saldos, 0, ',', '.'); ?></td>
                    <td class="text-right" width="10%"><?php echo number_format($saldop, 0, ',', '.'); ?></td>
                </tr>
            </tfoot>
        </table>
    </div> <!-- container fluid -->
</small>
</div> <!-- End of Main Content -->