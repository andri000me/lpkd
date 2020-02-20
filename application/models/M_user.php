<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

    //login
    public $penguna_sandi;
    public $idDosen;
    //indosen
    public $kode;
    public $nidn;
    public $nama;
    public $noseri;
    public $tempat;
    public $tgl;
    public $jk;
    public $notelp;
    public $status;
    public $jabatan;
    public $bagian;

    public $labels =[];

    public function __cnstruct(){
        parent::__cnstruct();
        $this->labels = $this->_atributeLabels();
        //memuat library database
        $this->load->database();
    }

    public function ceklogin(){
        // $sql = sprintf("select count(*) as cnt from tbdosen where userName = '%s' and pass = '%s'",
        //     $this->idDosen,
        //     $this->penguna_sandi
        //     );
        // $query = $this->db->query($sql);
        // $row = $query->row_array();
        // return $row ['cnt'] == 1 ;
        $sql = $this->db->query("SELECT * FROM tbdosen WHERE userName = '%s' and pass = '%s'",
            $this->idDosen,
            $this->penguna_sandi
            );
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function hakAkses(){
        $where=array(
            'userName'=>$_POST['nip'],
            'pass'=>$_POST['password']
            );
        $this->db->select('*');
        $this->db->from('tbdosen');
        $this->db->where($where);
        $q = $this->db->get();
        return $q->result();

        if($$q->num_rows() > 0)
            return $$q->row_array();
        return false;
    }

    public function cekJabatan1($id){
        $where=array(
            'jabatan'=>$_POST['jabatan'],
            'prodi'=>$_POST['prodi']
            // 'idDosen'<>$id
            );
        $this->db->select('*');
        $this->db->from('tbdosen');
        $this->db->where($where);
        $q = $this->db->get();
        return $q->result();
        if($$q->num_rows() > 0)
            return $$q->row_array();
        return false;
    }

    public function cekJabatan2($id){
        $where=array(
            'jabatan'=>$_POST['jabatan'],
            'prodi'=>$_POST['prodi']
            // 'idDosen'<>$id
            );
        $this->db->select('*');
        $this->db->from('tbdosen');
        $this->db->where($where);
        $q = $this->db->get();
        return $q->result();
        if($$q->num_rows() > 0)
            return $$q->row_array();
        return false;
    }

    public function cekJabatan($id){
        $where=array(
            'jabatan'=>$_POST['jabatan'],
            'prodi'=>$_POST['prodi'],
            'idDosen'<>$id
            );
        $this->db->select('*');
        $this->db->from('tbdosen');
        $this->db->where($where);
        $q = $this->db->get();
        return $q->result();
        if($$q->num_rows() > 0)
            return $$q->row_array();
        return false;
    }

    public function cekBagian($id){
        // $where=array(
        //     'pengguna'=>$_POST['bagian']
        //     // 'idDosen'<>$id
        //     );
        // $this->db->select('*');
        // $this->db->from('tbdosen');
        // $this->db->where($where);
        // $q = $this->db->get();
        // return $q->result();
        $pengguna = $_POST['bagian'];
        $query = "SELECT * FROM tbdosen where idDosen <> '$id' and pengguna = '$pengguna'"; // Query untuk menampilkan semua data siswa
        
        $q = $this->db->query($query)->result();
        return $q;

        if($$q->num_rows() > 0)
            return $$q->row_array();
        return false;
    }

    public function cekJabatanIn(){
        $where=array(
            'jabatan'=>$_POST['jabatan'],
            'prodi'=>$_POST['prodi']
            );
        $this->db->select('*');
        $this->db->from('tbdosen');
        $this->db->where($where);
        $q = $this->db->get();
        return $q->result();
        // $jab = $this->db->escape($post['jabatan']);
        // // $id = $this->session->userdata('idDosen');
        // $query = $this->db->query("SELECT * from tbdosen where jabatan = $jab and idDosen <> '$id'")->result();
        // $q = $query;
        if($$q->num_rows() > 0)
            return $$q->row_array();
        return false;
    }

    public function cekJabatanIn1(){
        $where=array(
            'jabatan'=>$_POST['jabatan']
            );
        $this->db->select('*');
        $this->db->from('tbdosen');
        $this->db->where($where);
        $q = $this->db->get();
        return $q->result();
        // $jab = $this->db->escape($post['jabatan']);
        // // $id = $this->session->userdata('idDosen');
        // $query = $this->db->query("SELECT * from tbdosen where jabatan = $jab and idDosen <> '$id'")->result();
        // $q = $query;
        if($$q->num_rows() > 0)
            return $$q->row_array();
        return false;
    }
public function cekBagianIn(){
        $where=array(
            'pengguna'=>$_POST['bagian']
            );
        $this->db->select('*');
        $this->db->from('tbdosen');
        $this->db->where($where);
        $q = $this->db->get();
        return $q->result();

        if($$q->num_rows() > 0)
            return $$q->row_array();
        return false;
    }

    public function totalPenunjang($tahun){
        // $query = "SELECT * FROM tbdosen where nama like '%$ringkasan%' order by nama asc";
        $this->db->select('thn');
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenunjang');
        $this->db->like('thn',$tahun-9);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPengabdian($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengabdian');
        $this->db->like('thn',$tahun-9);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenelitian($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenelitian');
        $this->db->like('thn',$tahun-9);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPendidikan($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengajaran');
        $this->db->like('thn',$tahun-9);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenunjang2($tahun){
        // $query = "SELECT * FROM tbdosen where nama like '%$ringkasan%' order by nama asc";
        $this->db->select('thn');
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenunjang');
        $this->db->like('thn',$tahun-8);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPengabdian2($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengabdian');
        $this->db->like('thn',$tahun-8);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenelitian2($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenelitian');
        $this->db->like('thn',$tahun-8);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPendidikan2($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengajaran');
        $this->db->like('thn',$tahun-8);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenunjang3($tahun){
        // $query = "SELECT * FROM tbdosen where nama like '%$ringkasan%' order by nama asc";
        $this->db->select('thn');
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenunjang');
        $this->db->like('thn',$tahun-7);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPengabdian3($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengabdian');
        $this->db->like('thn',$tahun-7);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenelitian3($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenelitian');
        $this->db->like('thn',$tahun-7);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPendidikan3($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengajaran');
        $this->db->like('thn',$tahun-7);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenunjang4($tahun){
        // $query = "SELECT * FROM tbdosen where nama like '%$ringkasan%' order by nama asc";
        $this->db->select('thn');
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenunjang');
        $this->db->like('thn',$tahun-6);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPengabdian4($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengabdian');
        $this->db->like('thn',$tahun-6);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenelitian4($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenelitian');
        $this->db->like('thn',$tahun-6);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPendidikan4($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengajaran');
        $this->db->like('thn',$tahun-6);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenunjang5($tahun){
        // $query = "SELECT * FROM tbdosen where nama like '%$ringkasan%' order by nama asc";
        $this->db->select('thn');
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenunjang');
        $this->db->like('thn',$tahun-5);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPengabdian5($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengabdian');
        $this->db->like('thn',$tahun-5);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenelitian5($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenelitian');
        $this->db->like('thn',$tahun-5);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPendidikan5($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengajaran');
        $this->db->like('thn',$tahun-5);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenunjang6($tahun){
        // $query = "SELECT * FROM tbdosen where nama like '%$ringkasan%' order by nama asc";
        $this->db->select('thn');
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenunjang');
        $this->db->like('thn',$tahun-4);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPengabdian6($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengabdian');
        $this->db->like('thn',$tahun-4);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenelitian6($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenelitian');
        $this->db->like('thn',$tahun-4);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPendidikan6($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengajaran');
        $this->db->like('thn',$tahun-4);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenunjang7($tahun){
        // $query = "SELECT * FROM tbdosen where nama like '%$ringkasan%' order by nama asc";
        $this->db->select('thn');
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenunjang');
        $this->db->like('thn',$tahun-3);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPengabdian7($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengabdian');
        $this->db->like('thn',$tahun-3);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenelitian7($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenelitian');
        $this->db->like('thn',$tahun-3);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPendidikan7($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengajaran');
        $this->db->like('thn',$tahun-3);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenunjang8($tahun){
        // $query = "SELECT * FROM tbdosen where nama like '%$ringkasan%' order by nama asc";
        $this->db->select('thn');
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenunjang');
        $this->db->like('thn',$tahun-2);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPengabdian8($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengabdian');
        $this->db->like('thn',$tahun-2);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenelitian8($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenelitian');
        $this->db->like('thn',$tahun-2);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPendidikan8($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengajaran');
        $this->db->like('thn',$tahun-2);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenunjang9($tahun){
        // $query = "SELECT * FROM tbdosen where nama like '%$ringkasan%' order by nama asc";
        $this->db->select('thn');
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenunjang');
        $this->db->like('thn',$tahun-1);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPengabdian9($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengabdian');
        $this->db->like('thn',$tahun-1);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenelitian9($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenelitian');
        $this->db->like('thn',$tahun-1);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPendidikan9($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengajaran');
        $this->db->like('thn',$tahun-1);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenunjang10($tahun){
        // $query = "SELECT * FROM tbdosen where nama like '%$ringkasan%' order by nama asc";
        $this->db->select('thn');
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenunjang');
        $this->db->like('thn',$tahun);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPengabdian10($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengabdian');
        $this->db->like('thn',$tahun);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPenelitian10($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenelitian');
        $this->db->like('thn',$tahun);
        $query = $this->db->get();
        return $query->result();
    }

    public function totalPendidikan10($tahun){
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengajaran');
        $this->db->like('thn',$tahun);
        $query = $this->db->get();
        return $query->result();
    }

    public function sumPenunjang(){
        $where=array(
            'tbpenunjang.idDosen'=>$this->session->userdata('idDosen')
            );
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenunjang');
        $this->db->WHERE($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function sumPengabdian(){
        $where=array(
            'tbpengabdian.idDosen'=>$this->session->userdata('idDosen')
            );
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengabdian');
        $this->db->WHERE($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function sumPenelitian(){
        $where=array(
            'tbpenelitian.idDosen'=>$this->session->userdata('idDosen')
            );
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpenelitian');
        $this->db->WHERE($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function sumPendidikan(){
        $where=array(
            'tbpengajaran.idDosen'=>$this->session->userdata('idDosen')
            );
        $this->db->select_sum('jumAngkaKredit','jumlah');
        $this->db->FROM('tbpengajaran');
        $this->db->WHERE($where);
        $query = $this->db->get();
        return $query->result();
    }

    function code_otomatismatkul(){
            $this->db->select('Right(tbmatkul.idMatkul,4) as kode ',false);
            $this->db->order_by('idMatkul', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('tbmatkul');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            $kodejadi  = "MK-".$kodemax;
            return $kodejadi;
    }

    public function updateAkun(){
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $password_old   = $_POST['passLama']; //Password lama
        $password_new   = $_POST['passBaru']; //Password baru
        $password_conf  = $_POST['passVeri']; //Konfirmasi password
        $where=$this->session->userdata('idDosen');

        $sql = $this->db->query("UPDATE tbdosen SET pass = '$password_conf' WHERE idDosen = '$where'");

        if($sql)
            return true;
        return false;
    }

    public function read_akun_dosen(){
        // $sql = "SELECT * FROM tbpetugas ORDER BY idPetugas";
        $this->db->SELECT('*');
        $this->db->FROM('tbdosen');
        // $this->db->join('tbmatkul',
        //     'tbmatkul.idMatkul = tbpetugas.idMatkul');
        $query = $this->db->get();
        return $query->result();
    }

    public function read_dosen1($ringkasan){
        $this->load->library('pagination'); // Load librari paginationnya
        
        $query = "SELECT * FROM tbdosen where nama like '%$ringkasan%' order by nama asc"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/loadDosen');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

    function code_otomatis(){
            $this->db->select('Right(tbdosen.idDosen,4) as kode ',false);
            $this->db->order_by('idDosen', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('tbdosen');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            $kodejadi  = "DS-A-".$kodemax;
            return $kodejadi;
    }

    public function get_bagian()
        {
            $hasil=$this->db->query("SELECT * FROM tbbagian where jenis ='penunjang' order by idBagian asc");
            return $hasil;
        }
 
    public function get_bag1()
        {
            $query = $this->db->get('tbbagian1');
            return $query->result();
        }

    public function get_bagianPengabdian()
        {
            $hasil=$this->db->query("SELECT * FROM tbbagian where jenis ='pengabdian' order by idBagian asc");
            return $hasil;
        }

    public function get_bagianPenelitian()
        {
            $hasil=$this->db->query("SELECT * FROM tblv1 where jenisKegiatanLv1 ='penelitian' order by idLv1 asc");
            return $hasil;
        }

    public function get_bagianPengajaran()
        {
            $hasil=$this->db->query("SELECT * FROM tblv1 where jenisKegiatanLv1 ='pengajaran' order by idLv1 asc");
            return $hasil;
        }
 
    public function get_bag1Penelitian()
        {
            // kita joinkan tabel kota dengan provinsi
            $query = $this->db->get('tblv2');
            return $query->result();
        }
 
    public function get_bag2Penelitian()
        {
            // kita joinkan tabel kota dengan provinsi
            $hasil=$this->db->query("SELECT * FROM tblv3");
            return $hasil->result();
        }

    public function get_default($id){
        $sql = $this->db->query("SELECT * FROM tbdosen WHERE idDosen = '$id'");
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function get_profil($id){
        $sql = $this->db->query("SELECT * FROM tbdosen WHERE idDosen = '$id'");
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    function ambildata($perPage, $uri, $ringkasan) {
        $this->db->select('*');
        $this->db->from('tbdosen');
        if (!empty($ringkasan)) {
            $this->db->like('nama', $ringkasan);
        }
        $this->db->order_by('nama','asc');
        $getData = $this->db->get('', $perPage, $uri);

        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;
    }

    function jumlah_data(){
        $sql = $this->db->query("SELECT * FROM tbdosen");  
        return $sql->num_rows();
    }

    public function updateProfil($post,$id){
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $nidn = $this->db->escape($post['nidn']);
        $nama = $this->db->escape($post['nama']);
        $noseri = $this->db->escape($post['noSeri']);
        $tempat = $this->db->escape($post['tempat']);
        $tanggal = $this->db->escape($post['tgl']);        
        // $tanggal = date('Y-m-d', strtotime($tanggal));
        $jk = $this->db->escape($post['sex']);
        $no = $this->db->escape($post['telp']);
        $status = $this->db->escape($post['status']);
        $jab = $this->db->escape($post['jabatan']);
        $bag = $this->db->escape($post['bagian']);
        // $data['kodeunik'] = $this->m_user->code_otomatis();
        // $kode = $this->db->escape($data['kodeunik']);

        $sql = $this->db->query("UPDATE tbdosen SET nidn = $nidn, nama = $nama, noSeri = $noseri, tempatLahir = $tempat, tglLahir = $tanggal, jk = $jk, noTelp = $no, statusDosen = $status, jabatan = $jab, pengguna = $bag WHERE idDosen = '$id'");

        if($sql)
            return true;
        return false;
    }

    public function simpanDosen($post){
        //pastikan nama index post yang dipanggil sama seperti di form input
        // $kode = $this->db->escape($post['id']);
        $nidn = $this->db->escape($post['nidn']);
        $nama = $this->db->escape($post['nama']);
        $noseri = $this->db->escape($post['noSeri']);
        $tempat = $this->db->escape($post['tempat']);
        $tanggal = $this->db->escape($post['tgl']);        
        // $tanggal = date('Y-m-d', strtotime($tanggal));
        $jk = $this->db->escape($post['sex']);
        $no = $this->db->escape($post['telp']);
        $prodi = $this->db->escape($post['prodi']);
        $status = $this->db->escape($post['status']);
        $jab = $this->db->escape($post['jabatan']);
        $bag = $this->db->escape($post['bagian']);
        $golongan = $this->db->escape($post['golongan']);
        $jafa = $this->db->escape($post['jafa']);
        $data['kodeunik'] = $this->m_user->code_otomatis();
        $kode = $this->db->escape($data['kodeunik']);

        $sql = $this->db->query("INSERT INTO tbdosen VALUES ($kode, $nidn, $nama, $noseri, $tempat,$tanggal,$jk,$no,$prodi,$status,$jafa,$golongan,$jab,$kode,$kode,$bag)");
        if($sql)
            return true;
        return false;
    }

    public function update($post, $id){
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $nidn = $this->db->escape($post['nidn']);
        $nama = $this->db->escape($post['nama']);
        $noseri = $this->db->escape($post['noSeri']);
        $tempat = $this->db->escape($post['tempat']);
        $tanggal = $this->db->escape($post['tgl']);        
        // $tanggal = date('Y-m-d', strtotime($tanggal));
        $jk = $this->db->escape($post['sex']);
        $no = $this->db->escape($post['telp']);
        $prodi = $this->db->escape($post['prodi']);
        $status = $this->db->escape($post['status']);
        $golongan = $this->db->escape($post['golongan']);
        $jafa = $this->db->escape($post['jafa']);
        $jab = $this->db->escape($post['jabatan']);
        $bag = $this->db->escape($post['bagian']);
        // $data['kodeunik'] = $this->m_user->code_otomatis();
        // $kode = $this->db->escape($data['kodeunik']);

        $sql = $this->db->query("UPDATE tbdosen SET nidn = $nidn, nama = $nama, noSeri = $noseri, tempatLahir = $tempat, tglLahir = $tanggal, jk = $jk, noTelp = $no, prodi = $prodi, statusDosen = $status, jafa = $jafa, golongan = $golongan, jabatan = $jab, pengguna = $bag WHERE idDosen = '$id'");

        if($sql)
            return true;
        return false;
    }

    public function update1($post, $id){
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $nidn = $this->db->escape($post['nidn']);
        $nama = $this->db->escape($post['nama']);
        $noseri = $this->db->escape($post['noSeri']);
        $tempat = $this->db->escape($post['tempat']);
        $tanggal = $this->db->escape($post['tgl']);        
        // $tanggal = date('Y-m-d', strtotime($tanggal));
        $jk = $this->db->escape($post['sex']);
        $no = $this->db->escape($post['telp']);
        $prodi = $this->db->escape($post['prodi']);
        $status = $this->db->escape($post['status']);
        $golongan = $this->db->escape($post['golongan']);
        $jafa = $this->db->escape($post['jafa']);
        $jab = $this->db->escape($post['jabatan']);

        $sql = $this->db->query("UPDATE tbdosen SET nidn = $nidn, nama = $nama, noSeri = $noseri, tempatLahir = $tempat, tglLahir = $tanggal, jk = $jk, noTelp = $no, prodi = $prodi, statusDosen = $status, jafa = $jafa, golongan = $golongan, jabatan = $jab WHERE idDosen = '$id'");

        if($sql)
            return true;
        return false;
    }
public function hapusDosen($id){
        $sql = $this->db->query("DELETE from tbdosen WHERE idDosen = '$id'");
        if($sql)
            return true;
        return false;
    }

    public function read_dupakAdmin($ringkasan){
        $this->load->library('pagination'); // Load librari paginationnya
        
        $query = "SELECT * FROM tbdupak inner join tbdosen on tbdosen.idDosen = tbdupak.idDosen where tbdosen.nama like '%$ringkasan%' or tbdupak.pendDiperhitungkan like '%$ringkasan%' order by tbdosen.nama ASC"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/dupakAdmin');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

    public function read_dupak($ringkasan){
        // $sql = "SELECT * FROM tbpetugas ORDER BY idPetugas";
        $where = $this->session->userdata('idDosen');
        $this->load->library('pagination'); // Load librari paginationnya
        
        $query = "SELECT * FROM tbdupak inner join tbdosen on tbdosen.idDosen = tbdupak.idDosen where tbdupak.pendDiperhitungkan like '%$ringkasan%' and tbdupak.idDosen = '$where'"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/dupakAdmin');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

    function codeDupak(){
            $this->db->select('(tbdupak.id) as kode ',false);
            $this->db->order_by('id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('tbdupak');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            // $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            // $kodejadi  = "DS-A-".$kodemax;
            return $kode;

    }

    public function simDupak($post){
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $pend           = $this->db->escape($post['pend']);
        $jabAkad        = $this->db->escape($post['jabAkad']);
        $tmtAkad        = $this->db->escape($post['tmtAkad']);
        $pangkat        = $this->db->escape($post['pangkat']);
        $tmtPangkat     = $this->db->escape($post['tmtPangkat']);        
        // $tanggal = date('Y-m-d', strtotime($tanggal));
        $golLama        = $this->db->escape($post['golLama']);
        $GolBaru        = $this->db->escape($post['golBaru']);
        $tmtGolBaru     = $this->db->escape($post['tmtGolBaru']);
        $kodeBidang     = $this->db->escape($post['kodeBidang']);
        $namaBidang     = $this->db->escape($post['namaBidang']);
        $kreSekarang    = $this->db->escape($post['kreSekarang']);
        $kreDiusulkan   = $this->db->escape($post['kreDiusulkan']);
        $data['kodeunik'] = $this->m_user->codeDupak();
        $kode           = $this->db->escape($data['kodeunik']);
        $id             = $this->db->escape($this->session->userdata('idDosen'));

        $sql = $this->db->query("INSERT INTO tbdupak VALUES ($kode, $pend, $jabAkad, $tmtAkad, $pangkat, $tmtPangkat, $golLama, $GolBaru, $tmtGolBaru, $kodeBidang, $namaBidang, $kreSekarang, $kreDiusulkan, $id)");

        if($sql)
            return true;
        return false;
    }

    public function get_dupak($id){
        $sql = $this->db->query("SELECT * FROM tbdupak WHERE id = '$id'");
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function upDupak($post, $id){
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $pend           = $this->db->escape($post['pend']);
        $jabAkad        = $this->db->escape($post['jabAkad']);
        $tmtAkad        = $this->db->escape($post['tmtAkad']);
        $pangkat        = $this->db->escape($post['pangkat']);
        $tmtPangkat     = $this->db->escape($post['tmtPangkat']);        
        // $tanggal = date('Y-m-d', strtotime($tanggal));
        $golLama        = $this->db->escape($post['golLama']);
        $GolBaru        = $this->db->escape($post['golBaru']);
        $tmtGolBaru     = $this->db->escape($post['tmtGolBaru']);
        $kodeBidang     = $this->db->escape($post['kodeBidang']);
        $namaBidang     = $this->db->escape($post['namaBidang']);
        $kreSekarang    = $this->db->escape($post['kreSekarang']);
        $kreDiusulkan   = $this->db->escape($post['kreDiusulkan']);
        // $data['kodeunik'] = $this->m_user->code_otomatis();
        // $kode = $this->db->escape($data['kodeunik']);

        $sql = $this->db->query("UPDATE tbdupak SET pendDiperhitungkan = $pend, jabAkademik = $jabAkad, TMTAkademik = $tmtAkad, pangkat = $pangkat, TMTPangkat = $tmtPangkat, masaGolLama = $golLama, masaGolBaru = $GolBaru, TMTGolBaru = $tmtGolBaru, kodeBidang = $kodeBidang, namaBidang = $namaBidang, kreditSekarang = $kreSekarang, kreditDiusulkan = $kreDiusulkan WHERE id = '$id'");

        if($sql)
            return true;
        return false;
    }

    public function hapusDupak($id){
        $sql = $this->db->query("DELETE from tbdupak WHERE id = '$id'");
        if($sql)
            return true;
        return false;
    }

    public function read_pengajaranAdmin($ringkasan){
        $this->load->library('pagination'); // Load librari paginationnya
        
        $query = "SELECT * FROM tbpengajaran inner join tbdosen on tbdosen.idDosen = tbpengajaran.idDosen where tbdosen.nama like '%$ringkasan%' or tbpengajaran.uraian like '%$ringkasan%' order by tbdosen.nama ASC"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/pengajaranAdmin');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

    public function read_pengajaran($ringkasan){
        $where = $this->session->userdata('idDosen');
        $this->load->library('pagination'); // Load librari paginationnya
        
        $query = "SELECT * FROM tbpengajaran inner join tbdosen on tbdosen.idDosen = tbpengajaran.idDosen where tbpengajaran.uraian like '%$ringkasan%' and tbpengajaran.idDosen = '$where'"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/pengajaran');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

    function codePengajaran(){
            $this->db->select('(tbpengajaran.idPengajaran) as kode ',false);
            $this->db->order_by('idPengajaran', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('tbpengajaran');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            // $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            // $kodejadi  = "DS-A-".$kodemax;
            return $kode;

    }

    public function simPengajaran($post){
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $lv1            = $this->db->escape($post['kegiatan']);
        $lv2            = $this->db->escape($post['subkategori']);
        $lv3            = $this->db->escape($post['subkategori2']);
        $judul          = $this->db->escape($post['judul']);
        $tglPenelitian  = $this->db->escape($post['tglPenelitian']);
        $satHasil       = $this->db->escape($post['satHasil']);
        $volKegiatan    = $this->db->escape($post['volKegiatan']);
        $angkaKredit    = $this->db->escape($post['angkaKredit']);
        $jumKredit      = $this->db->escape($post['jumKredit']);
        $ket            = $this->db->escape($post['ket']);
        $thn            = $this->db->escape(substr($post['tglPenelitian'], -4));
        $data['kodeunik'] = $this->m_user->codePengajaran();
        $kode = $this->db->escape($data['kodeunik']);
        $idDosen        = $this->db->escape($this->session->userdata('idDosen'));
        if($_FILES['berkas']['name']<>""){
            $berkas         = $this->db->escape(time().$_FILES['berkas']['name']);
            $sql = $this->db->query("INSERT into tbpengajaran VALUES ($kode ,$lv1 ,$lv2 ,$lv3 , $judul, $tglPenelitian, $satHasil, $volKegiatan, $angkaKredit, $jumKredit, $ket, $berkas, $thn, $idDosen)");
        }
        else{
            $sql = $this->db->query("INSERT into tbpengajaran VALUES ($kode ,$lv1 ,$lv2 ,$lv3 , $judul, $tglPenelitian, $satHasil, $volKegiatan, $angkaKredit, $jumKredit, $ket, '', $thn, $idDosen)");
        }
        if($sql)
            return true;
        return false;
    }

    public function get_pengajaran($id){
        $sql = $this->db->query("SELECT * FROM tbpengajaran WHERE idPengajaran = '$id'");
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function upPengajaran($post, $id){
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $lv1            = $this->db->escape($post['kegiatan']);
        $lv2            = $this->db->escape($post['subkategori']);
        $lv3            = $this->db->escape($post['subkategori2']);
        $judul          = $this->db->escape($post['judul']);
        $tglPenelitian  = $this->db->escape($post['tglPenelitian']);
        $satHasil       = $this->db->escape($post['satHasil']);
        $volKegiatan    = $this->db->escape($post['volKegiatan']);
        $angkaKredit    = $this->db->escape($post['angkaKredit']);
        $jumKredit      = $this->db->escape($post['jumKredit']);
        $ket            = $this->db->escape($post['ket']);
        $thn            = $this->db->escape(substr($post['tglPenelitian'], -4));
        if ($_FILES['berkas']['name']<>"") {
            $berkas     = $this->db->escape(time().$_FILES['berkas']['name']);
            $sql = $this->db->query("UPDATE tbpengajaran SET idLv1 = $lv1 ,idLv2 = $lv2 ,idLv3 = $lv3 ,uraian = $judul, tglPengajaran = $tglPenelitian, satuanHasil = $satHasil, jumVolumKegiatan = $volKegiatan, angkaKredit = $angkaKredit, jumAngkaKredit = $jumKredit, ket = $ket, file = $berkas, thn = $thn WHERE idPengajaran = '$id'");
        }else{
            $sql = $this->db->query("UPDATE tbpengajaran SET idLv1 = $lv1 ,idLv2 = $lv2 ,idLv3 = $lv3 ,uraian = $judul, tglPengajaran = $tglPenelitian, satuanHasil = $satHasil, jumVolumKegiatan = $volKegiatan, angkaKredit = $angkaKredit, jumAngkaKredit = $jumKredit, ket = $ket, thn = $thn WHERE idPengajaran = '$id'");
        }

        

        if($sql)
            return true;
        return false;
    }

    public function hapusPengajaran($id){
        $sql = $this->db->query("DELETE from tbpengajaran WHERE idPengajaran = '$id'");
        if($sql)
            return true;
        return false;
    }

    public function read_penelitianAdmin($ringkasan){
        $this->load->library('pagination'); // Load librari paginationnya
        
        $query = "SELECT * FROM tbpenelitian inner join tbdosen on tbdosen.idDosen = tbpenelitian.idDosen where tbdosen.nama like '%$ringkasan%' or tbpenelitian.judul like '%$ringkasan%' order by tbdosen.nama ASC"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/penelitianAdmin');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

    public function read_penelitian($ringkasan){
        
        $where = $this->session->userdata('idDosen');
        $this->load->library('pagination'); // Load librari paginationnya
        
        $query = "SELECT * FROM tbpenelitian inner join tbdosen on tbdosen.idDosen = tbpenelitian.idDosen where tbpenelitian.judul like '%$ringkasan%' and tbpenelitian.idDosen = '$where'"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/penelitian');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

    function codePenelitian(){
            $this->db->select('(tbpenelitian.idPenelitian) as kode ',false);
            $this->db->order_by('idPenelitian', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('tbpenelitian');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            // $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            // $kodejadi  = "DS-A-".$kodemax;
            return $kode;

    }

    public function simPenelitian($post){
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $lv1            = $this->db->escape($post['kegiatan']);
        $lv2            = $this->db->escape($post['subkategori']);
        $lv3            = $this->db->escape($post['subkategori2']);
        $judul          = $this->db->escape($post['judul']);
        $issn           = $this->db->escape($post['issn']);
        $tglPenelitian  = $this->db->escape($post['tglPenelitian']);
        $satHasil       = $this->db->escape($post['satHasil']);
        $volKegiatan    = $this->db->escape($post['volKegiatan']);
        $angkaKredit    = $this->db->escape($post['angkaKredit']);
        $jumKredit      = $this->db->escape($post['jumKredit']);
        $ket            = $this->db->escape($post['ket']);
        $thn            = $this->db->escape(substr($post['tglPenelitian'], -4));
        $data['kodeunik'] = $this->m_user->codePenelitian();
        $kode = $this->db->escape($data['kodeunik']);
        $idDosen        = $this->db->escape($this->session->userdata('idDosen'));
        if($_FILES['berkas']['name']<>""){
            $berkas         = $this->db->escape(time().$_FILES['berkas']['name']);
            $sql = $this->db->query("INSERT into tbpenelitian VALUES ($kode ,$lv1 ,$lv2 ,$lv3 , $judul, $issn, $tglPenelitian, $satHasil, $volKegiatan, $angkaKredit, $jumKredit, $ket, $berkas, $thn, $idDosen)");
        }else{
            $sql = $this->db->query("INSERT into tbpenelitian VALUES ($kode ,$lv1 ,$lv2 ,$lv3 , $judul, $issn, $tglPenelitian, $satHasil, $volKegiatan, $angkaKredit, $jumKredit, $ket, '', $thn, $idDosen)");
        }
        if($sql)
            return true;
        return false;
    }

    public function get_penelitian($id){
        $sql = $this->db->query("SELECT * FROM tbpenelitian WHERE idPenelitian = '$id'");
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function upPenelitian($post, $id){
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $lv1            = $this->db->escape($post['kegiatan']);
        $lv2            = $this->db->escape($post['subkategori']);
        $lv3            = $this->db->escape($post['subkategori2']);
        $judul          = $this->db->escape($post['judul']);
        $issn           = $this->db->escape($post['issn']);
        $tglPenelitian  = $this->db->escape($post['tglPenelitian']);
        $satHasil       = $this->db->escape($post['satHasil']);
        $volKegiatan    = $this->db->escape($post['volKegiatan']);
        $angkaKredit    = $this->db->escape($post['angkaKredit']);
        $jumKredit      = $this->db->escape($post['jumKredit']);
        $ket            = $this->db->escape($post['ket']);
        $thn            = $this->db->escape(substr($post['tglPenelitian'], -4));
        if ($_FILES['berkas']['name']<>"") {
            $berkas         = $this->db->escape(time().$_FILES['berkas']['name']);

            $sql = $this->db->query("UPDATE tbpenelitian SET idLv1 = $lv1 ,idLv2 = $lv2 ,idLv3 = $lv3 ,judul = $judul, issn = $issn, tglPenelitian = $tglPenelitian, satuanHasil = $satHasil, volumeKegiatan = $volKegiatan, angkaKredit = $angkaKredit, jumAngkaKredit = $jumKredit, ket = $ket, berkas = $berkas, thn=$thn WHERE idPenelitian = '$id'");
        }else{
            $sql = $this->db->query("UPDATE tbpenelitian SET idLv1 = $lv1 ,idLv2 = $lv2 ,idLv3 = $lv3 ,judul = $judul, issn = $issn, tglPenelitian = $tglPenelitian, satuanHasil = $satHasil, volumeKegiatan = $volKegiatan, angkaKredit = $angkaKredit, jumAngkaKredit = $jumKredit, ket = $ket, thn=$thn WHERE idPenelitian = '$id'");
        }
        
        if($sql)
            return true;
        return false;
    }

    public function hapusPenelitian($id){
        $sql = $this->db->query("DELETE from tbpenelitian WHERE idPenelitian = '$id'");
        if($sql)
            return true;
        return false;
    }

    public function readPengabdianAdmin($ringkasan){
        $this->load->library('pagination'); // Load librari paginationnya
        
        $query = "SELECT * FROM tbpengabdian inner join tbdosen on tbdosen.idDosen = tbpengabdian.idDosen where tbdosen.nama like '%$ringkasan%' or tbpengabdian.namaKegiatan like '%$ringkasan%' order by tbdosen.nama ASC"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/pengabdianAdmin');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

    public function readPengabdian($ringkasan){
        
        $where = $this->session->userdata('idDosen');
        $this->load->library('pagination'); // Load librari paginationnya
        
        $query = "SELECT * FROM tbpengabdian inner join tbdosen on tbdosen.idDosen = tbpengabdian.idDosen where tbpengabdian.namaKegiatan like '%$ringkasan%' and tbpengabdian.idDosen = '$where'"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/pengabdian');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

    function codePengabdian(){
            $this->db->select('(tbpengabdian.idPengabdian) as kode ',false);
            $this->db->order_by('idPengabdian', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('tbpengabdian');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            // $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            // $kodejadi  = "DS-A-".$kodemax;
            return $kode;

    }

    public function simPengabdian($post){
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $nama           = $this->db->escape($post['nama']);
        $bagian         = $this->db->escape($post['kegiatan']);
        $bag1           = $this->db->escape($post['subkategori']);
        $tglKegiatan    = $this->db->escape($post['tglKegiatan']);
        $satHasil       = $this->db->escape($post['satHasil']);
        $jumVolKegiatan = $this->db->escape($post['jumVolKegiatan']);
        $angkaKredit    = $this->db->escape($post['angkaKredit']);
        $jumKredit      = $this->db->escape($post['jumKredit']);
        $ket            = $this->db->escape($post['ket']);
        $thn            = $this->db->escape(substr($post['tglKegiatan'], -4));
        $data['kodeunik'] = $this->m_user->codePengabdian();
        $kode = $this->db->escape($data['kodeunik']);
        $idDosen        = $this->db->escape($this->session->userdata('idDosen'));
        if($_FILES['berkas']['name']<>""){
            $berkas         = $this->db->escape(time().$_FILES['berkas']['name']);
            $sql = $this->db->query("INSERT into tbpengabdian VALUES ($kode,$bagian, $bag1, $nama, $tglKegiatan, $satHasil, $jumVolKegiatan, $angkaKredit, $jumKredit, $ket, $berkas, $thn, $idDosen)");
        }else{
            $sql = $this->db->query("INSERT into tbpengabdian VALUES ($kode,$bagian, $bag1, $nama, $tglKegiatan, $satHasil, $jumVolKegiatan, $angkaKredit, $jumKredit, $ket, '', $thn, $idDosen)");
        }
        if($sql)
            return true;
        return false;
    }

    public function get_pengabdian($id){
        $sql = $this->db->query("SELECT * FROM tbpengabdian WHERE idPengabdian = '$id'");
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function upPengabdian($post, $id){
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $nama           = $this->db->escape($post['nama']);
        $bagian         = $this->db->escape($post['kegiatan']);
        $bag1           = $this->db->escape($post['subkategori']);
        $tglKegiatan    = $this->db->escape($post['tglKegiatan']);
        $satHasil       = $this->db->escape($post['satHasil']);
        $jumVolKegiatan = $this->db->escape($post['jumVolKegiatan']);
        $angkaKredit    = $this->db->escape($post['angkaKredit']);
        $jumKredit      = $this->db->escape($post['jumKredit']);
        $ket            = $this->db->escape($post['ket']);
        $thn            = $this->db->escape(substr($post['tglKegiatan'], -4));
        if ($_FILES['berkas']['name']<>"") {
            $berkas         = $this->db->escape(time().$_FILES['berkas']['name']);

            $sql = $this->db->query("UPDATE tbpengabdian SET idBagian=$bagian, idBag1=$bag1, namaKegiatan = $nama, tglKegiatan = $tglKegiatan, satuanHasil = $satHasil, jumVolumKegiatan = $jumVolKegiatan, angkaKredit = $angkaKredit, jumAngkaKredit = $jumKredit, ket = $ket, berkas = $berkas, thn=$thn WHERE idPengabdian = '$id'");
        }else{
            $sql = $this->db->query("UPDATE tbpengabdian SET idBagian=$bagian, idBag1=$bag1, namaKegiatan = $nama, tglKegiatan = $tglKegiatan, satuanHasil = $satHasil, jumVolumKegiatan = $jumVolKegiatan, angkaKredit = $angkaKredit, jumAngkaKredit = $jumKredit, ket = $ket, thn=$thn WHERE idPengabdian = '$id'");
        }

        if($sql)
            return true;
        return false;
    }

    public function hapusPengabdian($id){
        $sql = $this->db->query("DELETE from tbpengabdian WHERE idPengabdian = '$id'");
        if($sql)
            return true;
        return false;
    }

    public function readPenunjangAdmin($ringkasan){
        $this->load->library('pagination'); // Load librari paginationnya
        
        $query = "SELECT * FROM tbpenunjang inner join tbdosen on tbdosen.idDosen = tbpenunjang.idDosen where tbdosen.nama like '%$ringkasan%' or tbpenunjang.namaKegiatan like '%$ringkasan%' order by tbdosen.nama ASC"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/penunjangAdmin');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

    public function readPenunjang($ringkasan){
        
        $where = $this->session->userdata('idDosen');
        $this->load->library('pagination'); // Load librari paginationnya
        
        $query = "SELECT * FROM tbpenunjang inner join tbdosen on tbdosen.idDosen = tbpenunjang.idDosen where tbpenunjang.namaKegiatan like '%$ringkasan%' and tbpenunjang.idDosen = '$where'"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/penunjang');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

    function codePenunjang(){
            $this->db->select('(tbpenunjang.idPenunjang) as kode ',false);
            $this->db->order_by('idPenunjang', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('tbpenunjang');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            // $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            // $kodejadi  = "DS-A-".$kodemax;
            return $kode;

    }

    public function simPenunjang($post){
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $nama           = $this->db->escape($post['nama']);
        $bagian         = $this->db->escape($post['kegiatan']);
        $bag1           = $this->db->escape($post['subkategori']);
        $tglKegiatan    = $this->db->escape($post['tglKegiatan']);
        $satHasil       = $this->db->escape($post['satHasil']);
        $jumVolKegiatan = $this->db->escape($post['jumVolKegiatan']);
        $angkaKredit    = $this->db->escape($post['angkaKredit']);
        $jumKredit      = $this->db->escape($post['jumKredit']);
        $ket            = $this->db->escape($post['ket']);
        $thn            = $this->db->escape(substr($post['tglKegiatan'], -4));
        $data['kodeunik'] = $this->m_user->codePenunjang();
        $kode = $this->db->escape($data['kodeunik']);
        $berkas         = $this->db->escape(time().$_FILES['berkas']['name']);
        $idDosen        = $this->db->escape($this->session->userdata('idDosen'));
        if ($_FILES['berkas']['name']<>""){
            $berkas         = $this->db->escape(time().$_FILES['berkas']['name']);
            $sql = $this->db->query("INSERT into tbpenunjang VALUES ($kode,$bagian, $bag1, $nama, $tglKegiatan, $satHasil, $jumVolKegiatan, $angkaKredit, $jumKredit, $ket, $berkas, $thn $idDosen)");
        }else{
            $sql = $this->db->query("INSERT into tbpenunjang VALUES ($kode,$bagian, $bag1, $nama, $tglKegiatan, $satHasil, $jumVolKegiatan, $angkaKredit, $jumKredit, $ket, '', $thn $idDosen)");
        }
        if($sql)
            return true;
        return false;
    }

    public function get_penunjang($id){
        $sql = $this->db->query("SELECT * FROM tbpenunjang WHERE idPenunjang = '$id'");
        if($sql->num_rows() > 0)
            return $sql->row_array();
        return false;
    }

    public function upPenunjang($post, $id){
        //parameter $id wajib digunakan agar program tahu ID mana yang ingin diubah datanya.
        $nama           = $this->db->escape($post['nama']);
        $bagian         = $this->db->escape($post['kegiatan']);
        $bag1           = $this->db->escape($post['subkategori']);
        $tglKegiatan    = $this->db->escape($post['tglKegiatan']);
        $satHasil       = $this->db->escape($post['satHasil']);
        $jumVolKegiatan = $this->db->escape($post['jumVolKegiatan']);
        $angkaKredit    = $this->db->escape($post['angkaKredit']);
        $jumKredit      = $this->db->escape($post['jumKredit']);
        $ket            = $this->db->escape($post['ket']);
        $thn            = $this->db->escape(substr($post['tglKegiatan'], -4));
        if ($_FILES['berkas']['name']<>"") {
            $berkas         = $this->db->escape(time().$_FILES['berkas']['name']);

            $sql = $this->db->query("UPDATE tbpenunjang SET idBagian = $bagian, idBag1=$bag1, namaKegiatan = $nama, tglKegiatan = $tglKegiatan, satuanHasil = $satHasil, jumVolumKegiatan = $jumVolKegiatan, angkaKredit = $angkaKredit, jumAngkaKredit = $jumKredit, ket = $ket, berkas = $berkas, thn = $thn WHERE idPenunjang = '$id'");
        }else{
            
            $sql = $this->db->query("UPDATE tbpenunjang SET idBagian = $bagian, idBag1=$bag1, namaKegiatan = $nama, tglKegiatan = $tglKegiatan, satuanHasil = $satHasil, jumVolumKegiatan = $jumVolKegiatan, angkaKredit = $angkaKredit, jumAngkaKredit = $jumKredit, ket = $ket, thn = $thn WHERE idPenunjang = '$id'");
        }

        
        if($sql)
            return true;
        return false;
    }

    public function hapusPenunjang($id){
        $sql = $this->db->query("DELETE from tbpenunjang WHERE idPenunjang = '$id'");
        if($sql)
            return true;
        return false;
    }

///CLIENT////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function read_dupakClient($ringkasan){
        $where = $this->session->userdata('idDosen');
        $this->load->library('pagination'); // Load librari paginationnya
        
        $query = "SELECT * FROM tbdupak inner join tbdosen on tbdosen.idDosen = tbdupak.idDosen where tbdupak.pendDiperhitungkan like '%$ringkasan%' and tbdupak.idDosen = '$where'"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/loadDashboard');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

public function read_pengajaranClient($ringkasan){
        $this->load->library('pagination'); // Load librari paginationnya
        $where = $this->session->userdata('idDosen');
        
        $query = "SELECT * FROM tbpengajaran inner join tbdosen on tbdosen.idDosen = tbpengajaran.idDosen where tbpengajaran.uraian like '%$ringkasan%' and tbpengajaran.idDosen = '$where'"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/pengajaranClient');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

    public function read_penelitianClient($ringkasan){
        $this->load->library('pagination'); // Load librari paginationnya
        
        $where = $this->session->userdata('idDosen');
        $query = "SELECT * FROM tbpenelitian inner join tbdosen on tbdosen.idDosen = tbpenelitian.idDosen where tbpenelitian.judul like '%$ringkasan%' and tbpenelitian.idDosen = '$where'"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/penelitianClient');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

public function readPengabdianClient($ringkasan){
        
        $where = $this->session->userdata('idDosen');
        $this->load->library('pagination'); // Load librari paginationnya
        
        $query = "SELECT * FROM tbpengabdian inner join tbdosen on tbdosen.idDosen = tbpengabdian.idDosen where tbpengabdian.namaKegiatan like '%$ringkasan%' and tbpengabdian.idDosen = '$where'"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/pengabdianClient');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

public function readPenunjangClient($ringkasan){
        
        $where = $this->session->userdata('idDosen');
        $this->load->library('pagination'); // Load librari paginationnya
        
        $query = "SELECT * FROM tbpenunjang inner join tbdosen on tbdosen.idDosen = tbpenunjang.idDosen where tbpenunjang.namaKegiatan like '%$ringkasan%' and tbpenunjang.idDosen = '$where'"; // Query untuk menampilkan semua data siswa
        
        $config['base_url'] = base_url('/index.php/auth/penunjangClient');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        
        // Style Pagination
        // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
        $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-right"></i>&nbsp;'; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = '&nbsp;<i class="glyphicon glyphicon-menu-left"></i>&nbsp;'; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
        
        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        
        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];
        
        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
        $data['rows'] = $this->db->query($query)->result();
        
        return $data;
    }

   }