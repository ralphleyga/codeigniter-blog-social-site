<?php
    class Rightside extends Model {        
        function Rightside()
        {
            parent::Model();
            $this->load->database();
        }
        function get_new_members()
        {
            $this->db->select('username,dateregister');
            $this->db->from('tbl_user');
            $this->db->where('active','1');
            $this->db->order_by("dateregister", "desc"); 
            $this->db->limit(5);
            $query = $this->db->get();
            return $query->result();
        }
        function loglately()
        {
            $this->db->select('*');
            $this->db->from('tbl_userlog');
            $this->db->order_by("datelog", "desc"); 
            $this->db->limit(5);
            $query = $this->db->get();
            return $query->result();
        }
    }
?>