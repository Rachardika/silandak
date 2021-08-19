<?php

class Opt_model extends CI_Model
{
    public function editProfil($nama, $nim, $email, $bagian)
    {
        $this->db->set('nama', $nama);
        $this->db->set('email', $email);
        $this->db->set('bagian', $bagian);
        $this->db->where('nim', $nim);
        return $this->db->update('tbl_dataopt');
    }
    public function getOpt()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = "SELECT `*` FROM `user`";
        return $this->db->get()->result_array();
    }

    var $column_order = array(null, 'nama', 'nim', 'bagian'); //set column field database for datatable orderable
    var $column_search = array('nama', 'nim', 'bagian'); //set column field database for datatable searchable
    var $order = array('nim' => 'desc'); // default order

    private function _get_datatables_query()
    {


        $this->db->select('*');
        $this->db->where('user.id_role = 3');
        $this->db->from('user');

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
    }
    function count_all()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->count_all_results();
    }
    public function getMember()
    {
        $this->db->select('member.*, member_type.type as tipe_member ');
        $this->db->from('member');
        $this->db->join('member_type', 'member.tipe_member = member_type.id_type');
        $this->db->order_by('member.date_created', 'desc');
        return $this->db->get()->result();
    }

    public function getMemberPagination($limit, $start)
    {
        $this->db->select('member.*, member_type.type as tipe_member ');
        $this->db->from('member');
        $this->db->join('member_type', 'member.tipe_member = member_type.id_type');
        $this->db->order_by('member.date_created', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    public function countAllMember()
    {
        return $this->db->get('member')->num_rows();
    }

    public function inputOpt($data)
    {
        $this->db->insert('user', $data);
    }

    public function editOpt($id, $nama, $username, $nim, $bagian, $email)
    {
        $this->db->set('nama', $nama);
        $this->db->set('username', $username);
        $this->db->set('bagian', $bagian);
        $this->db->set('nim', $nim);
        $this->db->set('email', $email);
        $this->db->where('id_user', $id);
        return $this->db->update('user');
    }

    public function deleteOpt($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->delete('user');
    }

    public function getType()
    {
        $this->db->select('*');
        $this->db->from('member_type');
        return $this->db->get()->result_array();
    }

    public function getOptById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    function getMemberTypeById($id)
    {
        $this->db->select('member_type.id_type, member_type.type');
        $this->db->from('member');
        $this->db->join('member_type', 'member_type.id_type = member.tipe_member');
        $this->db->where('nim', $id);
        return $this->db->get()->row_array();
    }

    public function count_gawe()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.id_role = 3');
        return $this->db->count_all_results();
    }
}
