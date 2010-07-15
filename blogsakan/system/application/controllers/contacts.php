<?php
    class Contacts extends Controller {
        function Contacts()
        {
            parent::Controller();
            $this->load->model('Rightside');
            $this->load->model('Contactsmodel');
            $this->load->library('session');
	    $this->load->model('Accountmodel');
	    $this->load->model('Forummodel');
        }
        function index()
        {
            $this->load->view('contacts/contacts');
        }
        function add()
        {
            $this->Contactsmodel->add_contacts();
            redirect('contacts');
        }
        function delete()
        {
            $this->db->where('id', $this->uri->segment(3));
            $this->db->delete('tbl_contact');
            redirect('contacts');
        }
    }
?>