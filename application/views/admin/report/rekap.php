    <body>
        <div class="container-fluid">
            <div class="table-responsive">
                <table width="100%" cellspacing="0">
                    <tr>
                        <td class="text-gray-900 text-center text-bold mb-1" rowspan="2" width="7%"><img src="<?php echo base_url() . 'assets/img/logo.png'; ?>" class="img-fluid ml-2.5" width="60px"></td>
                        <td class="text-gray-900" colspan="3=">
                            <p class="h6 mb-0 text-gray-900 ml-3 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client) {
                                                                                                echo $client->Nama_Pemda;
                                                                                            }; ?></b></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-gray-900" colspan="3=">
                            <p class="h5 mb-0 text-gray-900 ml-3 text-center">BADAN PENDAPATAN DAERAH</p>
                        </td>
                    </tr>
                </table>
                <hr color="black" class="sidebar-divider text-gray-100 mt-2">
                <center>
                    <h6 style="font-size:15px" for="nomor" class="text-gray-900 mb-0"><?php echo $title ?></h5>
                        <h6 style="font-size:15px" for="nomor" class="text-gray-900">TAHUN ANGGARAN <?php echo $this->session->userdata('tahun'); ?></h5>
                </center>
                <div class="table-responsive">
                    <small>
                        <table color="black" class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-bold text-gray-900">
                                    <th class="text-center" width="3%">No.</th>
                                    <th class="text-center" width="10%">NPWPD</th>
                                    <th class="text-center">Nama Usaha</th>
                                    <th class="text-center" width="10%">Ketetapan</th>
                                    <th class="text-center" width="10%">Setoran</th>
                                    <th class="text-center" width="10%">Piutang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i      = 1;
                                $totalk = 0;
                                $totals = 0;
                                $totalp = 0;
                                foreach ($nrekap as $wp) :
                                    $totalk += $wp->ketetapan;
                                    $totals += $wp->setoran;
                                    $totalp += ($wp->ketetapan - $wp->setoran);
                                ?>
                                    <tr class="text-gray-900">
                                        <td class="text-center"><?php echo $i++; ?></td>
                                        <td><?php echo $wp->npwprd; ?></td>
                                        <td><?php echo $wp->nama; ?></td>
                                        <td class="text-right"><?php echo number_format($wp->ketetapan, 0, ',', '.'); ?></td>
                                        <td class="text-right"><?php echo number_format($wp->setoran, 0, ',', '.'); ?></td>
                                        <td class="text-right"><?php echo number_format($wp->ketetapan - $wp->setoran, 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="text-gray-900 font-weight-bold">
                                    <td class="text-right" colspan="3">Total</td>
                                    <td class="text-right"><?php echo number_format($totalk, 0, ',', '.'); ?></td>
                                    <td class="text-right"><?php echo number_format($totals, 0, ',', '.'); ?></td>
                                    <td class="text-right"><?php echo number_format($totalp, 0, ',', '.'); ?></td>
                                </tr>
                            </tbody>
                        </table>
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
        </div>
    </body>
    <script>
        window.print();
        window.onafterprint = back;

        function back() {
            window.history.back();
        }
    </script>

    </html>