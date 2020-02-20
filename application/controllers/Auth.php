<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
        parent::__construct();
        // if (!$this->session->userdata('idDosen')) {
        // 	# code...
        // 	redirect('auth/logout');
        // }
        $this->load->library('pagination');
        $this->load->model('m_user');
        $this->load->model('bagianmodel');
        $this->load->model('bag1model');
        $this->model = $this->m_user;

        $this->load->library('session');
        $this->load->helper('form','url');
        $this->load->helper(array('url','download'));
    }

	public function index()
	{
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
 
        $this->form_validation->set_rules('nip', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('login');
        }
        else
        {
            echo 'validasi sukses!';
        }
	}

	public function listKota(){
	    // Ambil data ID Provinsi yang dikirim via ajax post    
	    $id_provinsi = $this->input->post('idBagian');        
	    $kota = $this->Bag1Model->viewByProvinsi($idBagian);        
      	// Buat variabel untuk menampung tag-tag option nya    
	    // Set defaultnya dengan tag option Pilih    
	    $lists = "<option value=''>Pilih</option>";        
	    foreach($kota as $data){      
	      	$lists .= "<option value='".$data->idBag1."'>".$data->namaBag1."</option>"; 
	      	// Tambahkan tag option ke variabel $lists    
	    }        
	    $callback = array('list_kota'=>$lists); 
	    // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota    
	    echo json_encode($callback); 
	    // konversi varibael $callback menjadi JSON  
	}
//LOGIN PROSES
	public function proses(){
 
        $this->form_validation->set_rules('nip', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('login');
        }
        else
        {
			if (isset($_POST['btn_login'])){
				$this->model->idDosen = $_POST['nip'];
	            $this->model->penguna_sandi =$_POST['password'];
	            $where=array(
				'userName'=>$_POST['nip'],
				'pass'=>$_POST['password']
				
				);
	            if ($this->model->hakAkses() == true){
	            	
	            	$this->db->select('*');
					$this->db->from('tbdosen');
					$this->db->where($where);
					$q = $this->db->get();
					$d = $q->result();
					foreach ($d as $row) {
							$us = array('idDosen'=>$row->idDosen,
								'nidn'=>$row->nidn,
								'nama'=>$row->nama,
								'bagian'=>$row->pengguna,
								'prodi'=>$row->prodi,
								'jafa'=>$row->jafa,
								'pass'=>$row->pass
								);
							$bagian1 = $row->pengguna;
							$_SESSION['namauser']=$row->nama;

					}
					$this->load->model("m_user");
					$this->session->set_userdata($us);
					$data['hak'] = $this->m_user->hakAkses();
					if ($bagian1 == 'User') {
						redirect('auth/loadDashboard');		
					}else{
						// informasi Jafa
						if (isset($_POST['q'])) {
							if ($this->input->post('cari') == null) {
								$tahun = getdate();
					        	$now = $tahun['year'];
								$data['tahun'] = $now;
							}else{
								$data['tahun'] = $this->input->post('cari');
								// se session userdata untuk pencarian, untuk paging pencarian
								// $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
							}
						}
						else {
							$tahun = getdate();
				        	$now = $tahun['year'];
							$data['tahun'] = $now;
						}
						$data['penun'] = $this->m_user->sumPenunjang();
						$data['penel'] = $this->m_user->sumPenelitian();
						$data['pengab'] = $this->m_user->sumPengabdian();
						$data['pend'] = $this->m_user->sumPendidikan();
						$data['tPenun'] = $this->m_user->totalPenunjang($data['tahun']);
						$data['tPenel'] = $this->m_user->totalPenelitian($data['tahun']);
						$data['tPengab'] = $this->m_user->totalPengabdian($data['tahun']);
						$data['tPend'] = $this->m_user->totalPendidikan($data['tahun']);
						$data['tPenun2'] 	= $this->m_user->totalPenunjang2($data['tahun']);
						$data['tPenel2'] 	= $this->m_user->totalPenelitian2($data['tahun']);
						$data['tPengab2'] 	= $this->m_user->totalPengabdian2($data['tahun']);
						$data['tPend2'] 	= $this->m_user->totalPendidikan2($data['tahun']);
						$data['tPenun3'] 	= $this->m_user->totalPenunjang3($data['tahun']);
						$data['tPenel3'] 	= $this->m_user->totalPenelitian3($data['tahun']);
						$data['tPengab3'] 	= $this->m_user->totalPengabdian3($data['tahun']);
						$data['tPend3'] 	= $this->m_user->totalPendidikan3($data['tahun']);
						$data['tPenun4'] 	= $this->m_user->totalPenunjang4($data['tahun']);
						$data['tPenel4'] 	= $this->m_user->totalPenelitian4($data['tahun']);
						$data['tPengab4'] 	= $this->m_user->totalPengabdian4($data['tahun']);
						$data['tPend4'] 	= $this->m_user->totalPendidikan4($data['tahun']);
						$data['tPenun5'] 	= $this->m_user->totalPenunjang5($data['tahun']);
						$data['tPenel5'] 	= $this->m_user->totalPenelitian5($data['tahun']);
						$data['tPengab5'] 	= $this->m_user->totalPengabdian5($data['tahun']);
						$data['tPend5'] 	= $this->m_user->totalPendidikan5($data['tahun']);
						$data['tPenun6'] 	= $this->m_user->totalPenunjang6($data['tahun']);
						$data['tPenel6'] 	= $this->m_user->totalPenelitian6($data['tahun']);
						$data['tPengab6'] 	= $this->m_user->totalPengabdian6($data['tahun']);
						$data['tPend6'] 	= $this->m_user->totalPendidikan6($data['tahun']);
						$data['tPenun7'] 	= $this->m_user->totalPenunjang7($data['tahun']);
						$data['tPenel7'] 	= $this->m_user->totalPenelitian7($data['tahun']);
						$data['tPengab7'] 	= $this->m_user->totalPengabdian7($data['tahun']);
						$data['tPend7'] 	= $this->m_user->totalPendidikan7($data['tahun']);
						$data['tPenun8'] 	= $this->m_user->totalPenunjang8($data['tahun']);
						$data['tPenel8'] 	= $this->m_user->totalPenelitian8($data['tahun']);
						$data['tPengab8'] 	= $this->m_user->totalPengabdian8($data['tahun']);
						$data['tPend8'] 	= $this->m_user->totalPendidikan8($data['tahun']);
						$data['tPenun9'] 	= $this->m_user->totalPenunjang9($data['tahun']);
						$data['tPenel9'] 	= $this->m_user->totalPenelitian9($data['tahun']);
						$data['tPengab9'] 	= $this->m_user->totalPengabdian9($data['tahun']);
						$data['tPend9'] 	= $this->m_user->totalPendidikan9($data['tahun']);
						$data['tPenun10'] 	= $this->m_user->totalPenunjang10($data['tahun']);
						$data['tPenel10'] 	= $this->m_user->totalPenelitian10($data['tahun']);
						$data['tPengab10'] 	= $this->m_user->totalPengabdian10($data['tahun']);
						$data['tPend10'] 	= $this->m_user->totalPendidikan10($data['tahun']);
						$this->load->view('dashboard2', $data);
					}
	            	 echo '<script>alert("Login Sukses Selamat datang");</script>';
	            	// $this->load->view('dashboard2',['model'=>$this->model]);
	            }else{
	            	// redirect('Auth');
	            	$this->load->view('login');
	            	echo '<script>alert("Login gagal, Silahkan coba lagi!!");</script>';
	            }
			}else{
				$this->load->view('login',['model'=>$this->model]);
			}
		}
	}
	
	public function logout(){
		
			$this->session->sess_destroy();
			$this->load->view('login',['model'=>$this->model]);
		
	}

	public function profil($id)
	{
		$this->load->model("m_user");
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_profil($id);
		if(isset($_POST['tombol_submit'])){
			$this->m_user->update($_POST, $id);
			$data['prodi'] = $this->input->post('prodi');
			$data['jafa'] = $this->input->post('jafa');
			$this->session->set_userdata('prodi', $data['prodi']);
			$this->session->set_userdata('jafa', $data['jafa']);
			redirect('auth/Dashboard');
		}else{
		$this->load->view('admin/in_dosen',$data);
		}
	}
//END LOGIN PROSES
	public function Dashboard()
	{
		$this->load->library('session');
		if (isset($_POST['q'])) {
			if ($this->input->post('cari') == null) {
				$tahun = getdate();
	        	$now = $tahun['year'];
				$data['tahun'] = $now;
			}else{
				$data['tahun'] = $this->input->post('cari');
				// se session userdata untuk pencarian, untuk paging pencarian
				// $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
			}
		}
		else {
			$tahun = getdate();
        	$now = $tahun['year'];
			$data['tahun'] = $now;
		}

		// $data['model'] = $this->m_user->read_dosen1($data['ringkasan']); // Panggil fungsi view() yang ada di model siswa
		
		$data['penun'] = $this->m_user->sumPenunjang();
		$data['penel'] = $this->m_user->sumPenelitian();
		$data['pengab'] = $this->m_user->sumPengabdian();
		$data['pend'] = $this->m_user->sumPendidikan();
		$data['tPenun'] 	= $this->m_user->totalPenunjang($data['tahun']);
		$data['tPenel'] 	= $this->m_user->totalPenelitian($data['tahun']);
		$data['tPengab'] 	= $this->m_user->totalPengabdian($data['tahun']);
		$data['tPend'] 		= $this->m_user->totalPendidikan($data['tahun']);
		$data['tPenun2'] 	= $this->m_user->totalPenunjang2($data['tahun']);
		$data['tPenel2'] 	= $this->m_user->totalPenelitian2($data['tahun']);
		$data['tPengab2'] 	= $this->m_user->totalPengabdian2($data['tahun']);
		$data['tPend2'] 	= $this->m_user->totalPendidikan2($data['tahun']);
		$data['tPenun3'] 	= $this->m_user->totalPenunjang3($data['tahun']);
		$data['tPenel3'] 	= $this->m_user->totalPenelitian3($data['tahun']);
		$data['tPengab3'] 	= $this->m_user->totalPengabdian3($data['tahun']);
		$data['tPend3'] 	= $this->m_user->totalPendidikan3($data['tahun']);
		$data['tPenun4'] 	= $this->m_user->totalPenunjang4($data['tahun']);
		$data['tPenel4'] 	= $this->m_user->totalPenelitian4($data['tahun']);
		$data['tPengab4'] 	= $this->m_user->totalPengabdian4($data['tahun']);
		$data['tPend4'] 	= $this->m_user->totalPendidikan4($data['tahun']);
		$data['tPenun5'] 	= $this->m_user->totalPenunjang5($data['tahun']);
		$data['tPenel5'] 	= $this->m_user->totalPenelitian5($data['tahun']);
		$data['tPengab5'] 	= $this->m_user->totalPengabdian5($data['tahun']);
		$data['tPend5'] 	= $this->m_user->totalPendidikan5($data['tahun']);
		$data['tPenun6'] 	= $this->m_user->totalPenunjang6($data['tahun']);
		$data['tPenel6'] 	= $this->m_user->totalPenelitian6($data['tahun']);
		$data['tPengab6'] 	= $this->m_user->totalPengabdian6($data['tahun']);
		$data['tPend6'] 	= $this->m_user->totalPendidikan6($data['tahun']);
		$data['tPenun7'] 	= $this->m_user->totalPenunjang7($data['tahun']);
		$data['tPenel7'] 	= $this->m_user->totalPenelitian7($data['tahun']);
		$data['tPengab7'] 	= $this->m_user->totalPengabdian7($data['tahun']);
		$data['tPend7'] 	= $this->m_user->totalPendidikan7($data['tahun']);
		$data['tPenun8'] 	= $this->m_user->totalPenunjang8($data['tahun']);
		$data['tPenel8'] 	= $this->m_user->totalPenelitian8($data['tahun']);
		$data['tPengab8'] 	= $this->m_user->totalPengabdian8($data['tahun']);
		$data['tPend8'] 	= $this->m_user->totalPendidikan8($data['tahun']);
		$data['tPenun9'] 	= $this->m_user->totalPenunjang9($data['tahun']);
		$data['tPenel9'] 	= $this->m_user->totalPenelitian9($data['tahun']);
		$data['tPengab9'] 	= $this->m_user->totalPengabdian9($data['tahun']);
		$data['tPend9'] 	= $this->m_user->totalPendidikan9($data['tahun']);
		$data['tPenun10'] 	= $this->m_user->totalPenunjang10($data['tahun']);
		$data['tPenel10'] 	= $this->m_user->totalPenelitian10($data['tahun']);
		$data['tPengab10'] 	= $this->m_user->totalPengabdian10($data['tahun']);
		$data['tPend10'] 	= $this->m_user->totalPendidikan10($data['tahun']);
		// $data['datagrafik']=$this->m_grafik->get_data_lpkd();
		$this->load->view('../views/dashboard2', $data);
	}

	public function settingAkun()
	{
		$this->load->library('session');
		$this->load->view('../views/setting');
	}

	public function settingAkunUser()
	{
		$this->load->library('session');
		$this->load->view('../views/setting1');
	}

	public function prosesSetting()
	{
		if(isset($_POST["tombol_submit"])) {
		    $password_old   = $_POST['passLama']; //Password lama
		    $password_new   = $_POST['passBaru']; //Password baru
		    $password_conf  = $_POST['passVeri']; //Konfirmasi password

		    if (empty(trim($password_old)) || empty(trim($password_new)) || empty(trim($password_conf)) ) {
		            echo "<script>alert('Form tidak boleh ada yang kosong!');window.location='settingAkun';</script>";
		            // redirect('auth/prosesSetting');
		    } else {
		    	$where=$this->session->userdata('idDosen');
		    	// echo $where;
		        // $sql  = mysqli_query("SELECT * FROM tbdosen WHERE idDosen = '$where'");
		        // $data = mysqli_fetch_array($sql);    
				$query = $this->db->query("SELECT * from tbdosen where idDosen = '$where'")->result();
		 		$data['kunci'] = $query;
		 		foreach ($data['kunci'] as $data1) {
		 			# code...
		 			$passold = $data1->pass;
		 		}

		        $pass1 = password_verify($password_old, $passold);

		        //die(var_dump($pass));
		        
		        if ($passold == $password_old) {
		        	// echo $passold;
		            $pass_new  = password_hash($password_new, PASSWORD_DEFAULT, ['cost'=>12]);
		            $pass_conf = password_hash($password_conf, PASSWORD_DEFAULT, ['cost'=>12]);
		            $conf = password_verify($password_conf, $pass_new);

		            //die(var_dump($conf));

		            if($conf === FALSE) {
		                echo "<script>alert('Gagal mengganti password! Password tidak sama!');window.location='settingAkun';</script>";
		            } else {
		            	$this->m_user->updateAkun();
		                echo "<script>alert('Ganti password berhasil! Silahkan login ulang untuk verifikasi!');window.location='index';</script>";
		            }

		        } else {
		            echo "<script>alert('Gagal mengganti password! Password tidak terdaftar!');window.location='settingAkun';</script>";
		        }
		    }
		}
	}

//ADMIN DASHBOARD
	public function loadDashboard()
	{
		$this->load->library('session');
		$data['penun'] = $this->m_user->sumPenunjang();
		$data['penel'] = $this->m_user->sumPenelitian();
		$data['pengab'] = $this->m_user->sumPengabdian();
		$data['pend'] = $this->m_user->sumPendidikan();
		$this->load->model("m_user");
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->read_dupak($data['ringkasan']);
		$this->load->view('../views/dashboard1', $data);
	}

	public function loadakunDosen()
	{		
		$this->load->model("m_user");
		$data['rows'] = $this->m_user->read_akun_dosen();
		$this->load->view('admin/akundosen',$data);
					
	}

	public function loadDosen(){
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}

		$data['model'] = $this->m_user->read_dosen1($data['ringkasan']); // Panggil fungsi view() yang ada di model siswa
		
		$this->load->view('admin/dosen', $data);
	}

	public function inDosen()
	{	
		$this->load->model("m_user");
		$data['tipe'] = "Tambah";
 		if(isset($_POST['tombol_submit'])){
	        	if ($_POST['jabatan']=="DOSEN") {
	        		if ($_POST['bagian']=="User") {
	        		$data['kodeunik'] = $this->m_user->code_otomatis();
					$this->m_user->simpanDosen($_POST);
					redirect('auth/loadDosen');
	        		}else{
	        			if ($this->model->cekBagianIn() == true){
			            	echo '<script>alert("Pengguna Dosen ada yang sama!!");</script>';
							$this->load->view('admin/in_dosen',$data);
						}else{
							$data['kodeunik'] = $this->m_user->code_otomatis();
							$this->m_user->simpanDosen($_POST);
							redirect('auth/loadDosen');
						}
	        		}
        		}elseif($_POST['jabatan']=="KETUA" OR $_POST['jabatan']=="WAKIL KETUA I" OR $_POST['jabatan']=="WAKIL KETUA II" OR $_POST['jabatan']=="WAKIL KETUA III"){
        			if ($this->model->cekJabatanIn1() == true){
			        	echo '<script>alert("Jabatan Dosen ada yang sama!!");</script>';
						$this->load->view('admin/in_dosen',$data);
					}else{
						if ($_POST['bagian']=="User") {
			        		$data['kodeunik'] = $this->m_user->code_otomatis();
							$this->m_user->simpanDosen($_POST);
							redirect('auth/loadDosen');
			        		}else{
			        			if ($this->model->cekBagianIn() == true){
					            	echo '<script>alert("Pengguna Dosen ada yang sama!!");</script>';
									$this->load->view('admin/in_dosen',$data);
								}else{
									$data['kodeunik'] = $this->m_user->code_otomatis();
									$this->m_user->simpanDosen($_POST);
									redirect('auth/loadDosen');
								}
			        		}
					}
        		}else{
        			
	        			if ($this->model->cekJabatanIn() == true){
			            	echo '<script>alert("Jabatan KAPRODI Dosen ada yang sama!!");</script>';
							$this->load->view('admin/in_dosen',$data);
						}else{
							if ($_POST['bagian']=="User") {
			        		$data['kodeunik'] = $this->m_user->code_otomatis();
							$this->m_user->simpanDosen($_POST);
							redirect('auth/loadDosen');
			        		}else{
			        			if ($this->model->cekBagianIn() == true){
					            	echo '<script>alert("Pengguna Dosen ada yang sama!!");</script>';
									$this->load->view('admin/in_dosen',$data);
								}else{
									$data['kodeunik'] = $this->m_user->code_otomatis();
									$this->m_user->simpanDosen($_POST);
									redirect('auth/loadDosen');
								}
			        		}
						}
					}
        		}
		else{
		$this->load->view('admin/in_dosen',$data);
		}			
	}

	public function edit($id){
		$this->load->model("m_user");
		$data['tipe'] = "Edit";
		// if ($id==$this->session->userdata('idDosen')) {
		// 	redirect('auth/loadDosen');
		// 	// echo '<script>alert("Gagal Hapus, Admin Tidak bisa menghapus datanya!!");</script>';
		// }else{
		$data['default'] = $this->m_user->get_default($id);
		if(isset($_POST['tombol_submit'])){
			if ($_POST['jabatan']=="DOSEN") {
	        		if ($_POST['bagian']=="User") {
					$this->m_user->update($_POST, $id);
					redirect('auth/loadDosen');
	        		}else{
	        			if ($this->model->cekBagian($id) == true){
			            	echo '<script>alert("Gagal Update, Pengguna Dosen ada yang sama!!");</script>';
							$this->load->view('admin/in_dosen',$data);
						}else{
							$this->m_user->update($_POST, $id);
							redirect('auth/loadDosen');
						}
	        		}
        	}elseif($_POST['jabatan']=="KETUA" OR $_POST['jabatan']=="WAKIL KETUA I" OR $_POST['jabatan']=="WAKIL KETUA II" OR $_POST['jabatan']=="WAKIL KETUA III"){
        		if ($this->model->cekJabatan2($id) == true){
			       	echo '<script>alert("Gagal Update, Jabatan wakil Dosen ada yang sama!!");</script>';
					$this->load->view('admin/in_dosen',$data);
				}else{
					if ($_POST['bagian']=="User") {
					$this->m_user->update($_POST, $id);
					redirect('auth/loadDosen');
	        		}else{
	        			if ($this->model->cekBagian($id) == true){
			            	echo '<script>alert("Gagal Update, Pengguna Dosen ada yang sama!!");</script>';
							$this->load->view('admin/in_dosen',$data);
						}else{
							$this->m_user->update($_POST, $id);
							redirect('auth/loadDosen');
						}
	        		}
				}
			}else{
	        	if ($this->model->cekJabatan1($id) == true){
			        echo '<script>alert("Jabatan KAPRODI Dosen ada yang sama!!");</script>';
					$this->load->view('admin/in_dosen',$data);
				}else{
						if ($_POST['bagian']=="User") {
						$this->m_user->update($_POST, $id);
						redirect('auth/loadDosen');
		        		}else{
		        			if ($this->model->cekBagian($id) == true){
				            	echo '<script>alert("Gagal Update, Pengguna Dosen ada yang sama!!");</script>';
								$this->load->view('admin/in_dosen',$data);
							}else{
								$this->m_user->update($_POST, $id);
								redirect('auth/loadDosen');
							}
		        		}
					}
			}
       	}else{
		$this->load->view('admin/in_dosen',$data);
		}
	// }
	}

	public function deleteDosen($id){
		$this->load->model("m_user");
		if ($id==$this->session->userdata('idDosen')) {
			redirect('auth/loadDosen');
			echo '<script>alert("Gagal Hapus, Admin Tidak bisa menghapus datanya!!");</script>';
		}else{
			$this->m_user->hapusDosen($id);
			redirect('auth/loadDosen');
		}
	}

	public function dupakAdmin()
	{
		
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		
		$data['model'] = $this->m_user->read_dupakAdmin($data['ringkasan']);
		$this->load->view('admin/dupakAdmin', $data);			
	}

	public function dupak()
	{
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->read_dupak($data['ringkasan']);
		$this->load->view('admin/dupak', $data);
					
	}

	public function inDupakAdmin(){

		$this->load->model("m_user");
		$data['tipe'] = "Tambah";
 		$data['kodeunik'] = $this->m_user->codeDupak();
 		if(isset($_POST['tombol_submit'])){
			//proses simpan dilakukan
			$this->m_user->simDupak($_POST);
			redirect('auth/dupak');
		}else{
		$this->load->view('admin/in_dupak',$data);
		}			
	}

	public function editDupak($id){
		$this->load->model("m_user");
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_dupak($id);
		if(isset($_POST['tombol_submit'])){
			$this->m_user->upDupak($_POST, $id);
			redirect('auth/dupak');			
		}else{
		$this->load->view('admin/in_dupak',$data);
		}
	}

	public function deleteDupak($id){
		$this->load->model("m_user");
		$this->m_user->hapusDupak($id);
		redirect('auth/dupak');
	}

	public function pengajaranAdmin()
	{
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->read_pengajaranAdmin($data['ringkasan']);
		$this->load->view('admin/pengajaranAdmin', $data);
					
	}

	function get_subkategoriPengajaran(){
        $id=$this->input->post('id');
        $data=$this->m_user->get_bag1Penelitian($id);
        echo json_encode($data);
    }
    function get_subkategoriPengajaran1(){
        $id=$this->input->post('id');
        $data=$this->m_user->get_bag2Penelitian($id);
        echo json_encode($data);
    }

	public function pengajaran()
	{
		
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->read_pengajaran($data['ringkasan']);
		$this->load->view('admin/pengajaran', $data);
					
	}

	public function inPengajaran()
	{
        $data['bagian']=$this->m_user->get_bagianPengajaran();
        $data['bag1']=$this->m_user->get_bag1Penelitian();
        $data['bag2']=$this->m_user->get_bag2Penelitian();
		$this->load->model("m_user");
		$data['tipe'] = "Tambah";
 		$data['kodeunik'] = $this->m_user->codePengajaran();
 		if(isset($_POST['tombol_submit'])){
			//proses simpan dilakukan
			if ($_FILES["berkas"]['name']<>""){
	 			$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/inPengajaran');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->simPengajaran($_POST);
					redirect('auth/pengajaran');
				}
			}
			else{
				$this->m_user->simPengajaran($_POST);
				redirect('auth/pengajaran');
			}
		}else{
		$this->load->view('admin/in_pengajaran',$data);
		}			
	}

	public function editPengajaran($id){
		$this->load->model("m_user");
        $data['bagian']=$this->m_user->get_bagianPengajaran();
        $data['bag1']=$this->m_user->get_bag1Penelitian();
        $data['bag2']=$this->m_user->get_bag2Penelitian();
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_pengajaran($id);
		if(isset($_POST['tombol_submit'])){
			//proses simpan dilakukan
			if ($_FILES["berkas"]['name']<>"") {
	 			$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/editPengajaran');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->upPengajaran($_POST, $id);
					redirect('auth/pengajaran');
				}
			}else{
				$this->m_user->upPengajaran($_POST, $id);
				redirect('auth/pengajaran');
			}
		}else{
		$this->load->view('admin/in_pengajaran',$data);
		}
	}
	
	public function lakukan_download($id){
		force_download('./berkas/'.$id,NULL);
	}

	public function editPengajaranAdmin($id){
		$this->load->model("m_user");
        $data['bagian']=$this->m_user->get_bagianPengajaran();
        $data['bag1']=$this->m_user->get_bag1Penelitian();
        $data['bag2']=$this->m_user->get_bag2Penelitian();
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_pengajaran($id);
		if(isset($_POST['tombol_submit'])){
			if ($_FILES["berkas"]['name']<>"") {
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/editPengajaranAdmin');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->upPengajaran($_POST, $id);
					redirect('auth/pengajaranAdmin');
				}
			}else{
				$this->m_user->upPengajaran($_POST, $id);
				redirect('auth/pengajaranAdmin');
			}
		}else{
		$this->load->view('admin/in_pengajaran',$data);
		}
	}

	public function deletePengajaran($id){
		$this->load->model("m_user");
		$this->m_user->hapusPengajaran($id);
		redirect('auth/pengajaran');
	}

	public function deletePengajaranAdmin($id){
		$this->load->model("m_user");
		$this->m_user->hapusPengajaran($id);
		redirect('auth/pengajaranAdmin');
	}

	public function penelitianAdmin()
	{
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->read_penelitianAdmin($data['ringkasan']);
		$this->load->view('admin/penelitianAdmin', $data);
					
	}

	function get_subkategoriPenelitian(){
        $id=$this->input->post('id');
        $data=$this->m_user->get_bag1Penelitian($id);
        echo json_encode($data);
    }
    function get_subkategoriPenelitian1(){
        $id=$this->input->post('id');
        $data=$this->m_user->get_bag2Penelitian($id);
        echo json_encode($data);
    }

	public function penelitian()
	{
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->read_penelitian($data['ringkasan']);
		$this->load->view('admin/penelitian', $data);
					
	}

	public function inPenelitianAdmin()
	{	
        $data['bagian']=$this->m_user->get_bagianPenelitian();
        $data['bag1']=$this->m_user->get_bag1Penelitian();
        $data['bag2']=$this->m_user->get_bag2Penelitian();
		$this->load->model("m_user");
		$data['tipe'] = "Tambah";
 		$data['kodeunik'] = $this->m_user->codePenelitian();
 		if(isset($_POST['tombol_submit'])){
			 //proses simpan dilakukan
			if ($_FILES["berkas"]['name']<>""){
				$config['upload_path']          = './berkas/';
			   	$config['allowed_types']        = 'pdf';
			   	$config['max_size']             = 10000;
			   	$config['max_width']            = 1024;
			   	$config['max_height']           = 768;
			   	$new_name = time().$_FILES["berkas"]['name'];
			   	$config['file_name'] = $new_name;
		
			   	$this->load->library('upload', $config);
		
			   	if ( ! $this->upload->do_upload('berkas')){
				   $error = array('error' => $this->upload->display_errors());
				   redirect('auth/inPenelitianAdmin');
			   	}else{
				   $data = array('upload_data' => $this->upload->data());
				   //$this->load->view('v_upload_sukses', $data);
				   $this->m_user->simPenelitian($_POST);
				   redirect('auth/penelitian');
			   	}
		   }
		   else{
			   $this->m_user->simPenelitian($_POST);
			   redirect('auth/penelitian');
		   }
			//proses simpan dilakukan
			// if($_FILES["berkas"]['name']<>""){
			// 	$config['upload_path']          = './berkas/';
			// 	$config['allowed_types']        = 'pdf';
			// 	$config['max_size']             = 10000;
			// 	$config['max_width']            = 1024;
			// 	$config['max_height']           = 768;
			// 	$new_name = time().$_FILES["berkas"]['name'];
			// 	$config['file_name'] = $new_name;
		 
			// 	$this->load->library('upload', $config);
		 
			// 	if ( ! $this->upload->do_upload('berkas')){
			// 		$error = array('error' => $this->upload->display_errors());
			// 		redirect('auth/inPenelitianAdmin');
			// 	}else{
			// 		$data = array('upload_data' => $this->upload->data());
			// 		//$this->load->view('v_upload_sukses', $data);
			// 		$this->m_user->simPenelitian($_POST);
			// 		redirect('auth/penelitian');
			// 	}
			// }else{
			// 	$this->m_user->simPenelitian($_POST);
			// 	redirect('auth/penelitian');
			// }
		}else{
		$this->load->view('admin/in_penelitian',$data);
		}			
	}

	public function editPenelitian($id){
		$this->load->model("m_user");
        $data['bagian']=$this->m_user->get_bagianPenelitian();
        $data['bag1']=$this->m_user->get_bag1Penelitian();
        $data['bag2']=$this->m_user->get_bag2Penelitian();
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_penelitian($id);
		if(isset($_POST['tombol_submit'])){
			if($_FILES["berkas"]['name']<>""){
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/editPenelitian');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->upPenelitian($_POST, $id);
					redirect('auth/penelitian');
				}
			}else{
				$this->m_user->upPenelitian($_POST, $id);
				redirect('auth/penelitian');
			}
		}else{
			$this->load->view('admin/in_penelitian',$data);
		}
	}

	public function editPenelitianAdmin($id){
		$this->load->model("m_user");
        $data['bagian']=$this->m_user->get_bagianPenelitian();
        $data['bag1']=$this->m_user->get_bag1Penelitian();
        $data['bag2']=$this->m_user->get_bag2Penelitian();
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_penelitian($id);
		if(isset($_POST['tombol_submit'])){
			if($_FILES["berkas"]['name']<>""){
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/editPenelitianAdmin');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->upPenelitian($_POST, $id);
					redirect('auth/penelitianAdmin');
				}
			}else{
				$this->m_user->upPenelitian($_POST, $id);
				redirect('auth/penelitianAdmin');
			}
		}else{
		$this->load->view('admin/in_penelitian',$data);
		}
	}

	public function deletePenelitian($id){
		$this->m_user->hapusPenelitian($id);
		redirect('auth/penelitian');
	}

	public function deletePenelitianAdmin($id){
		$this->m_user->hapusPenelitian($id);
		redirect('auth/penelitianAdmin');
	}

	public function pengabdianAdmin()
	{
		
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->readPengabdianAdmin($data['ringkasan']);
		$this->load->view('admin/pengabdianAdmin', $data);
					
	}

	public function pengabdian()
	{

		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->readPengabdian($data['ringkasan']);
		$this->load->view('admin/pengabdian', $data);
					
	}

	public function inPengabdianAdmin()
	{	
		$this->load->model("m_user");
        $data['bagian']=$this->m_user->get_bagianPengabdian();
        $data['kota'] = $this->m_user->get_bag1();
		$data['tipe'] = "Tambah";
 		$data['kodeunik'] = $this->m_user->codePengabdian();
 		if(isset($_POST['tombol_submit'])){
			//proses simpan dilakukan
			if($_FILES["berkas"]['name']<>""){
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/inPengabdianAdmin');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->simPengabdian($_POST);
					redirect('auth/pengabdian');
				}
			}else{
				$this->m_user->simPengabdian($_POST);
				redirect('auth/pengabdian');
			}
		}else{
		$this->load->view('admin/in_pengabdian',$data);
		}			
	}

	public function editPengabdian($id){
		$this->load->model("m_user");
        $data['bagian']=$this->m_user->get_bagianPengabdian();
        $data['kota'] = $this->m_user->get_bag1();
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_pengabdian($id);
		if(isset($_POST['tombol_submit'])){
			if ($_FILES["berkas"]['name']<>"") {
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/editPengabdian');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->upPengabdian($_POST, $id);
					redirect('auth/pengabdian');
				}
			}else{
				$this->m_user->upPengabdian($_POST, $id);
				redirect('auth/pengabdian');
			}
		}else{
		$this->load->view('admin/in_pengabdian',$data);
		}
	}

	public function editPengabdianAdmin($id){
		$this->load->model("m_user");
        $data['bagian']=$this->m_user->get_bagianPengabdian();
        $data['kota'] = $this->m_user->get_bag1();
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_pengabdian($id);
		if(isset($_POST['tombol_submit'])){
			if ($_FILES["berkas"]['name']<>"") {
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/editPengabdianAdmin');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->upPengabdian($_POST, $id);
					redirect('auth/pengabdianAdmin');
				}
			}else{
				$this->m_user->upPengabdian($_POST, $id);
				redirect('auth/pengabdianAdmin');
			}
		}else{
		$this->load->view('admin/in_pengabdian',$data);
		}
	}

	public function deletePengabdian($id){
		$this->load->model("m_user");
		$this->m_user->hapusPengabdian($id);
		redirect('auth/pengabdian');
	}

	public function deletePengabdianAdmin($id){
		$this->load->model("m_user");
		$this->m_user->hapusPengabdian($id);
		redirect('auth/pengabdianAdmin');
	}

	public function penunjangAdmin()
	{
		$this->load->model("m_user");
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->readPenunjangAdmin($data['ringkasan']);
		$this->load->view('admin/penunjangAdmin', $data);
					
	}

	public function penunjang()
	{        
		$this->load->model("m_user");
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->readPenunjang($data['ringkasan']);
		$this->load->view('admin/penunjang', $data);
					
	}

	public function inPenunjangAdmin()
	{	 
		$this->load->model("m_user");
		// $x['data']=$this->m_kategori->get_kategori();
        $data['bagian']=$this->m_user->get_bagian();
        $data['kota'] = $this->m_user->get_bag1();
		$data['tipe'] = "Tambah";
 		$data['kodeunik'] = $this->m_user->codePenunjang();
 		if(isset($_POST['tombol_submit'])){
			//proses simpan dilakukan
			if($_FILES["berkas"]['name']<>""){
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/inPenunjangAdmin');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->simPenunjang($_POST);
					redirect('auth/penunjang');
				}
			}else{
				$this->m_user->simPenunjang($_POST);
				redirect('auth/penunjang');	
			}
		}else{
		$this->load->view('admin/in_penunjang',$data);
		}			
	}

	public function editPenunjang($id){ 
		$this->load->model("m_user");
        $data['bagian']=$this->m_user->get_bagian();
        $data['kota'] = $this->m_user->get_bag1();
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_penunjang($id);
		if(isset($_POST['tombol_submit'])){
			if($_FILES["berkas"]['name']<>""){
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/editPenunjang');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->upPenunjang($_POST, $id);
					redirect('auth/penunjang');
				}
			}else{
				$this->m_user->upPenunjang($_POST, $id);
				redirect('auth/penunjang');
			}
		}else{
		$this->load->view('admin/in_penunjang',$data);
		}
	}

	public function editPenunjangAdmin($id){ 
		$this->load->model("m_user");
        $data['bagian']=$this->m_user->get_bagian();
        $data['kota'] = $this->m_user->get_bag1();
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_penunjang($id);
		if(isset($_POST['tombol_submit'])){
			if($_FILES["berkas"]['name']<>""){
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/editPenunjangAdmin');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->upPenunjang($_POST, $id);
					redirect('auth/penunjangAdmin');
				}
			}else{
				$this->m_user->upPenunjang($_POST, $id);
				redirect('auth/penunjangAdmin');
			}
		}else{
		$this->load->view('admin/in_penunjang',$data);
		}
	}

	public function deletePenunjang($id){ 
		$this->load->model("m_user");
		$this->m_user->hapusPenunjang($id);
		redirect('auth/penunjang');
	}

	public function deletePenunjangAdmin($id){ 
		$this->load->model("m_user");
		$this->m_user->hapusPenunjang($id);
		redirect('auth/penunjangAdmin');
	}
//END ADMIN DASHBOARD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//CLIENT DASHBOARD//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function profilClient($id)
	{
		$this->load->model("m_user");
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_profil($id);
		if(isset($_POST['tombol_submit'])){
			$this->m_user->update1($_POST, $id);
			$data['prodi'] = $this->input->post('prodi');
			$this->session->set_userdata('prodi', $data['prodi']);
			redirect('auth/loadDashboard');
		}else{
		$this->load->view('client/in_dosen',$data);
		}
	}

	public function dupakClient()
	{
		$this->load->model("m_user");
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->read_dupakClient($data['ringkasan']);
		$this->load->view('client/dupak', $data);
					
	}

	public function inDupakClient()
	{	
		$this->load->model("m_user");
		$data['tipe'] = "Tambah";
 		$data['kodeunik'] = $this->m_user->codeDupak();
 		if(isset($_POST['tombol_submit'])){
			//proses simpan dilakukan
			$this->m_user->simDupak($_POST);
			redirect('auth/loadDashboard');	
		}else{
		$this->load->view('client/in_dupak',$data);
		}			
	}

	public function editDupakClient($id){
		$this->load->model("m_user");
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_dupak($id);
		if(isset($_POST['tombol_submit'])){
			$this->m_user->upDupak($_POST, $id);
			redirect('auth/loadDashboard');	
		}else{
		$this->load->view('client/in_dupak',$data);
		}
	}

	public function deleteDupakClient($id){
		$this->load->model("m_user");
		$this->m_user->hapusDupak($id);
		redirect('auth/loadDashboard');	
	}

	public function pengajaranClient()
	{
		$this->load->model("m_user");
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->read_pengajaranClient($data['ringkasan']);
		$this->load->view('client/pengajaran', $data);
					
	}

	public function inPengajaranClient()
	{	
		$data['bagian']=$this->m_user->get_bagianPengajaran();
        $data['bag1']=$this->m_user->get_bag1Penelitian();
        $data['bag2']=$this->m_user->get_bag2Penelitian();
		$this->load->model("m_user");
		$data['tipe'] = "Tambah";
 		$data['kodeunik'] = $this->m_user->codePengajaran();
 		if(isset($_POST['tombol_submit'])){
			//proses simpan dilakukan
			if ($_FILES["berkas"]['name']<>""){
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/inPengajaranClient');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->simPengajaran($_POST);
					redirect('auth/pengajaranClient');
				}
			}else{
				$this->m_user->simPengajaran($_POST);
				redirect('auth/pengajaranClient');
			}
		}else{
		$this->load->view('client/in_pengajaran',$data);
		}			
	}

	public function editPengajaranClient($id){
		$this->load->model("m_user");
        $data['bagian']=$this->m_user->get_bagianPengajaran();
        $data['bag1']=$this->m_user->get_bag1Penelitian();
        $data['bag2']=$this->m_user->get_bag2Penelitian();
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_pengajaran($id);
		if(isset($_POST['tombol_submit'])){
			if ($_FILES["berkas"]['name']<>"") {
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/editPengajaranClient');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->upPengajaran($_POST, $id);
					redirect('auth/pengajaranClient');
				}
			}else{
				$this->m_user->upPengajaran($_POST, $id);
				redirect('auth/pengajaranClient');
			}
		}else{
		$this->load->view('client/in_pengajaran',$data);
		}
	}

	public function deletePengajaranClient($id){
		$this->load->model("m_user");
		$this->m_user->hapusPengajaran($id);
		redirect('auth/pengajaranClient');
	}

	public function penelitianClient()
	{
		$this->load->model("m_user");
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->read_penelitianClient($data['ringkasan']);
		$this->load->view('client/penelitian', $data);
					
	}

	public function inPenelitianClient()
	{	
		$data['bagian']=$this->m_user->get_bagianPenelitian();
        $data['bag1']=$this->m_user->get_bag1Penelitian();
        $data['bag2']=$this->m_user->get_bag2Penelitian();
		$this->load->model("m_user");
		$data['tipe'] = "Tambah";
 		$data['kodeunik'] = $this->m_user->codePenelitian();
 		if(isset($_POST['tombol_submit'])){
			//proses simpan dilakukan
			if($_FILES["berkas"]['name']<>""){
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/inPenelitianClient');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->simPenelitian($_POST);
					redirect('auth/penelitianClient');
				}
			}else{
				$this->m_user->simPenelitian($_POST);
				redirect('auth/penelitianClient');
			}
		}else{
		$this->load->view('client/in_penelitian',$data);
		}			
	}

	public function editPenelitianClient($id){
		$data['bagian']=$this->m_user->get_bagianPenelitian();
        $data['bag1']=$this->m_user->get_bag1Penelitian();
        $data['bag2']=$this->m_user->get_bag2Penelitian();
		$this->load->model("m_user");
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_penelitian($id);
		if(isset($_POST['tombol_submit'])){
			if ($_FILES["berkas"]['name']<>""){
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/editPenelitianClient');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->upPenelitian($_POST, $id);
					redirect('auth/penelitianClient');
				}
			}else{
				$this->m_user->upPenelitian($_POST, $id);
				redirect('auth/penelitianClient');
			}
		}else{
		$this->load->view('client/in_penelitian',$data);
		}
	}

	public function deletePenelitianClient($id){
		$this->load->model("m_user");
		$this->m_user->hapusPenelitian($id);
		redirect('auth/penelitianClient');
	}

	public function pengabdianClient()
	{
		$this->load->model("m_user");
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->readPengabdianClient($data['ringkasan']);
		$this->load->view('client/pengabdian', $data);
					
	}

	public function inPengabdianClient()
	{	
		$this->load->model("m_user");
        $data['bagian']=$this->m_user->get_bagianPengabdian();
        $data['kota'] = $this->m_user->get_bag1();
		$data['tipe'] = "Tambah";
 		$data['kodeunik'] = $this->m_user->codePengabdian();
 		if(isset($_POST['tombol_submit'])){
			//proses simpan dilakukan
			if($_FILES["berkas"]['name']<>""){
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/inPengabdianClient');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->simPengabdian($_POST);
					redirect('auth/pengabdianClient');
				}
			}else{
				$this->m_user->simPengabdian($_POST);
				redirect('auth/pengabdianClient');
			}
		}else{
		$this->load->view('client/in_pengabdian',$data);
		}			
	}

	public function editPengabdianClient($id){
		$this->load->model("m_user");
        $data['bagian']=$this->m_user->get_bagianPengabdian();
        $data['kota'] = $this->m_user->get_bag1();
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_pengabdian($id);
		if(isset($_POST['tombol_submit'])){
			if($_FILES["berkas"]['name']<>""){
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/editPengabdianClient');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->upPengabdian($_POST, $id);
					redirect('auth/pengabdianClient');
				}
			}
			else{
				$this->m_user->upPengabdian($_POST, $id);
				redirect('auth/pengabdianClient');
			}
		}else{
		$this->load->view('client/in_pengabdian',$data);
		}
	}

	public function deletePengabdianClient($id){
		$this->load->model("m_user");
		$this->m_user->hapusPengabdian($id);
		redirect('auth/pengabdianClient');
	}

	public function penunjangClient()
	{
		$this->load->model("m_user");
		if (isset($_POST['q'])) {
			$data['ringkasan'] = $this->input->post('cari');
			// se session userdata untuk pencarian, untuk paging pencarian
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}
		$data['model'] = $this->m_user->readPenunjangClient($data['ringkasan']);
        $this->load->view('client/penunjang', $data);
					
	}

	public function inPenunjangClient()
	{	
       $this->load->model("m_user");
        $data['bagian']=$this->m_user->get_bagian();
        $data['kota'] = $this->m_user->get_bag1();
		$data['tipe'] = "Tambah";
 		$data['kodeunik'] = $this->m_user->codePenunjang();
 		if(isset($_POST['tombol_submit'])){
			//proses simpan dilakukan
			if($_FILES["berkas"]['name']<>""){
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/inPenunjangClient');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->simPenunjang($_POST);
					redirect('auth/penunjangClient');
				}
			}else{
				$this->m_user->simPenunjang($_POST);
				redirect('auth/penunjangClient');
			}
		}else{
		$this->load->view('client/in_penunjang',$data);
		}			
	}

	public function editPenunjangClient($id){
       $this->load->model("m_user");
        $data['bagian']=$this->m_user->get_bagian();
        $data['kota'] = $this->m_user->get_bag1();
		$data['tipe'] = "Edit";
		$data['default'] = $this->m_user->get_penunjang($id);
		if(isset($_POST['tombol_submit'])){
			if($_FILES["berkas"]['name']<>""){
				$config['upload_path']          = './berkas/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;
				$new_name = time().$_FILES["berkas"]['name'];
				$config['file_name'] = $new_name;
		 
				$this->load->library('upload', $config);
		 
				if ( ! $this->upload->do_upload('berkas')){
					$error = array('error' => $this->upload->display_errors());
					redirect('auth/editPenunjangClient');
				}else{
					$data = array('upload_data' => $this->upload->data());
					//$this->load->view('v_upload_sukses', $data);
					$this->m_user->upPenunjang($_POST, $id);
					redirect('auth/penunjangClient');
				}
			}else{
				$this->m_user->upPenunjang($_POST, $id);
				redirect('auth/penunjangClient');
			}
		}else{
		$this->load->view('client/in_penunjang',$data);
		}
	}

	public function deletePenunjangClient($id){
       $this->load->model("m_user");
		$this->m_user->hapusPenunjang($id);
		redirect('auth/penunjangClient');
	}

//END CLIENT DASHBOARD//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//PDF///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function laporanPenelitian()
	{
		$this->load->library('mc_table');
		$id = $this->session->userdata('idDosen');
		$prodi = $this->session->userdata('prodi');
 		$query = $this->db->query("SELECT * from tbdosen where idDosen = '$id'")->result();
 		$data['profil'] = $query;
		$query = $this->db->query("SELECT * from tbdosen where jabatan = 'KAPRODI' and prodi ='$prodi'")->result();
 		$data['kajur'] = $query;
 		//level 1
		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv1 ='IL0001'")->result();
 		$data['CL101'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv1 ='IL0002'")->result();
 		$data['CL102'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv1 ='IL0003'")->result();
 		$data['CL103'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv1 ='IL0004'")->result();
 		$data['CL104'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv1 ='IL0005'")->result();
 		$data['CL105'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv1 ='IL0006'")->result();
 		$data['CL106'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv1 ='IL0007'")->result();
 		$data['CL107'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv1 ='IL0008'")->result();
 		$data['CL108'] = $query;
 		//level 2
		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv2 ='IL20001'")->result();
 		$data['CL201'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv2 ='IL20002'")->result();
 		$data['CL202'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv2 ='IL20003'")->result();
 		$data['CL203'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv2 ='IL20004'")->result();
 		$data['CL204'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv2 ='IL20005'")->result();
 		$data['CL205'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv2 ='IL20006'")->result();
 		$data['CL206'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv2 ='IL20007'")->result();
 		$data['CL207'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv2 ='IL20008'")->result();
 		$data['CL208'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv2 ='IL20009'")->result();
 		$data['CL209'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv2 ='IL20010'")->result();
 		$data['CL210'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv2 ='IL20011'")->result();
 		$data['CL211'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv2 ='IL20012'")->result();
 		$data['CL212'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv2 ='IL20013'")->result();
 		$data['CL213'] = $query;
 		//level 3
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30001'")->result();
 		$data['CL301'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30002'")->result();
 		$data['CL302'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30003'")->result();
 		$data['CL303'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30004'")->result();
 		$data['CL304'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30005'")->result();
 		$data['CL305'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30006'")->result();
 		$data['CL306'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30007'")->result();
 		$data['CL307'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30008'")->result();
 		$data['CL308'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30009'")->result();
 		$data['CL309'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30010'")->result();
 		$data['CL310'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30011'")->result();
 		$data['CL311'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30012'")->result();
 		$data['CL312'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30013'")->result();
 		$data['CL313'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30014'")->result();
 		$data['CL314'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30015'")->result();
 		$data['CL315'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30016'")->result();
 		$data['CL316'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30017'")->result();
 		$data['CL317'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30018'")->result();
 		$data['CL318'] = $query;
 		$query = $this->db->query("SELECT count(idPenelitian) AS id1A from tbpenelitian where idDosen = '$id' and idLv3 ='IL30019'")->result();
 		$data['CL319'] = $query;
 		//data
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30001'")->result();
 		$data['dataP1'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30002'")->result();
 		$data['dataP2'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30003'")->result();
 		$data['dataP3'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30004'")->result();
 		$data['dataP4'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30005'")->result();
 		$data['dataP5'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30006'")->result();
 		$data['dataP6'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30007'")->result();
 		$data['dataP7'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30008'")->result();
 		$data['dataP8'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30009'")->result();
 		$data['dataP9'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30010'")->result();
 		$data['dataP10'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30011'")->result();
 		$data['dataP11'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30012'")->result();
 		$data['dataP12'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30013'")->result();
 		$data['dataP13'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30014'")->result();
 		$data['dataP14'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30015'")->result();
 		$data['dataP15'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30016'")->result();
 		$data['dataP16'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30017'")->result();
 		$data['dataP17'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30018'")->result();
 		$data['dataP18'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30019'")->result();
 		$data['dataP19'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30020'")->result();
 		$data['dataP20'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30021'")->result();
 		$data['dataP21'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30022'")->result();
 		$data['dataP22'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30023'")->result();
 		$data['dataP23'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30024'")->result();
 		$data['dataP24'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30025'")->result();
 		$data['dataP25'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30026'")->result();
 		$data['dataP26'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30027'")->result();
 		$data['dataP27'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30028'")->result();
 		$data['dataP28'] = $query;
 		$query = $this->db->query("SELECT * from tbpenelitian where idDosen = '$id' and idLv3 ='IL30029'")->result();
 		$data['dataP29'] = $query;
		$this->load->view('pdf/lPenelitian',$data);
	}

	public function laporanPenunjang()
	{
		$this->load->library('mc_table');
		$id = $this->session->userdata('idDosen');
		$prodi = $this->session->userdata('prodi');
		// $bln = $this->input->get('bln');
		// $thn = $this->input->get('thn');
		$query = $this->db->query("SELECT * from tbdosen where jabatan = 'KAPRODI' and prodi ='$prodi'")->result();
 		$data['kajur'] = $query;
 		$query = $this->db->query("SELECT * from tbdosen where idDosen = '$id'")->result();
 		$data['profil'] = $query;

 		$query = $this->db->query("SELECT count(idPenunjang) AS id1A from tbpenunjang where idDosen = '$id' and idBagian ='P1'")->result();
 		$data['A1TA'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='1'")->result();
 		$data['A1'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id1 from tbpenunjang where idDosen = '$id' and idBag1 ='1'")->result();
 		$data['A1T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='2'")->result();
 		$data['A2'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id2 from tbpenunjang where idDosen = '$id' and idBag1 ='2'")->result();
 		$data['A2T'] = $query;

 		$query = $this->db->query("SELECT count(idPenunjang) AS id1B from tbpenunjang where idDosen = '$id' and idBagian ='P2'")->result();
 		$data['B1TB'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='3'")->result();
 		$data['B1'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id3 from tbpenunjang where idDosen = '$id' and idBag1 ='3'")->result();
 		$data['B1T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='4'")->result();
 		$data['B2'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id4 from tbpenunjang where idDosen = '$id' and idBag1 ='4'")->result();
 		$data['B2T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='5'")->result();
 		$data['B3'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id5 from tbpenunjang where idDosen = '$id' and idBag1 ='5'")->result();
 		$data['B3T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='6'")->result();
 		$data['B4'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id6 from tbpenunjang where idDosen = '$id' and idBag1 ='6'")->result();
 		$data['B4T'] = $query;

 		$query = $this->db->query("SELECT count(idPenunjang) AS id1C from tbpenunjang where idDosen = '$id' and idBagian ='P3'")->result();
 		$data['C1TC'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='7'")->result();
 		$data['C1'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id7 from tbpenunjang where idDosen = '$id' and idBag1 ='7'")->result();
 		$data['C1T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='8'")->result();
 		$data['C2'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id8 from tbpenunjang where idDosen = '$id' and idBag1 ='8'")->result();
 		$data['C2T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='9'")->result();
 		$data['C3'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id9 from tbpenunjang where idDosen = '$id' and idBag1 ='9'")->result();
 		$data['C3T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='10'")->result();
 		$data['C4'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id10 from tbpenunjang where idDosen = '$id' and idBag1 ='10'")->result();
 		$data['C4T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='11'")->result();
 		$data['C5'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id11 from tbpenunjang where idDosen = '$id' and idBag1 ='11'")->result();
 		$data['C5T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='12'")->result();
 		$data['C6'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id12 from tbpenunjang where idDosen = '$id' and idBag1 ='12'")->result();
 		$data['C6T'] = $query;
 		
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBagian ='P4'")->result();
 		$data['D'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id4D from tbpenunjang where idDosen = '$id' and idBagian ='P4'")->result();
 		$data['D1TD'] = $query;
 		
 		$query = $this->db->query("SELECT count(idPenunjang) AS id1E from tbpenunjang where idDosen = '$id' and idBagian ='P5'")->result();
 		$data['E1TE'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='13'")->result();
 		$data['E1'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id13 from tbpenunjang where idDosen = '$id' and idBag1 ='13'")->result();
 		$data['E1T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='14'")->result();
 		$data['E2'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id14 from tbpenunjang where idDosen = '$id' and idBag1 ='14'")->result();
 		$data['E2T'] = $query;
 		
 		$query = $this->db->query("SELECT count(idPenunjang) AS id1F from tbpenunjang where idDosen = '$id' and idBagian ='P6'")->result();
 		$data['F1TF'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='15'")->result();
 		$data['F1'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id15 from tbpenunjang where idDosen = '$id' and idBag1 ='15'")->result();
 		$data['F1T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='16'")->result();
 		$data['F2'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id16 from tbpenunjang where idDosen = '$id' and idBag1 ='16'")->result();
 		$data['F2T'] = $query;
 		
 		$query = $this->db->query("SELECT count(idPenunjang) AS id1G from tbpenunjang where idDosen = '$id' and idBagian ='P7'")->result();
 		$data['G1TG'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='17'")->result();
 		$data['G1'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id17 from tbpenunjang where idDosen = '$id' and idBag1 ='17'")->result();
 		$data['G1T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='18'")->result();
 		$data['G2'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id18 from tbpenunjang where idDosen = '$id' and idBag1 ='18'")->result();
 		$data['G2T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='19'")->result();
 		$data['G3'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id19 from tbpenunjang where idDosen = '$id' and idBag1 ='19'")->result();
 		$data['G3T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='20'")->result();
 		$data['G4'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id20 from tbpenunjang where idDosen = '$id' and idBag1 ='20'")->result();
 		$data['G4T'] = $query;
 		
 		$query = $this->db->query("SELECT count(idPenunjang) AS id1H from tbpenunjang where idDosen = '$id' and idBagian ='P8'")->result();
 		$data['H1TH'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='21'")->result();
 		$data['H1'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id21 from tbpenunjang where idDosen = '$id' and idBag1 ='21'")->result();
 		$data['H1T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='22'")->result();
 		$data['H2'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id22 from tbpenunjang where idDosen = '$id' and idBag1 ='22'")->result();
 		$data['H2T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='23'")->result();
 		$data['H3'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id23 from tbpenunjang where idDosen = '$id' and idBag1 ='23'")->result();
 		$data['H3T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='24'")->result();
 		$data['H4'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id24 from tbpenunjang where idDosen = '$id' and idBag1 ='24'")->result();
 		$data['H4T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='25'")->result();
 		$data['H5'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id25 from tbpenunjang where idDosen = '$id' and idBag1 ='25'")->result();
 		$data['H5T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='26'")->result();
 		$data['H6'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id26 from tbpenunjang where idDosen = '$id' and idBag1 ='26'")->result();
 		$data['H6T'] = $query;
 		
 		$query = $this->db->query("SELECT count(idPenunjang) AS id1I from tbpenunjang where idDosen = '$id' and idBagian ='P9'")->result();
 		$data['I1TI'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='27'")->result();
 		$data['I1'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id27 from tbpenunjang where idDosen = '$id' and idBag1 ='27'")->result();
 		$data['I1T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='28'")->result();
 		$data['I2'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id28 from tbpenunjang where idDosen = '$id' and idBag1 ='28'")->result();
 		$data['I2T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='29'")->result();
 		$data['I3'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id29 from tbpenunjang where idDosen = '$id' and idBag1 ='29'")->result();
 		$data['I3T'] = $query;
 		
 		$query = $this->db->query("SELECT count(idPenunjang) AS id1J from tbpenunjang where idDosen = '$id' and idBagian ='P10'")->result();
 		$data['J1TJ'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='30'")->result();
 		$data['J1'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id30 from tbpenunjang where idDosen = '$id' and idBag1 ='30'")->result();
 		$data['J1T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='31'")->result();
 		$data['J2'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id31 from tbpenunjang where idDosen = '$id' and idBag1 ='31'")->result();
 		$data['J2T'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBag1 ='32'")->result();
 		$data['J3'] = $query;
 		$query = $this->db->query("SELECT count(idPenunjang) AS id32 from tbpenunjang where idDosen = '$id' and idBag1 ='32'")->result();
 		$data['J3T'] = $query;
 		
 		$query = $this->db->query("SELECT count(idPenunjang) AS id1K from tbpenunjang where idDosen = '$id' and idBagian ='P11'")->result();
 		$data['K1TK'] = $query;
 		$query = $this->db->query("SELECT * from tbpenunjang where idDosen = '$id' and idBagian ='11'")->result();
 		$data['K'] = $query;

 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS totJum from tbpenunjang where idDosen = '$id'")->result();
 		$data['total'] = $query;
		
		$this->load->view('pdf/lPenunjang',$data);
	}

	public function laporanPengabdian()
	{
		$this->load->library('mc_table');
		$id = $this->session->userdata('idDosen');
		$prodi = $this->session->userdata('prodi');
		// $bln = $this->input->get('bln');
		// $thn = $this->input->get('thn');
		$query = $this->db->query("SELECT * from tbdosen where jabatan = 'KAPRODI' and prodi ='$prodi'")->result();
 		$data['kajur'] = $query;
 		$query = $this->db->query("SELECT * from tbdosen where idDosen = '$id'")->result();
 		$data['profil'] = $query;

 		$query = $this->db->query("SELECT count(idpengabdian) AS id1A from tbpengabdian where idDosen = '$id' and idBagian ='A1'")->result();
 		$data['A1TA'] = $query;
 		$query = $this->db->query("SELECT * from tbpengabdian where idDosen = '$id' and idBag1 ='43'")->result();
 		$data['A1'] = $query;

 		$query = $this->db->query("SELECT count(idpengabdian) AS id1B from tbpengabdian where idDosen = '$id' and idBagian ='A2'")->result();
 		$data['B1TB'] = $query;
 		$query = $this->db->query("SELECT * from tbpengabdian where idDosen = '$id' and idBag1 ='44'")->result();
 		$data['B1'] = $query;

 		$query = $this->db->query("SELECT count(idpengabdian) AS id1C from tbpengabdian where idDosen = '$id' and idBagian ='A3'")->result();
 		$data['C1TC'] = $query;
 		$query = $this->db->query("SELECT * from tbpengabdian where idDosen = '$id' and idBag1 ='33'")->result();
 		$data['C1'] = $query;
 		$query = $this->db->query("SELECT count(idpengabdian) AS id33 from tbpengabdian where idDosen = '$id' and idBag1 ='33'")->result();
 		$data['C1T'] = $query;
 		$query = $this->db->query("SELECT * from tbpengabdian where idDosen = '$id' and idBag1 ='34'")->result();
 		$data['C2'] = $query;
 		$query = $this->db->query("SELECT count(idpengabdian) AS id34 from tbpengabdian where idDosen = '$id' and idBag1 ='34'")->result();
 		$data['C2T'] = $query;
 		$query = $this->db->query("SELECT * from tbpengabdian where idDosen = '$id' and idBag1 ='35'")->result();
 		$data['C3'] = $query;
 		$query = $this->db->query("SELECT count(idpengabdian) AS id35 from tbpengabdian where idDosen = '$id' and idBag1 ='35'")->result();
 		$data['C3T'] = $query;
 		$query = $this->db->query("SELECT * from tbpengabdian where idDosen = '$id' and idBag1 ='36'")->result();
 		$data['C4'] = $query;
 		$query = $this->db->query("SELECT count(idpengabdian) AS id36 from tbpengabdian where idDosen = '$id' and idBag1 ='36'")->result();
 		$data['C4T'] = $query;
 		$query = $this->db->query("SELECT * from tbpengabdian where idDosen = '$id' and idBag1 ='37'")->result();
 		$data['C5'] = $query;
 		$query = $this->db->query("SELECT count(idpengabdian) AS id37 from tbpengabdian where idDosen = '$id' and idBag1 ='37'")->result();
 		$data['C5T'] = $query;
 		$query = $this->db->query("SELECT * from tbpengabdian where idDosen = '$id' and idBag1 ='38'")->result();
 		$data['C6'] = $query;
 		$query = $this->db->query("SELECT count(idpengabdian) AS id38 from tbpengabdian where idDosen = '$id' and idBag1 ='38'")->result();
 		$data['C6T'] = $query;
 		$query = $this->db->query("SELECT * from tbpengabdian where idDosen = '$id' and idBag1 ='39'")->result();
 		$data['C7'] = $query;
 		$query = $this->db->query("SELECT count(idpengabdian) AS id39 from tbpengabdian where idDosen = '$id' and idBag1 ='39'")->result();
 		$data['C7T'] = $query;
 		
 		$query = $this->db->query("SELECT count(idpengabdian) AS id4D from tbpengabdian where idDosen = '$id' and idBagian ='A4'")->result();
 		$data['D1TD'] = $query;
 		$query = $this->db->query("SELECT * from tbpengabdian where idDosen = '$id' and idBag1 ='40'")->result();
 		$data['D1'] = $query;
 		$query = $this->db->query("SELECT count(idpengabdian) AS id40 from tbpengabdian where idDosen = '$id' and idBag1 ='40'")->result();
 		$data['D1T'] = $query;
 		$query = $this->db->query("SELECT * from tbpengabdian where idDosen = '$id' and idBag1 ='41'")->result();
 		$data['D2'] = $query;
 		$query = $this->db->query("SELECT count(idpengabdian) AS id41 from tbpengabdian where idDosen = '$id' and idBag1 ='41'")->result();
 		$data['D2T'] = $query;
 		$query = $this->db->query("SELECT * from tbpengabdian where idDosen = '$id' and idBag1 ='42'")->result();
 		$data['D3'] = $query;
 		$query = $this->db->query("SELECT count(idpengabdian) AS id42 from tbpengabdian where idDosen = '$id' and idBag1 ='42'")->result();
 		$data['D3T'] = $query;
 		
 		$query = $this->db->query("SELECT count(idpengabdian) AS id1E from tbpengabdian where idDosen = '$id' and idBagian ='A5'")->result();
 		$data['E1TE'] = $query;
 		$query = $this->db->query("SELECT * from tbpengabdian where idDosen = '$id' and idBag1 ='45'")->result();
 		$data['E1'] = $query;
 		$query = $this->db->query("SELECT count(idpengabdian) AS id45 from tbpengabdian where idDosen = '$id' and idBag1 ='45'")->result();
 		$data['E1T'] = $query;
 		
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS totJum from tbpengabdian where idDosen = '$id'")->result();
 		$data['total'] = $query;

		$this->load->view('pdf/lPengabdian',$data);
	}

	public function laporanPengajaran()
	{
		$this->load->library('mc_table');
		$id = $this->session->userdata('idDosen');
		$prodi = $this->session->userdata('prodi');
		// $bln = $this->input->get('bln');
		// $thn = $this->input->get('thn');
		$query = $this->db->query("SELECT * from tbdosen where jabatan = 'KAPRODI' and prodi ='$prodi'")->result();
 		$data['kajur'] = $query;
 		$query = $this->db->query("SELECT * from tbdosen where idDosen = '$id'")->result();
 		$data['profil'] = $query;
 		//level 1
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv1 ='IL0009'")->result();
 		$data['CL101'] = $query;
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv1 ='IL0010'")->result();
 		$data['CL102'] = $query;
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv1 ='IL0014'")->result();
 		$data['CL103'] = $query;
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv1 ='IL0015'")->result();
 		$data['CL104'] = $query;
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv1 ='IL0018'")->result();
 		$data['CL105'] = $query;
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv1 ='IL0020'")->result();
 		$data['CL106'] = $query;
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv1 ='IL0021'")->result();
 		$data['CL107'] = $query;
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv1 ='IL0022'")->result();
 		$data['CL108'] = $query;
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv1 ='IL0023'")->result();
 		$data['CL109'] = $query;
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv1 ='IL0011'")->result();
 		$data['CL110'] = $query;
 		//level 2
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv2 ='IL20026'")->result();
 		$data['CL201'] = $query;
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv2 ='IL20027'")->result();
 		$data['CL202'] = $query;
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv2 ='IL20021'")->result();
 		$data['CL203'] = $query;
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv2 ='IL20022'")->result();
 		$data['CL204'] = $query;
		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv2 ='IL20023'")->result();
 		$data['CL205'] = $query;
 		//level 3
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30033'")->result();
 		$data['CL304'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30034'")->result();
 		$data['CL305'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30035'")->result();
 		$data['CL306'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30036'")->result();
 		$data['CL307'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30037'")->result();
 		$data['CL308'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30038'")->result();
 		$data['CL309'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30039'")->result();
 		$data['CL310'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30040'")->result();
 		$data['CL311'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30041'")->result();
 		$data['CL312'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30042'")->result();
 		$data['CL313'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30043'")->result();
 		$data['CL314'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30044'")->result();
 		$data['CL315'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30045'")->result();
 		$data['CL316'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30046'")->result();
 		$data['CL317'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30047'")->result();
 		$data['CL318'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30048'")->result();
 		$data['CL319'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30049'")->result();
 		$data['CL320'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30050'")->result();
 		$data['CL321'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30051'")->result();
 		$data['CL322'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30052'")->result();
 		$data['CL323'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30053'")->result();
 		$data['CL324'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30054'")->result();
 		$data['CL325'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30055'")->result();
 		$data['CL326'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30056'")->result();
 		$data['CL327'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30057'")->result();
 		$data['CL328'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30058'")->result();
 		$data['CL329'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30059'")->result();
 		$data['CL330'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30060'")->result();
 		$data['CL331'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30061'")->result();
 		$data['CL332'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30062'")->result();
 		$data['CL333'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30063'")->result();
 		$data['CL334'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30064'")->result();
 		$data['CL335'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30065'")->result();
 		$data['CL336'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30066'")->result();
 		$data['CL337'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30067'")->result();
 		$data['CL338'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30068'")->result();
 		$data['CL339'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30069'")->result();
 		$data['CL340'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30070'")->result();
 		$data['CL341'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30071'")->result();
 		$data['CL342'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30072'")->result();
 		$data['CL343'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30073'")->result();
 		$data['CL344'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30074'")->result();
 		$data['CL345'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30075'")->result();
 		$data['CL346'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30076'")->result();
 		$data['CL347'] = $query;
 		$query = $this->db->query("SELECT count(idPengajaran) AS id1A from tbpengajaran where idDosen = '$id' and idLv3 ='IL30077'")->result();
 		$data['CL348'] = $query;
 		//data
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30030'")->result();
 		$data['dataP1'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30031'")->result();
 		$data['dataP2'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30032'")->result();
 		$data['dataP3'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv2 ='IL20021' ORDER BY tglPengajaran ASC")->result();
 		$data['dataP4'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv2 ='IL20022' ORDER BY tglPengajaran ASC")->result();
 		$data['dataP5'] = $query;
 		// $query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30033'")->result();
 		// $data['dataP4'] = $query;
 		// $query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30034'")->result();
 		// $data['dataP5'] = $query;
 		// $query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30035'")->result();
 		// $data['dataP6'] = $query;
 		// $query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30036'")->result();
 		// $data['dataP7'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30037'")->result();
 		$data['dataP8'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30038'")->result();
 		$data['dataP9'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30039'")->result();
 		$data['dataP10'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30040'")->result();
 		$data['dataP11'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30041'")->result();
 		$data['dataP12'] = $query;

 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30042'")->result();
 		$data['dataP13'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30043'")->result();
 		$data['dataP14'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30044'")->result();
 		$data['dataP15'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30045'")->result();
 		$data['dataP16'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30046'")->result();
 		$data['dataP17'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30047'")->result();
 		$data['dataP18'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30048'")->result();
 		$data['dataP19'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30049'")->result();
 		$data['dataP20'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30050'")->result();
 		$data['dataP21'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30051'")->result();
 		$data['dataP22'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30052'")->result();
 		$data['dataP23'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30053'")->result();
 		$data['dataP24'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30054'")->result();
 		$data['dataP25'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30055'")->result();
 		$data['dataP26'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30056'")->result();
 		$data['dataP27'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30057'")->result();
 		$data['dataP28'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30058'")->result();
 		$data['dataP29'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30059'")->result();
 		$data['dataP30'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30060'")->result();
 		$data['dataP31'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30061'")->result();
 		$data['dataP32'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30062'")->result();
 		$data['dataP33'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30063'")->result();
 		$data['dataP34'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30064'")->result();
 		$data['dataP35'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30065'")->result();
 		$data['dataP36'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30066'")->result();
 		$data['dataP37'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30067'")->result();
 		$data['dataP38'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30068'")->result();
 		$data['dataP39'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30069'")->result();
 		$data['dataP40'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30070'")->result();
 		$data['dataP41'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30071'")->result();
 		$data['dataP42'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30072'")->result();
 		$data['dataP43'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30073'")->result();
 		$data['dataP44'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30074'")->result();
 		$data['dataP45'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30075'")->result();
 		$data['dataP46'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30076'")->result();
 		$data['dataP47'] = $query;
 		$query = $this->db->query("SELECT * from tbpengajaran where idDosen = '$id' and idLv3 ='IL30077'")->result();
 		$data['dataP48'] = $query;
		$this->load->view('pdf/lPengajaran1',$data);
	}

	public function cetakDupak($id)
	{
		$this->load->library('mc_table');
		$id1 = $this->session->userdata('idDosen');
		$prodi = $this->session->userdata('prodi');
		// $thn = $this->input->get('thn');
		$data['ketuapenguji'] = $this->input->post('ketTim');
		$data['nip'] = $this->input->post('nip');
		$query = $this->db->query("SELECT * from tbdosen where jabatan = 'KETUA'")->result();
 		$data['ketua'] = $query;
		$query = $this->db->query("SELECT * from tbdosen where jabatan = 'KAPRODI' and prodi ='$prodi'")->result();
 		$data['kajur'] = $query;
 		$query = $this->db->query("SELECT * from tbdosen INNER JOIN tbdupak ON tbdupak.idDosen = tbdosen.idDosen where tbdupak.id = '$id'")->result();
 		$data['profil'] = $query;
 		//pengajaran
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30030'")->result();
 		$data['dataP1'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30031'")->result();
 		$data['dataP2'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv1 ='IL0010'")->result();
 		$data['dataP3'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv1 ='IL0011'")->result();
 		$data['dataP4'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv1 ='IL0012'")->result();
 		$data['dataP5'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv1 ='IL0013'")->result();
 		$data['dataP6'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30044'")->result();
 		$data['dataP7'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30045'")->result();
 		$data['dataP8'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30046'")->result();
 		$data['dataP9'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30047'")->result();
 		$data['dataP10'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30048'")->result();
 		$data['dataP11'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30049'")->result();
 		$data['dataP12'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30050'")->result();
 		$data['dataP13'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30051'")->result();
 		$data['dataP14'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20028'")->result();
 		$data['dataP15'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20029'")->result();
 		$data['dataP16'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv1 ='IL0016'")->result();
 		$data['dataP17'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv1 ='IL0017'")->result();
 		$data['dataP18'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20032'")->result();
 		$data['dataP19'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20033'")->result();
 		$data['dataP20'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv1 ='IL0019'")->result();
 		$data['dataP21'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20035'")->result();
 		$data['dataP22'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20036'")->result();
 		$data['dataP23'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20037'")->result();
 		$data['dataP24'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20038'")->result();
 		$data['dataP25'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20039'")->result();
 		$data['dataP26'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20040'")->result();
 		$data['dataP27'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20041'")->result();
 		$data['dataP28'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20042'")->result();
 		$data['dataP29'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20043'")->result();
 		$data['dataP30'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20044'")->result();
 		$data['dataP31'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20045'")->result();
 		$data['dataP32'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20046'")->result();
 		$data['dataP33'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20047'")->result();
 		$data['dataP34'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20048'")->result();
 		$data['dataP35'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20049'")->result();
 		$data['dataP36'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20050'")->result();
 		$data['dataP37'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20051'")->result();
 		$data['dataP38'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20052'")->result();
 		$data['dataP39'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20053'")->result();
 		$data['dataP40'] = $query;
		//penelitian
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30001'")->result();
 		$data['dataP41'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30002'")->result();
 		$data['dataP42'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30003'")->result();
 		$data['dataP43'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30004'")->result();
 		$data['dataP44'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv2 ='IL20003'")->result();
 		$data['dataP45'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30016'")->result();
 		$data['dataP46'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30017'")->result();
 		$data['dataP47'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30014'")->result();
 		$data['dataP48'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30015'")->result();
 		$data['dataP49'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv2 ='IL20008'")->result();
 		$data['dataP50'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv1 ='IL0003'")->result();
 		$data['dataP51'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv1 ='IL0004'")->result();
 		$data['dataP52'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv1 ='IL0005'")->result();
 		$data['dataP53'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv2 ='IL20009'")->result();
 		$data['dataP54'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv2 ='IL20010'")->result();
 		$data['dataP55'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv2 ='IL20011'")->result();
 		$data['dataP56'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv2 ='IL20012'")->result();
 		$data['dataP57'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv2 ='IL20013'")->result();
 		$data['dataP58'] = $query;
 		//pengabdian
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBagian ='A1'")->result();
 		$data['dataP59'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBagian ='A2'")->result();
 		$data['dataP60'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='33'")->result();
 		$data['dataP61'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='34'")->result();
 		$data['dataP62'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='35'")->result();
 		$data['dataP63'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='36'")->result();
 		$data['dataP64'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='37'")->result();
 		$data['dataP65'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='38'")->result();
 		$data['dataP66'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='39'")->result();
 		$data['dataP67'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='40'")->result();
 		$data['dataP68'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='41'")->result();
 		$data['dataP69'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='42'")->result();
 		$data['dataP70'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBagian ='A5'")->result();
 		$data['dataP71'] = $query;
 		//penunjang
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='1'")->result();
 		$data['dataP72'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='2'")->result();
 		$data['dataP73'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='3'")->result();
 		$data['dataP74'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='4'")->result();
 		$data['dataP75'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='5'")->result();
 		$data['dataP76'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='6'")->result();
 		$data['dataP77'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='7'")->result();
 		$data['dataP78'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='8'")->result();
 		$data['dataP79'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='9'")->result();
 		$data['dataP80'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='10'")->result();
 		$data['dataP81'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='11'")->result();
 		$data['dataP82'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='12'")->result();
 		$data['dataP83'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBagian ='P4'")->result();
 		$data['dataP84'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='13'")->result();
 		$data['dataP85'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='14'")->result();
 		$data['dataP86'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='17'")->result();
 		$data['dataP87'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='18'")->result();
 		$data['dataP88'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='19'")->result();
 		$data['dataP89'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='20'")->result();
 		$data['dataP90'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='21'")->result();
 		$data['dataP91'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='22'")->result();
 		$data['dataP92'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='23'")->result();
 		$data['dataP93'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='24'")->result();
 		$data['dataP94'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='25'")->result();
 		$data['dataP95'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='26'")->result();
 		$data['dataP96'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='27'")->result();
 		$data['dataP97'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='28'")->result();
 		$data['dataP98'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='29'")->result();
 		$data['dataP99'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='30'")->result();
 		$data['dataP100'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='31'")->result();
 		$data['dataP101'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='33'")->result();
 		$data['dataP102'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBagian ='P11'")->result();
 		$data['dataP103'] = $query;
		$this->load->view('pdf/lDupak',$data);
	}

	public function cetakDupak1($id)
	{
		$this->load->library('mc_table');
		$id1 = $this->session->userdata('idDosen');
		$prodi = $this->session->userdata('prodi');
		// $thn = $this->input->get('thn');
		$data['ketuapenguji'] = $this->input->post('ketTim');
		$data['nip'] = $this->input->post('nip');
		$query = $this->db->query("SELECT * from tbdosen where jabatan = 'KETUA'")->result();
 		$data['ketua'] = $query;
		$query = $this->db->query("SELECT * from tbdosen where jabatan = 'KAPRODI' and prodi ='$prodi'")->result();
 		$data['kajur'] = $query;
 		$query = $this->db->query("SELECT * from tbdosen INNER JOIN tbdupak ON tbdupak.idDosen = tbdosen.idDosen where tbdupak.id = '$id'")->result();
 		$data['profil'] = $query;
 		//pengajaran
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30030'")->result();
 		$data['dataP1'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30031'")->result();
 		$data['dataP2'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv1 ='IL0010'")->result();
 		$data['dataP3'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv1 ='IL0011'")->result();
 		$data['dataP4'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv1 ='IL0012'")->result();
 		$data['dataP5'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv1 ='IL0013'")->result();
 		$data['dataP6'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30044'")->result();
 		$data['dataP7'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30045'")->result();
 		$data['dataP8'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30046'")->result();
 		$data['dataP9'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30047'")->result();
 		$data['dataP10'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30048'")->result();
 		$data['dataP11'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30049'")->result();
 		$data['dataP12'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30050'")->result();
 		$data['dataP13'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv3 ='IL30051'")->result();
 		$data['dataP14'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20028'")->result();
 		$data['dataP15'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20029'")->result();
 		$data['dataP16'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv1 ='IL0016'")->result();
 		$data['dataP17'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv1 ='IL0017'")->result();
 		$data['dataP18'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20032'")->result();
 		$data['dataP19'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20033'")->result();
 		$data['dataP20'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv1 ='IL0019'")->result();
 		$data['dataP21'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20035'")->result();
 		$data['dataP22'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20036'")->result();
 		$data['dataP23'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20037'")->result();
 		$data['dataP24'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20038'")->result();
 		$data['dataP25'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20039'")->result();
 		$data['dataP26'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20040'")->result();
 		$data['dataP27'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20041'")->result();
 		$data['dataP28'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20042'")->result();
 		$data['dataP29'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20043'")->result();
 		$data['dataP30'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20044'")->result();
 		$data['dataP31'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20045'")->result();
 		$data['dataP32'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20046'")->result();
 		$data['dataP33'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20047'")->result();
 		$data['dataP34'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20048'")->result();
 		$data['dataP35'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20049'")->result();
 		$data['dataP36'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20050'")->result();
 		$data['dataP37'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20051'")->result();
 		$data['dataP38'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20052'")->result();
 		$data['dataP39'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengajaran where idDosen = '$id1' and idLv2 ='IL20053'")->result();
 		$data['dataP40'] = $query;
		//penelitian
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30001'")->result();
 		$data['dataP41'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30002'")->result();
 		$data['dataP42'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30003'")->result();
 		$data['dataP43'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30004'")->result();
 		$data['dataP44'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv2 ='IL20003'")->result();
 		$data['dataP45'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30016'")->result();
 		$data['dataP46'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30017'")->result();
 		$data['dataP47'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30014'")->result();
 		$data['dataP48'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv3 ='IL30015'")->result();
 		$data['dataP49'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv2 ='IL20008'")->result();
 		$data['dataP50'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv1 ='IL0003'")->result();
 		$data['dataP51'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv1 ='IL0004'")->result();
 		$data['dataP52'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv1 ='IL0005'")->result();
 		$data['dataP53'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv2 ='IL20009'")->result();
 		$data['dataP54'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv2 ='IL20010'")->result();
 		$data['dataP55'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv2 ='IL20011'")->result();
 		$data['dataP56'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv2 ='IL20012'")->result();
 		$data['dataP57'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenelitian where idDosen = '$id1' and idLv2 ='IL20013'")->result();
 		$data['dataP58'] = $query;
 		//pengabdian
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBagian ='A1'")->result();
 		$data['dataP59'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBagian ='A2'")->result();
 		$data['dataP60'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='33'")->result();
 		$data['dataP61'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='34'")->result();
 		$data['dataP62'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='35'")->result();
 		$data['dataP63'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='36'")->result();
 		$data['dataP64'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='37'")->result();
 		$data['dataP65'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='38'")->result();
 		$data['dataP66'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='39'")->result();
 		$data['dataP67'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='40'")->result();
 		$data['dataP68'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='41'")->result();
 		$data['dataP69'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBag1 ='42'")->result();
 		$data['dataP70'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpengabdian where idDosen = '$id1' and idBagian ='A5'")->result();
 		$data['dataP71'] = $query;
 		//penunjang
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='1'")->result();
 		$data['dataP72'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='2'")->result();
 		$data['dataP73'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='3'")->result();
 		$data['dataP74'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='4'")->result();
 		$data['dataP75'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='5'")->result();
 		$data['dataP76'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='6'")->result();
 		$data['dataP77'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='7'")->result();
 		$data['dataP78'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='8'")->result();
 		$data['dataP79'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='9'")->result();
 		$data['dataP80'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='10'")->result();
 		$data['dataP81'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='11'")->result();
 		$data['dataP82'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='12'")->result();
 		$data['dataP83'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBagian ='P4'")->result();
 		$data['dataP84'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='13'")->result();
 		$data['dataP85'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='14'")->result();
 		$data['dataP86'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='17'")->result();
 		$data['dataP87'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='18'")->result();
 		$data['dataP88'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='19'")->result();
 		$data['dataP89'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='20'")->result();
 		$data['dataP90'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='21'")->result();
 		$data['dataP91'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='22'")->result();
 		$data['dataP92'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='23'")->result();
 		$data['dataP93'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='24'")->result();
 		$data['dataP94'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='25'")->result();
 		$data['dataP95'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='26'")->result();
 		$data['dataP96'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='27'")->result();
 		$data['dataP97'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='28'")->result();
 		$data['dataP98'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='29'")->result();
 		$data['dataP99'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='30'")->result();
 		$data['dataP100'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='31'")->result();
 		$data['dataP101'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBag1 ='33'")->result();
 		$data['dataP102'] = $query;
 		$query = $this->db->query("SELECT SUM(jumAngkaKredit) AS total from tbpenunjang where idDosen = '$id1' and idBagian ='P11'")->result();
 		$data['dataP103'] = $query;
		$this->load->view('pdf/lDupak1',$data);
	}

	public function laporanRekapPenunjang()
	{
		$this->load->library('mc_table');
		$prodi = $this->session->userdata('prodi');
		$query = $this->db->query("SELECT * from tbdosen where pengguna = 'admin'")->result();
 		$data['kajur'] = $query;
		$query = $this->db->query("SELECT * from tbpenunjang INNER JOIN tbdosen ON tbdosen.idDosen = tbpenunjang.idDosen inner join tbbagian on tbbagian.idBagian = tbpenunjang.idBagian inner join tbbagian1 on tbbagian1.idBag1 = tbpenunjang.idBag1 order by tbdosen.nama asc")->result();
 		$data['penunjang'] = $query;
		$this->load->view('pdf/lRekapPenunjang',$data);
	}

	public function laporanRekapPengabdian()
	{
		$this->load->library('mc_table');
		$prodi = $this->session->userdata('prodi');
		$query = $this->db->query("SELECT * from tbdosen where pengguna = 'admin'")->result();
 		$data['kajur'] = $query;
		$query = $this->db->query("SELECT * from tbpengabdian INNER JOIN tbdosen ON tbdosen.idDosen = tbpengabdian.idDosen inner join tbbagian on tbbagian.idBagian = tbpengabdian.idBagian inner join tbbagian1 on tbbagian1.idBag1 = tbpengabdian.idBag1 order by tbdosen.nama asc")->result();
 		$data['pengabdian'] = $query;
		$this->load->view('pdf/lRekapPengabdian',$data);
	}

	public function laporanRekapPenelitian()
	{
		$this->load->library('mc_table');
		$prodi = $this->session->userdata('prodi');
		$query = $this->db->query("SELECT * from tbdosen where pengguna = 'admin'")->result();
 		$data['kajur'] = $query;
		$query = $this->db->query("SELECT * from tbpenelitian INNER JOIN tbdosen ON tbdosen.idDosen = tbpenelitian.idDosen inner join tblv1 on tblv1.idLv1 = tbpenelitian.idLv1 inner join tblv2 on tbLv2.idLv2 = tbpenelitian.idLv2 inner join tblv3 on tbLv3.idLv3 = tbpenelitian.idLv3 order by tbdosen.nama asc")->result();
 		$data['penelitian'] = $query;
		$this->load->view('pdf/lrekapPenelitian',$data);
	}

	public function laporanRekapPengajaran()
	{
		$this->load->library('mc_table');
		$prodi = $this->session->userdata('prodi');
		$query = $this->db->query("SELECT * from tbdosen where pengguna = 'admin'")->result();
 		$data['kajur'] = $query;
		$query = $this->db->query("SELECT * from tbpengajaran INNER JOIN tbdosen ON tbdosen.idDosen = tbpengajaran.idDosen inner join tblv1 on tblv1.idLv1 = tbpengajaran.idLv1 inner join tblv2 on tbLv2.idLv2 = tbpengajaran.idLv2 inner join tblv3 on tbLv3.idLv3 = tbpengajaran.idLv3 order by tbdosen.nama asc")->result();
 		$data['pengajaran'] = $query;
		$this->load->view('pdf/lRekapPengajaran',$data);
	}
//END PDF///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
