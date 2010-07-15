<?php
class Profilemodel extends Model {
    function Profilemodel()
    {
        parent::Model();
    }
    function view_user()
    {
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->where('username',$this->uri->segment(3));
            $query=$this->db->get();
            return $query->result();
    }
    function user_entries()
    {
            $this->db->select('*');
            $this->db->from('tbl_forum_topic');
            $this->db->where('username',$this->uri->segment(3));
            $this->db->orderby('datepost','desc');
            $query=$this->db->get();
            return $query->result();
    }
}
?>