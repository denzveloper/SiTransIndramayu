<?php 
 
class Datam extends CI_Model{
	function data($number,$offset){
		$result = $this->db->get('kabar', $number, $offset)->result();
		if($result != null){
			foreach ($result as $rst) {
				$img = base_url('data/img/kabar/').$rst->sampul;
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