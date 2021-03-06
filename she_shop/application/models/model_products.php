<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_products extends CI_Model{
  
  public function getCategories(){
    
    $categories = null;
    
    $query = $this->db->get('categories');
    
    if($query->num_rows() > 0){
      
      $categories['categories'] = $query->result_array();
      
    }
    
    return $categories;
    
  }
  
  public function getProducts($category){
    
    $products = null;
    
    $sql = "SELECT c.machine_name AS cat_machine,c.name,p.* FROM products p 
            JOIN categories c ON  c.id = p.categorie_id
            WHERE c.machine_name = ? AND p.visibility = 1";
            
    $query = $this->db->query($sql, array($category));
    
    if($query->num_rows() > 0){
      
      $products['products'] = $query->result_array();
      $products['cat_name'] = $products['products'][0]['name'];
      
    }
      
    return $products;
    
  }
  
  public function getItem($product){
    
    $item = null;
    
    $sql = "SELECT * FROM products WHERE machine_name = ?";
            
    $query = $this->db->query($sql, array($product));
    
    if($query->num_rows() > 0){
      
      $item = $query->row_array();
      
    }
      
    return $item;
    
  }



}
