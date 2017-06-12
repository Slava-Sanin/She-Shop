<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends MY_Controller {
  
  public $post, $id;
  
  function __construct(){
    
    parent::__construct();
    
    if( ! $this->data['is_admin']) {
      
      redirect(site_url() . 'user/login/');
      
    }
    
    $this->load->library('form_validation');
    
    $this->load->model('model_cms');
    
  }

///////////////////////////////////////////////////////////////////////////////////////////////

  public function index(){
    
    $menu = $this->model_cms->getMenu();

    if($menu){
      
      $this->data['content'] = $this->parser->parse('cms/menu', $menu, true);
      
    }
    
    $this->load->view('cms/main', $this->data);
    
  }

///////////////////////////////////////////////////////////////////////////////////////////////

  public function addMenu(){
    
    $this->post = $this->input->post(null, true);
    
    $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
    $this->form_validation->set_rules('link', 'Link', 'trim|required|xss_clean');
    
    if ($this->form_validation->run() == false){
      
      $this->data['content'] = $this->load->view('cms/add_menu_form', null, true);
      $this->load->view('cms/main', $this->data);   
       
    } else {
      
      $this->model_cms->saveMenu($this->post);
      redirect(site_url() . 'cms/menu/');
      
    }
        
  }

///////////////////////////////////////////////////////////////////////////////////////////////

  public function editMenu($id = null,  $from_form = null){

      $this->post = $this->input->post(null, true);

      if (!$from_form) {
          $id = $this->security->xss_clean($id);
          $this->post = $this->model_cms->getItemById($id, "menu");
          $this->id = $id;
      }

      $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
      $this->form_validation->set_rules('link', 'Link', 'trim|required|xss_clean');

      if ($this->form_validation->run() == false){

          $this->data['content'] = $this->load->view('cms/edit_menu_form', null, true);
          $this->load->view('cms/main', $this->data);

      } else {

          $this->model_cms->updateMenu($this->post, $id);
          redirect(site_url() . 'cms/menu/');

      }

  }

///////////////////////////////////////////////////////////////////////////////////////////////

  public function deleteMenu($id = null){
    
    $this->post = $this->input->post(null, true);
        
    $id = $this->security->xss_clean($id);
    
    if($id){
      
      if(isset($this->post['delete_submit'])){
        
        $this->model_cms->deleteMenu($id);
        redirect(site_url() . 'cms/menu/');
        
      }
      
     $this->data['id'] = $id;
     $this->data['content'] = $this->load->view('cms/delete_menu_form', $this->data, true); 
      
    }

    $this->load->view('cms/main', $this->data);
    
  }

}
