<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Datam extends CI_Model{
	function data($number,$offset){
		//$result = $this->db->get('kabar', $number, $offset)->result();
		$this->db->limit($number,$offset);
		$this->db->order_by('timedate', 'DESC');
		$result = $this->db->get('kabar')->result();
		if($result != null){
			foreach ($result as $rst) {
				$img = 'data/img/kabar/'.$rst->sampul;
				$get[] = array('judul' => $rst->judul, 'timedate' => $rst->timedate, 'konten' => $rst->konten, 'image' => $img);
			}
		}else{
			$get = FALSE;
		}
		return $get;		
	}
 
	function jumlah_data(){
		return $this->db->get('kabar')->num_rows();
	}
}