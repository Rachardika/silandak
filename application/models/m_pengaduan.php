<?php

// defined('BASEPATH') or exit('No direct script access allowed');

class m_pengaduan extends CI_Model
{
    function get_pengaduan()
    {
        return $this->db->get('pengaduan')->result();
    }
    function get_pengaduanBynim($nim)
    {
        return $this->db->where('nim', $nim)->get('pengaduan')->result();
    }
    function get_pengaduanBytujuan($tujuan)
    {
        return $this->db->where('tujuan', $tujuan)->from('pengaduan')->get();
    }
    function get_pengaduanByid($id)
    {
        return $this->db->where('id', $id)->from('pengaduan')->get()->result();
    }

    function get_bagianByid($id)
    {
        return $this->db->select('bagian')->where('username', $id)->from('user')->get()->row();
    }
    function get_pengaduanStat($stat)
    {
        return $this->db->where('status', $stat)->from('pengaduan')->get()->result();
    }
    function getStat()
    {
        return $this->db->select('status')->get('pengaduan')->result();
    }
    public function deletepeng($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('pengaduan');
    }
    public function get_ratingId($id)
    {
        return $this->db->select('id_pengaduan')->where('id_pengaduan', $id)->from('rating')->get()->row();
    }
    public function findRate($id_pengaduan)
    {
        $value = $this->db->select('id_pengaduan')->where('id_pengaduan', $id_pengaduan)->from('rating')->get()->row();
        if (isset($value)) {
            return True;
        } else {
            return False;
        }
    }
    public function get_ratingByid_pengaduan($id)
    {
        return $this->db->where('id_pengaduan', $id)->from('rating')->get();
    }

    function input_pengaduan($data = array())
    {
        return $this->db->insert('pengaduan', $data);
    }

    function edit_data($where)
    {

        return $this->db->get_where('pengaduan', $where);
    }

    function update_data($id, $balasan, $email, $subjek, $status, $emailtujuan)
    {

        $this->db->set('balasan', $balasan);
        $this->db->set('email', $email);
        $this->db->set('subjek', $subjek);
        $this->db->set('status', $status);
        $this->db->set('email_tujuan', $emailtujuan);
        $this->db->where('id', $id);
        return $this->db->update('pengaduan');
    }
    var $column_order = array(null, 'nim', 'subjek', 'tanggal', 'tujuan', 'status'); //set column field database for datatable orderable
    var $column_search = array('subjek', 'tanggal', 'tujuan'); //set column field database for datatable searchable
    var $order = array('tanggal' => 'desc'); // default order

    private function _get_datatables_query()
    {

        $nim = $this->session->userdata('nim');
        $this->db->select('*');
        $this->db->where('pengaduan.nim', $nim);
        $this->db->from('pengaduan');

        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
        // return $this->db->where('nim', $nim)->get('pengaduan')->result();
    }
    function count_all()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        return $this->db->count_all_results();
    }
}
