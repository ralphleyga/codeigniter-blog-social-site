<?php
    class Register extends Controller {
        function Register()
        {
            parent::Controller();
            $this->load->database();
            $this->load->model('Rightside');
            $this->load->model('Commentsmodel');
        }
        function index()
        {
            if ($this->session->userdata('logged_in') != TRUE)
            {
                $data['result']="";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username','Username', 'required|min_length[5]|max_length[15]|xss_clean|callback_username_check|alpha');
            $this->form_validation->set_rules('password','Password', 'required|min_length[5]|max_length[15]|matches[passconf]|xss_clean');
            $this->form_validation->set_rules('passconf','Password Configuration', 'required|xss_clean');
            $this->form_validation->set_rules('email','Email', 'required|valid_email');
            $this->form_validation->set_rules('captcha','Captcha', 'required|matches[conf_captcha]');
            $this->form_validation->set_rules('conf_captcha','Captcha', 'required|xss_clean');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('register/register_form',$data);
            }
            else
            {
                $data = array(
                            'username' => $_POST['username'] ,
                            'password' => $_POST['password'] ,
                            'email' => $_POST['email'] ,
                            'dateregister' =>date('Y-m-d h:i:s'),
                            'picture'=>'user.jpg',
                            'captcha'=>$_POST['captcha']
                            
                         );
                
                $this->db->insert('tbl_user', $data);
                redirect('register/registerresult');
            }            
            }
            else
	    {
            $this->load->view('user/login_success');
	    }
            
        }
        function registerresult()
        {
            $this->load->view('register/register_complete');
        }
        function username_check()
        {
            $this->db->where('username', $_POST['username']);
            $query = $this->db->get('tbl_user');
            
            foreach ($query->result() as $row)
            {
                $row->username;
            }
            
            if ($query->num_rows()==0)
            {
                return TRUE;
            }
            else
            {
                $this->form_validation->set_message('username_check', 'the %s already exist.');
                return FALSE;
            }
        }
    }

?>