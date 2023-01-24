    
    <body>
        <div class="container-fluid">
            <div class="table-responsive">
                <table width="100%" cellspacing="0">
                        <tr>
                            <td class="text-gray-900 text-center text-bold mb-1" rowspan="3" width="7%"><img src="<?php echo base_url().'assets/img/logo.png';?>" class="img-fluid ml-2.5" width="60px"></td>
                            <td class="text-gray-900" ><h1 class="h6 mb-0 text-gray-800 font-weight-bold ml-3 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?></b></h1></td> 
                        </tr>
                        <tr>
                            <td class="text-gray-900"> <h1 class="h5 mb-0 text-gray-800 ml-3 font-weight-bold text-center"><b><?php echo $title; ?></b></h1></td>  
                        </tr>
                        <tr>
                            <td class="text-gray-900 text-center"><?php echo 'Periode ' . $periode; ?></td>  
                        </tr>
                </table>
                <hr color="black" class="mt-2 mb-0"><br>
                <small>
                    <center>
                        <table width="60%" cellspacing="0" border="1" class="text-gray-900">
                            <thead class="text-center">
                                <th width="5%">Nomor</th>
                                <th>Uraian</th>
                                <th width="15%">Nilai <?php echo $this->session->userdata('tahun')?></th>
                            </thead>
                            <tbody>
                                <?php foreach($neraca as $data): ?>
                                    <tr>
                                        <td class="text-center <?php if($data->flag=="b"){ echo "font-weight-bold"; }?>"><?php echo $data->nomor; ?></td>
                                        <td class="<?php if($data->flag=="b"){ echo "font-weight-bold"; }?>"><?php echo $data->nama; ?></td>
                                        <td class="text-right"><?php if($data->nomor!="6" && $data->nomor!="8"){ echo number_format($data->debet,0,',','.'); } ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </center>
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