<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BagianModel extends CI_Model
	{    
    	public function view(){    
    		return $this->db->get_where('tbbagian',['jenis'=>'penunjang'])->result(); // Tampilkan semua data yang ada di tabel provinsi  
    	}
    }