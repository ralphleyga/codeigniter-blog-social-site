<?php
    class Accountmodel extends Model {
        function Accountmodel()
        {
            parent::Model();
        }
        function get_profile()
        {            
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->where('username',$this->session->userdata('username'));
            $query=$this->db->get();
            return $query->result();
        }
        function uploadphoto()
        {
            $data = array(
                        'picture' => $_POST['userfile']
                        );
            $this->db->where('username', $this->session->userdata('username'));
        return $insert_comment = $this->db->update('tbl_user', $data);
        }
        function update_topic()
        {
            $data = array(
                'topic' => $_POST['topic'],
                'body'=> $_POST['body']
            );
        $this->db->where('id', $this->uri->segment(3));
        $this->db->update('tbl_forum_topic', $data);
        }
    }

?>