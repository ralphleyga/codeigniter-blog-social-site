<?php
    class Forummodel extends Model {
        function Forummodel()
        {
            parent::Model();
        }
        function get_forum()
        {
            $this->db->select('id,username,topic,body,datepost');
            $this->db->from('tbl_forum_topic');
            $this->db->where('username',$this->session->userdata('username'));
            $this->db->where('active','1');
            $this->db->order_by("datepost", "desc"); 
            $query = $this->db->get();
            return $query->result();
        }
        function topic_insert()
        {
        $data = array(
                    'username' => $this->session->userdata('username') ,
                    'topic' => $_POST['topic'] ,
                    'body' => $_POST['body'],
                    'datepost' => date('Y-m-d h:i:s'),
                    'active' => '1'
                    );
        return $insert = $this->db->insert('tbl_forum_topic', $data);
        }
        function topic_delete()
        {
            $this->db->where('id', $this->uri->segment(3));
            $this->db->delete('tbl_forum_topic'); 
        }
        function topic_page()
        {
            $this->db->select('id,username,topic,body,datepost');
            $this->db->from('tbl_forum_topic');
            $this->db->where('id',$this->uri->segment(3));
            $this->db->order_by("datepost", "desc"); 
            $query = $this->db->get();
            return $query->result();
        }
        function get_topic()
        {
            $this->db->select('id,topic,body,datepost,username');
            $this->db->from('tbl_forum_topic');
            $this->db->where('active','1');
            $this->db->order_by("datepost", "desc");
            $this->db->order_by("topic", "asc"); 
            $this->db->limit(10,$this->uri->segment(3));
            $query=$this->db->get();
            return $query->result();
        }
        function latest_topic()
        {
            $this->db->select('id,topic,body,datepost,username');
            $this->db->from('tbl_forum_topic');
            $this->db->where('active','1');
            $this->db->order_by("datepost", "desc");
            $this->db->order_by("topic", "asc"); 
            $this->db->limit(10,$this->uri->segment(3));
            $query=$this->db->get();
            return $query->result();
        }
        function get_comment()
        {
            $this->db->select('topic_id,author,datecomment,comment');
            $this->db->from('tbl_forum_comment');
            $this->db->where('topic_id',$this->uri->segment(3));
            $this->db->where('active','1');
            $this->db->order_by("datecomment", "desc");
            $query=$this->db->get();
            return $query->result();
        }
        function comment_insert()
        {
        $data = array(
                    'topic_id' => $_POST['topic_id'] ,
                    'author' => $_POST['author'] ,
                    'comment' => $_POST['comment'],
                    'datecomment' => date('Y-m-d h:i:s'),
                    'username'=>$_POST['username']
                    );
        return $insert_comment = $this->db->insert('tbl_forum_comment', $data);
        }
        function comment_delete()
        {
            $this->db->where('id', $this->uri->segment(3));
            $this->db->delete('tbl_forum_comment'); 
        }
    }
?>