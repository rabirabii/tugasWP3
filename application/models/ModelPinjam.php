<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPinjam extends CI_Model{

    // manip table pinjam
    public function simpanPinjam($data){
        $this->db->insert('pinjam',$data);
    }
    
    public function selectData($table,$where){
        $this->db->get($table,$where);
    }
    public function updateData($table,$where){
        $this->db->update('pinjam',$table,$where);
    }
    public function deleteData($table,$where){
        $this->db->delete($table,$where);
    }

    public function joinDate(){
        $this->db->select('*');
        $this->db->from('pinjam');
        $this->db->join('detail_pinjam','detail_pinjam.no_pinjam = pinjam.no_pinjam','Right');

        return $this->db->get()->result_array();
    }

    // Mani tabel detail pinjam
    public function simpanDetail($id_booking, $no_pinjam) {

        $sql = "INSERT INTO detail_pinjam (no_pinjam.id_buku) SELECT pinjam.no_pinjam,booking_detail.id_buku FROM pinjam,booking_detail
        Where booking_detail.id_buku = $id_booking AND pinjam.no_pinjam = $no_pinjam";
        $this->db->query($sql);
    }
}
