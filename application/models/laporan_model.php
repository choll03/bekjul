<?php
class Laporan_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function getBulanan() {
        $this->db->select('SUBSTRING(date,1,7) AS tanggal');
        $this->db->from('invoices');
        $this->db->group_by("SUBSTRING(date,1,7)");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLaporan() {
        $bulanan = $this->input->post('bulanan');
        $this->db->select('invoices.date,invoices.username,pesanan.qty,pesanan.total,items.nama,items.harga');

        $this->db->from('pesanan');
        $this->db->where('SUBSTRING(date,1,7)',$bulanan);
        $this->db->where('invoices.status !=','menunggu konfirmasi');
        $this->db->join('invoices', 'pesanan.invoice_id = invoices.id', 'left');
        $this->db->join('items', 'pesanan.item_id = items.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTotal() {
        $this->db->select('SUM(total)');
    }

    public function printLaporan($bulanan) {
        $this->db->select('invoices.date,invoices.username,pesanan.qty,pesanan.total,items.nama,items.harga');

        $this->db->from('pesanan');
        $this->db->where('SUBSTRING(date,1,7)',$bulanan);
        $this->db->where('invoices.status !=','menunggu konfirmasi');
        $this->db->join('invoices', 'pesanan.invoice_id = invoices.id', 'left');
        $this->db->join('items', 'pesanan.item_id = items.id');
        $query = $this->db->get();
        return $query->result_array();
    }
}