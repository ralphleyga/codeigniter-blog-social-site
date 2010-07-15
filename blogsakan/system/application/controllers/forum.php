<?php
    class Forum extends Controller {
        function Forum()
        {
            parent::Controller();
            $this->load->model('Rightside');
            $this->load->model('Forummodel');
            $this->load->model('Accountmodel');
             $this->load->library('form_validation');
             $this->load->library('pagination');
        }
        function index()
        {
            $this->load->view('forum_page/forum_view');
        }
        function forum_manager()
        {
            $this->load->view('forum_page/forum_user');
        }
        function add_topic()
        {
            $this->load->view('forum_page/forum_add');
        }
        function save_topic()
        {
            $this->form_validation->set_rules('topic','Topic','required');
            $this->form_validation->set_rules('body','Body','required');
            if ($this->form_validation->run()==FALSE)
            {
                $this->load->view('forum_page/forum_add');
            }
            else
            {
                $this->Forummodel->topic_insert();
                redirect('forum/forum_manager');
            }
        }
        function delete_topic()
        {
            $this->Forummodel->topic_delete();
            redirect('forum/forum_manager');
        }
        function topic()
        {
            $this->load->helper('smiley');
            $this->load->library('table');
		
		$image_array = get_clickable_smileys('http://localhost/bsim/images/smileys/');

		$col_array = $this->table->make_columns($image_array, 8);		
			
	    $data['smiley_table'] = $this->table->generate($col_array);
            $this->form_validation->set_rules('author','Author','required');
            $this->form_validation->set_rules('comment','Comment','required');
            $this->form_validation->set_rules('captcha','Captcha', 'required|matches[conf_captcha]');
            $this->form_validation->set_rules('conf_captcha','Captcha', 'required|xss_clean');
            if ($this->form_validation->run()==FALSE)
            {
                //redirect('forum/topic/'. $_POST['topic_id']);
                //$this->load->view('forum_page/forum_topic');
                $this->load->view('forum_page/forum_topic',$data);
                //$data['topic_id']= $_POST['topic_id'];
                //$this->load->view('comment_error',$data);
            }
            else
            {
                $this->Forummodel->comment_insert();
                redirect('forum/topic/'. $_POST['topic_id']);
            }
            
            //$this->load->view('forum_page/forum_topic');
        }
        function page()
        {
            $this->load->view('forum_page/forum_view');
        }
        function delete_comment()
        {
            $this->Forummodel->comment_delete();
            redirect('comments/');
        }
        function comment_error()
        {
            $this->load->view('comment_error');
        }
        function modify()
        {
            $this->form_validation->set_rules('topic','Topic','required');
            $this->form_validation->set_rules('body','Body','required');
            if ($this->form_validation->run()==FALSE)
            {
                $this->load->view('forum_page/forum_edit');
            }
            else
            {
                $this->Accountmodel->update_topic();
                redirect('forum/forum_manager');
            }
            
        }
    }
?>