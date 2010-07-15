<?php
    class Messagemodel extends Model {
        function Messagemodel()
        {
            parent::Model();
        }
        function get_user()
        {
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->where('username',$this->uri->segment(3));
            $query=$this->db->get();
            return $query->result();
        }
        function insert_message()
        {
            $data=array(
                'user_sender'=>$this->session->userdata('username'),
                'user_reciever'=>$this->uri->segment(3),
                'subject'=>$_POST['subject'],
                'message'=>$_POST['message'],
                'datemessage'=>date('Y-m-d h:i:s')
            );
            return $insert_messagge=$this->db->insert('tbl_message',$data);
        }
        function get_inbox()
        {
            $this->db->select('*');
            $this->db->from('tbl_message');
            $this->db->where('user_reciever',$this->session->userdata('username'));
            $this->db->orderby('datemessage','desc');
            $this->db->limit(20,$this->uri->segment(3));
            $query=$this->db->get();
            
            return $query->result();
        }
    }
?>