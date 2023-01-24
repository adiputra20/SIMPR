    
    <body>
        <div class="container-fluid">
            <div class="table-responsive">
                <table width="100%" cellspacing="0">
                        <tr>
                            <td class="text-gray-900 text-center text-bold mb-1" rowspan="2" width="7%"><img src="<?php echo base_url().'assets/img/logo.png';?>" class="img-fluid ml-2.5" width="60px"></td>
                            <td class="text-gray-900" colspan="3="> <p class="h5 mb-0 text-gray-900 ml-3 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?></b></p></td> 
                        </tr>
                        <tr>
                            <td class="text-gray-900" colspan="3="> <p class="h4 mb-0 text-gray-900 ml-3 text-center">BADAN PENDAPATAN DAERAH</p></td>  
                        </tr>
                </table>
                <hr color="black" class="sidebar-divider text-gray-100 mt-2">
                <center>
                    <h5 style="font-size:15px" for="nomor" class="text-gray-900 mb-0">REGISTER <?php echo strtoupper($jenis) ?></h5>
                    <h5 style="font-size:15px" for="nomor" class="text-gray-900">TAHUN ANGGARAN <?php echo $this->session->userdata('tahun'); ?></h5>
                </center>
                <div class="table-responsive">
                <small>
                    <table color="black" class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-bold text-gray-900">
                                <th class="text-center">No.</th>
                                <th class="text-center">No. Surat</th>
                                <th class="text-center">Tgl. Surat</th>
                                <th class="text-center">NPWP</th>
                                <th class="text-center">Nama Pemilik/Perusashaan</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Jenis Usaha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total=0; $i=0; foreach($fiskal as $wp): $i++; ?>
                                <tr class="text-gray-900">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $wp->nomorfiskal; ?></td>
                                    <td><?php echo date("d-m-Y",strtotime($wp->tanggalcetak)); ?></td>
                                    <td><?php echo $wp->npwp; ?></td>
                                    <td><?php echo $wp->namapemilik.' / '.$wp->namausaha; ?></td>
                                    <td><?php echo $wp->alamat; ?></td>
                                    <td><?php echo $wp->jenisusaha; ?></td>                                    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <table width="100%" cellspacing="0">
                        <tr>
                            <td></td><td class="text-gray-900" colspan="3=" width="40%"> <p class="h6 mb-0 text-gray-900 ml-3 text-center"><?php foreach ($pemda as $client){ echo $client->ibu_kota.", ".date("d F Y"); }; ?></p></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-gray-900" colspan="3="> <p class="h6 mb-0 text-gray-900 ml-3 text-center">KEPALA BADAN PENDAPATAN DAERAH</p></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-gray-900" colspan="3="> <p class="h6 mb-0 text-gray-900 ml-3 text-center"><?php foreach ($pemda as $client){ echo $client->nama_kaban; }; ?><br><br><br><br><br><br></p></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-gray-900" colspan="3="> <p class="h6 mb-0 text-gray-900 ml-3 text-center"><?php foreach ($pemda as $client){ echo $client->pangkat; }; ?></p></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-gray-900" colspan="3="> <p class="h6 mb-0 text-gray-900 ml-3 text-center"><?php foreach ($pemda as $client){ echo "NIP. ".$client->nip_kaban; }; ?><br><br></p></td> 
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