<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends MY_Controller {
  
  public $post;
  
  function __construct(){
    
    parent::__construct();
    
    if( ! $this->data['is_admin']) {
      
      redirect(site_url() . 'user/login/');
      
    }
    
    $this->load->library('form_validation');
    
    $this->load->model('model_cms');
    
  }

    ////////////////////////////////////////////////////////////////////

  public function index(){
    
 //   echo 'all content';
      $content = $this->model_cms->getContent();

      if($content){

          $this->data['content'] = $this->parser->parse('cms/content', $content, true);

      }

      $this->load->view('cms/main', $this->data);
  }

    ////////////////////////////////////////////////////////////////////

  public function addContent(){

      $this->post = $this->input->post(null, true);

      $this->form_validation->set_rules('menu_link', 'Link', 'trim|required|xss_clean');
      $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
      $this->form_validation->set_rules('article', 'Content', 'trim|required|xss_clean');

      if ($this->form_validation->run() == false){

          $this->data['content'] = $this->load->view('cms/add_content_form', null, true);
          $this->load->view('cms/main', $this->data);

      } else {

          $this->model_cms->insertContent($this->post);
          redirect(site_url() . 'cms/content/');

      }

  }

    ////////////////////////////////////////////////////////////////////

    public function editContent($id = null,  $from_form = null){

        $this->post = $this->input->post(null, true);

        if (!$from_form) {
            $id = $this->security->xss_clean($id);
            $this->post = $this->model_cms->getItemById($id, "content");
           }

        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('article', 'Content', 'trim|required|xss_clean');

        if ($this->form_validation->run() == false){

            $this->data['content'] = $this->load->view('cms/edit_content_form', null, true);
            $this->load->view('cms/main', $this->data);

        } else {

            $this->model_cms->updateContent($this->post, $id);
            redirect(site_url() . 'cms/content/');

        }

    }

    ////////////////////////////////////////////////////////////////////

    public function deleteContent($id = null){

        $this->post = $this->input->post(null, true);

        $id = $this->security->xss_clean($id);

        if($id){

            if(isset($this->post['delete_submit'])){

                $this->model_cms->deleteContent($id);
                redirect(site_url() . 'cms/content/');

            }

            $this->data['id'] = $id;
            $this->data['content'] = $this->load->view('cms/delete_content_form', $this->data, true);

        }

        $this->load->view('cms/main', $this->data);

    }


}
