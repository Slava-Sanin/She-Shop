<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
  
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
	  
    $products_list = $this->model_cms->getProductsList();

    if(!empty($products_list['products'])){
      
      $this->data['content'] = $this->parser->parse('cms/all_products', $products_list, true);
      
    }
    
    $this->load->view('cms/main', $this->data);
    
	}

///////////////////////////////////////////////////////////////////////////////////////////////

  public function orders(){
    
    $orders['orders'] = $this->model_cms->getOrders();
    
    if(count($orders) > 0){
      
      $this->data['content'] = $this->load->view('cms/orders', $orders, true);
      
    }
    
    $this->load->view('cms/main', $this->data);
    
  }

///////////////////////////////////////////////////////////////////////////////////////////////

  public function addProduct()
  {

    $this->post = $this->input->post(null, true);

      $this->form_validation->set_rules('category', 'Category', 'callback_category_choose');
      $this->form_validation->set_rules('title', 'Title', 'trim|required');
      $this->form_validation->set_rules('description', 'Description', 'trim|required');
      $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');

    if ($this->form_validation->run() == FALSE)
    {

      $categories = $this->model_cms->getCategories();
      
      if($categories)
      {
        
        $this->data['categories'] = $this->parser->parse('cms/categories_parser', $categories, true);
        $this->data['content'] = $this->load->view('cms/addProduct_form', $this->data, true);   
             
      } else {
     			     $this->data['content'] = 'No categories';
   		     }

    }
    else {
                if (isset($this->post['submit']))
                {
                    $data_image = $this->do_upload();
                    $image_name = $data_image['file_name'];
                    $this->post['image'] = $image_name;

                    if (!isset($this->post['visibility'])) {
                        $this->post['visibility'] = '0';
                    }

                    //insert product to db
                    $this->model_cms->insertProduct($this->post);
                    redirect( site_url() . 'cms/dashboard/' );
                }
           }

      $this->load->view('cms/main', $this->data);
  }

///////////////////////////////////////////////////////////////////////////////////////////////

  public function deleteProduct($id){
    
    $post = $this->input->post(null, true); 
    $this->data['id'] = $this->security->xss_clean($id);
    
    if(isset($post['delete_submit'])){
      
      $this->model_cms->deleteProduct($this->data['id']);
      redirect( site_url() . 'cms/dashboard/' );
      
    }
    
    $this->data['content'] = $this->load->view('cms/delete_form', $this->data, true);
    $this->load->view('cms/main', $this->data);
        
  }

///////////////////////////////////////////////////////////////////////////////////////////////

  public function editProduct($id = null, $from_form = null){

      $this->post = $this->input->post(null, true);

      if (!$from_form) {
          $id = $this->security->xss_clean($id);
          $this->post = $this->model_cms->getItemById($id, "products");
          $this->id = $id;
      }

      $this->form_validation->set_rules('category', 'Category', 'callback_category_choose');
      $this->form_validation->set_rules('title', 'Title', 'trim|required');
      $this->form_validation->set_rules('description', 'Description', 'trim|required');
      $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');

      if ($this->form_validation->run() == FALSE)
      {
          $categories = $this->model_cms->getCategories();

          if($categories)
          {
              $this->data['categories'] = $this->parser->parse('cms/categories_parser', $categories, true);
              $this->data['content'] = $this->load->view('cms/editProduct_form', $this->data, true);

          } else {
                    $this->data['content'] = 'No categories';
                 }

      } else {
                if (isset($this->post['edit_submit']))
                    {

                      $data_image = $this->do_upload();
                      $image_name = $data_image['file_name'];
                      if ($image_name) $this->post['image'] = $image_name;
                      else $this->post['image'] = "no_image.png";

                      $this->post['visibility'] = (!isset($this->post['visibility'])) ? '0' : '1';

                      unset($this->post['edit_submit']);

                      //update product in db
                      $this->model_cms->updateProduct($this->post, $id);

                      redirect( site_url() . 'cms/dashboard/' );
                    }
             }

      $this->load->view('cms/main', $this->data);

  }

///////////////////////////////////////////////////////////////////////////////////////////////

  public function do_upload() {
    
    $config['upload_path'] = './public/images/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '20971520';  // 20 MB
    $config['max_width']  = '5000';
    $config['max_height']  = '5000';
    $config['encrypt_name']  = true;

    $this->load->library('upload', $config);
    $this->upload->do_upload();
    return $this->upload->data();

  }

///////////////////////////////////////////////////////////////////////////////////////////////

    public function category_choose($str){

        if ($str == '-1')
        {
            $this->form_validation->set_message('category_choose', 'Choose the category!');
            return FALSE;
        }
        else
        {
            return TRUE;
        }

    }

}
