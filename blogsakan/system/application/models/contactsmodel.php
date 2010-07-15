<?php
    class Contactsmodel extends Model {
        function Contactsmodel()
        {
            parent::Model();
        }
        function view_contacts()
        {
            $this->db->select('*');
            $this->db->from('tbl_contact');
            $this->db->order_by("contact", "asc");
            $this->db->where('username',$this->session->userdata('username'));
            $query=$this->db->get();
            return $query->result();
        }
        function add_contacts()
        {
            $data = array(
            'username' => $this->session->userdata('username') ,
            'contact' => $this->uri->segment(3)
            );
        return $insert = $this->db->insert('tbl_contact', $data);
        }
    }
?>