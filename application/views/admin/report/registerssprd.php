    
    <body>
        <div class="container-fluid">
            <div class="table-responsive">
                <table width="100%" cellspacing="0">
                        <tr>
                            <td class="text-gray-900 text-center text-bold mb-1" rowspan="2" width="7%"><img src="<?php echo base_url().'assets/img/logo.png';?>" class="img-fluid ml-2.5" width="60px"></td>
                            <td class="text-gray-900" colspan="3="> <p class="h6 mb-0 text-gray-900 ml-3 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?></b></p></td> 
                        </tr>
                        <tr>
                            <td class="text-gray-900" colspan="3="> <p class="h5 mb-0 text-gray-900 ml-3 text-center">BADAN PENDAPATAN DAERAH</p></td>  
                        </tr>
                </table>
                <hr color="black" class="sidebar-divider text-gray-100 mt-2">
                <center>
                    <h6 style="font-size:15px" for="nomor" class="text-gray-900 mb-0">REGISTER <?php echo $jenis ?></h5>
                    <h6 style="font-size:15px" for="nomor" class="text-gray-900">TAHUN ANGGARAN <?php echo $this->session->userdata('tahun'); ?></h5>
                </center>
                <div class="table-responsive">
                <small>
                    <table color="black" class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-bold text-gray-900">
                                <th class="text-center">No. Setoran</th>
                                <th class="text-center" width="9%">Tanggal</th>
                                <th class="text-center">Nama Usaha</th>
                                <th class="text-center">Obyek Pajak</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center" width="9%">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total=0; foreach($ssprd as $wp): $total+=$wp->nilai; ?>
                                <tr class="text-gray-900">
                                    <td><?php echo $wp->sspd; ?></td>
                                    <td><?php echo date("d-m-Y",strtotime($wp->tanggal)); ?></td>
                                    <td><?php echo $wp->namausaha; ?></td>
                                    <td><?php echo $wp->obyek; ?></td>
                                    <td><?php echo $wp->keterangan; ?></td>
                                    <td class="text-right"><?php echo number_format($wp->nilai,0,',','.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="text-gray-900 font-weight-bold">
                                <td class="text-right" colspan="5">Total</td>
                                <td class="text-right"><?php echo number_format($total,0,',','.'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" cellspacing="0" class="text-gray-900">
                        <tr>
                            <td></td><td class="text-center" colspan="3=" width="40%"><?php foreach ($pemda as $client){ echo $client->ibu_kota.", ".date("d F Y"); }; ?></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-center" colspan="3=">KEPALA BADAN PENDAPATAN DAERAH<br><br><br><br><br><br></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-center" colspan="3="><?php foreach ($pemda as $client){ echo $client->nama_kaban; }; ?></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-center" colspan="3="><?php foreach ($pemda as $client){ echo $client->pangkat; }; ?></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-center" colspan="3="><?php foreach ($pemda as $client){ echo "NIP. ".$client->nip_kaban; }; ?><br><br></td> 
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