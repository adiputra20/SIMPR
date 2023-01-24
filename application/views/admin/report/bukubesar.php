    <body>
        <div class="container-fluid">
            <div class="table-responsive">
                <table width="100%" cellspacing="0">
                    <tr>
                        <td class="text-gray-900 text-center text-bold mb-1" rowspan="2" width="7%"><img src="<?php echo base_url() . 'assets/img/logo.png'; ?>" class="img-fluid ml-2.5" width="60px"></td>
                        <td class="text-gray-900" colspan="3=">
                            <p class="h5 mb-0 text-gray-900 ml-3 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client) {
                                                                                                echo $client->Nama_Pemda;
                                                                                            }; ?></b></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-gray-900" colspan="3=">
                            <p class="h4 mb-0 text-gray-900 ml-3 text-center">BADAN PENDAPATAN DAERAH</p>
                        </td>
                    </tr>
                </table>
                <hr color="black" class="sidebar-divider text-gray-100 mt-2">
                <center>
                    <h5 style="font-size:15px" for="nomor" class="text-gray-900 mb-0"><?php echo $jenis ?></h5>
                    <h5 style="font-size:15px" for="nomor" class="text-gray-900">TAHUN ANGGARAN <?php echo $this->session->userdata('tahun'); ?></h5>
                </center>
                <div class="table-responsive">
                    <small>
                        <?php foreach ($rekening as $rek) : ?>
                            <table width="100%" cellspacing="0" class="text-gray-900">
                                <tr>
                                    <td width="10%"><br>Kode Rekening</td>
                                    <td width="1%"><br>:</td>
                                    <td><br><?php echo $rek->kodelra; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Rekening</td>
                                    <td>:</td>
                                    <td><?php echo $rek->namalra; ?></td>
                                </tr>
                                <tr>
                                    <td>Periode</td>
                                    <td>:</td>
                                    <td><?php echo $periode; ?></td>
                                </tr>
                            </table>
                        <?php endforeach; ?>
                        <table width="100%" cellspacing="0" class="text-gray-900" border="1">
                            <tr>
                                <td class="text-center"><small>No.</small></td>
                                <td class="text-center"><small>Tanggal</small></td>
                                <td class="text-center"><small>Ref.</small></td>
                                <td class="text-center"><small>Keterangan</small></td>
                                <td class="text-center"><small>Debet</small></td>
                                <td class="text-center"><small>Kredit</small></td>
                                <td class="text-center"><small>Saldo</small></td>
                            </tr>
                            <?php $saldo = 0;
                            $i = 1;
                            foreach ($bukubesar as $data) : $saldo += $data->nilai; ?>
                                <tr>
                                    <td class="text-center" width="3%"><small><?php echo $i++; ?></small></td>
                                    <td width="8%"><small><?php echo date("d-m-Y", strtotime($data->tanggal)); ?></small></td>
                                    <td width="12%"><small><?php echo $data->uraian; ?></small></td>
                                    <td><small><?php echo $data->keterangan; ?></small></td>
                                    <td class="text-right" width="10%"><small><?php echo '0'; ?></small></td>
                                    <td class="text-right" width="10%"><small><?php echo number_format($data->nilai, 2, ',', '.'); ?></small></td>
                                    <td class="text-right" width="10%"><small><?php echo number_format($saldo, 2, ',', '.'); ?></small></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <br>
                        <table width="100%" cellspacing="0" class="text-gray-900">
                            <tr>
                                <td></td>
                                <td class="text-center" colspan="3=" width="40%"><?php foreach ($pemda as $client) {
                                                                                        echo $client->ibu_kota . ", " . date("d F Y");
                                                                                    }; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-center" colspan="3=">KEPALA BADAN PENDAPATAN DAERAH<br><br><br><br><br><br></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-center" colspan="3="><?php foreach ($pemda as $client) {
                                                                            echo $client->nama_kaban;
                                                                        }; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-center" colspan="3="><?php foreach ($pemda as $client) {
                                                                            echo $client->pangkat;
                                                                        }; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-center" colspan="3="><?php foreach ($pemda as $client) {
                                                                            echo "NIP. " . $client->nip_kaban;
                                                                        }; ?><br><br></td>
                            </tr>
                        </table>
                    </small>
                </div>
            </div>
    </body>
    <script>
        window.print();
        /* window.onafterprint = back;

        function back() {
            window.history.back();
        } */
    </script>

    </html>