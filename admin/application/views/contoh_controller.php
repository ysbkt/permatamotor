<?php

    public function DataKeluarga()
    {
        $content=array( 'title' => 'Data Keluarga | People Integrated system',
                        'data' => $this->M_datapribadi->show(),
                        'content' => 'pages/DataKaryawan/DataKeluarga');
        $this->load->view('layout/Wrapper', $content);


    }
    public function DataKeluargaDetails($nrk)
    {   
        $where=array('nrk'=>$nrk);
        $content=array( 'title' => 'Data Keluarga Details'.$nrk. 'People Integrated system',
                        'data' => $this->M_datapribadi->Edit_data($where, 'data_keluarga')->result(),
                        'data2' => $this->M_datapribadi->Edit_data($where, 'data_pribadi')->result(),
                        'content' => 'pages/DataKaryawan/DataKeluargaDetails');
        $this->load->view('layout/Wrapper2', $content);


    }
    public function EditDataKeluarga($id)
    {
        
        $data = $this->M_datapribadi->get_keluarga($id); 
        echo json_encode($data);
    }
    public function AddDataKeluarga()
    {
        $nama=$this->input->post('nama_keluarga');
        $nrk = $this->input->post('nrk');
        $nomor_bpjs = $this->input->post('nomor_bpjs');
        $hubungan = $this->input->post('hubungan_keluarga');
        $nik = $this->input->post('nik');
        $kelas = $this->input->post('kelas');
        $tanggal = $this->input->post('tanggal');
        $issued = $this->input->post('issued');        
        $faskes1 = $this->input->post('faskes1');
        $data=array(        'nrk'=>$nrk,
                            'nama'=>$nama,
                            'hubungan'=>$hubungan,
                            'nomor_bpjs'=>$nomor_bpjs,
                            'nik'=>$nik,
                            'kelas'=>$kelas,
                            'tanggal'=>$tanggal,
                            'issued'=>$issued,
                            'faskes1'=>$faskes1,
                            'faskes'=>'I',
                    );
        $this->M_datapribadi->input_datakeluarga($data);  
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Berhasil!</strong> Data berhasil di input.
</div>');
        echo json_encode(array("status" => TRUE));    
    }
     public function UpdateDataKeluarga()
    {
        $nama=$this->input->post('nama');
        $keluarga_id = $this->input->post('keluarga_id');
        $nomor_bpjs = $this->input->post('nomor_bpjs');
        $hubungan = $this->input->post('hubungan_keluarga');
        $nik = $this->input->post('nik');
        $kelas = $this->input->post('kelas');
        $tanggal = $this->input->post('tanggal');
        $issued = $this->input->post('issued');        
        $faskes1 = $this->input->post('faskes1');
        $where=array('keluarga_id'=>$keluarga_id);
        $data=array(        'nama'=>$nama,
                            'hubungan'=>$hubungan,
                            'nomor_bpjs'=>$nomor_bpjs,
                            'nik'=>$nik,
                            'kelas'=>$kelas,
                            'tanggal'=>$tanggal,
                            'issued'=>$issued,
                            'faskes1'=>$faskes1,
                            'faskes'=>'I',
                    );
        $this->M_datapribadi->update_data($where, $data, 'data_keluarga');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Berhasil!</strong> Data baru saja di Update.
</div>');
        echo json_encode(array("status" => TRUE));    
    }
   public function HapusDataKeluarga($id)
    {
        $table="data_keluarga";
        $where=array('keluarga_id'=>$id);
        $this->M_datapribadi->deleteData($where,$table);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Berhasil!</strong> Data baru saja di Hapus.
</div>');
        echo json_encode(array("status" => TRUE));
    }

    //--end of Data Keluarga--//
 ?>
