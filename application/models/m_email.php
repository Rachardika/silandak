<?php

// defined('BASEPATH') or exit('No direct script access allowed');

class m_email extends CI_Model
{

    function send_email($data = array())
    {
        return $this->db->insert('send', $data);
    }
}
