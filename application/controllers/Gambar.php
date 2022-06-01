<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gambar extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('GambarModel');
	}
	
	public function index(){
		$data['gambar'] = $this->GambarModel->view();
		$this->load->view('gambar/index', $data);
	}
	
	public function upload(){
		// lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
		$upload = $this->GambarModel->upload();
		
		if($upload['result'] == "success"){ // Jika proses upload sukses
			 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->GambarModel->save($upload);
			
			// Echo hasil dari proses dengan tanda pemisah <|>
			echo "SUCCESS<|>Gambar berhasil diupload<|>";
			echo $this->load->view('gambar/view', array('gambar'=>$this->GambarModel->view()), true); // Load view.php
		}else{ // Jika proses upload gagal
			// Echo hasil dari proses dengan tanda pemisah <|>
			echo "FAILED<|>".$upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
}
