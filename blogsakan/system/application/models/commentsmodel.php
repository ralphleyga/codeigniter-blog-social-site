<?php
     class Commentsmodel extends Model {
        function Commentsmodel()
        {
            parent::Model();
        }
        function get_comment()
        {
            $this->db->select('id,topic_id,author,username,datecomment,comment,active');
            $this->db->from('tbl_forum_comment');
            $this->db->order_by("datecomment", "desc");
            $this->db->where('username',$this->session->userdata('username'));
            $this->db->limit(5,$this->uri->segment(3));
            $query=$this->db->get();
            return $query->result();
        }
        function approve_comment()
        {
            $data = array(
                    'active' => '1'
                    );
                $this->db->where('id', $this->uri->segment(3));
                return $this->db->update('tbl_forum_comment', $data);
        }
        function unapprove_comment()
        {
                        $data = array(
                    'active' => '0'
                    );
                $this->db->where('id', $this->uri->segment(3));
                return $this->db->update('tbl_forum_comment', $data);
        }
        function topic_comment()
        {
            $this->db->select('id,topic,body,datepost,username');
            $this->db->from('tbl_forum_topic');
            $this->db->where('id',$_POST['topic_id']);
            $this->db->order_by("datepost", "desc");
            $this->db->order_by("topic", "asc"); 
            $query=$this->db->get();
            return $query->result();
        }
    }

?>