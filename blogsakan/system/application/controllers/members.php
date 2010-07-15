<?php
    class Members extends Controller {
        function Members()
        {
            parent::Controller();
            $this->load->model('Rightside');
            $this->load->library('pagination');
            $this->load->model('Accountmodel');
            $this->load->model('Forummodel');
            $this->load->helper('date');
        }
        function index()
        {
            redirect('members/get/');
        }
        function get()
        {
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->where('active','1');
            $this->db->order_by("username", "asc"); 
            $this->db->limit(20,$this->uri->segment(3));
            $data['query'] = $this->db->get();
            $this->load->view('members_page/list_members',$data);
        }
        function search()
        {
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('search','text', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                redirect();
            }
            else
            {
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->like('username',$_POST['search']);
            $this->db->order_by("username", "asc"); 
            $data['query'] = $this->db->get();
            $this->load->view('members_page/search_result',$data);
            }
            
        }
    }

?>