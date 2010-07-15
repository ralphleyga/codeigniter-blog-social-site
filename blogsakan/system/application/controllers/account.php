<?php
    class Account extends Controller {
        function Account()
        {
            parent::Controller();
            $this->load->model('Rightside');
            $this->load->library('session');
	    $this->load->model('Accountmodel');
	    $this->load->model('Forummodel');
        }
        function index()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username','Username', 'required|callback_username_check');
            $this->form_validation->set_rules('password','Password', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                $data['msg']=validation_errors();
                $this->load->view('user/errorsignin',$data);
            }
            else
            {
    	        $data = array(
                   'username'  => $_POST['username'],
                   'logged_in'  => TRUE
                );
		
		$data1 = array(
                            'username' => $_POST['username'] ,
			    'datelog' =>date('Y-m-d h:i:s')
                            
                         );
                $this->db->insert('tbl_userlog', $data1);
		
                $this->session->set_userdata($data);                
                redirect('account/user/');
            }
        }
        function user()
        {
            if ($this->session->userdata('logged_in') != TRUE)
            {
                redirect('account/log');
            }
            else
	    {
            $this->load->view('user/login_success');
	    }
            
        }
        function username_check()
        {
            $this->db->where('username', $_POST['username']);
            $this->db->where('password', $_POST['password']);
            $this->db->where('active', '1');
            
            $query = $this->db->get('tbl_user');
            
            foreach ($query->result() as $row)
            {
                //$row->title;
            }
            
            if ($query->num_rows()==0)
            {
                $this->form_validation->set_message('username_check', 'Tthe %s or Password is invalid.');
                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }
        function signout()
        {
            $this->load->view('user/user_signout');
        }
        function signoff()
        {
            $this->session->sess_destroy();
            redirect('account/signout');
        }
        function log()
        {
            $this->load->view('logout');
        }
	function forgotpassword()
	{
	    $this->load->view('user/forgotpassword');
	}
    }

?>