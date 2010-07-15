<?php
    class Message extends Controller {
        function Message()
        {
            parent::Controller();
            $this->load->model('Rightside');
            $this->load->model('Commentsmodel');
            $this->load->model('Messagemodel');
            $this->load->library('form_validation');
            $this->load->model('Accountmodel');
            $this->load->model('Profilemodel');
            $this->load->library('pagination');
        }
        function index()
        {
            $this->load->view('message/messageform');
        }
        function inbox()
        {
            $this->load->view('message/message_inbox');
        }
        function user()
        {
            $this->form_validation->set_rules('subject','Subject','required');
            $this->form_validation->set_rules('message','Message','required');
            if ($this->form_validation->run()==FALSE)
            {
                $this->load->view('message/messageform');
            }
            else
            {
                $this->Messagemodel->insert_message();
                $this->load->view('message/messagesend');
            }
        }
        function delete()
        {
            $this->db->where('id', $this->uri->segment(3));
            $this->db->delete('tbl_message');
            redirect('message/inbox');
        }
        function reply()
        {
            $this->form_validation->set_rules('subject','Subject','required');
            $this->form_validation->set_rules('message','Message','required');
            if ($this->form_validation->run()==FALSE)
            {
                $this->load->view('message/messagereply');
            }
            else
            {
                $this->Messagemodel->insert_message();
                $this->load->view('message/messagesend');
            }
        }
    }
?>