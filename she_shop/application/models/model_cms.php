<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_cms extends CI_Model
{

    public function deleteMenu($id)
    {

        $sql = "DELETE FROM menu WHERE id = ?";
        $query = $this->db->query($sql, array($id));

        if ($this->db->affected_rows()) {

            $this->session->set_flashdata('feedback', 'Menu has been deleted!');

        }

    }

    public function saveMenu($post)
    {

        $machine_name = make_machine_name($post['link']);

        $sql = "INSERT INTO menu VALUES('',?,?,?)";
        $query = $this->db->query($sql, array($post['title'], $post['link'], $machine_name));

        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('feedback', 'Menu saved!');

        }

    }

///////////////////////////////////////////////////////////////////////////////////////////////////
    public function updateMenu($post, $id)
    {

        $machine_name = make_machine_name($post['link']);

        //  $sql = "UPDATE menu VALUES('',?,?,?) WHERE id = $id";
        //  $query = $this->db->query($sql, array($post['title'], $post['link'], $machine_name));

        $this->db->where('id', $id);
        $this->db->update('menu', array('title' => $post['title'], 'link' => $post['link'], 'machine_name' => $machine_name));

        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('feedback', 'Menu saved!');

        }

    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////
    public function getMenu()
    {

        $menu = null;

        $query = $this->db->get('menu');

        if ($query->num_rows() > 0) {

            $menu['menu'] = $query->result_array();

        }

        return $menu;

    }

    public function getOrders()
    {

        $orders = array();

        $sql = "SELECT u.name,o.data,o.order_date FROM orders o
            INNER JOIN users u ON o.uid = u.id
            ORDER BY o.order_date DESC";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $key => $row) {

                if ($row['data']) {

                    $data = json_decode($row['data']);
                    $row['data'] = $data;

                }

                $orders[] = $row;

            }

        }

        return $orders;

    }

    public function getProductsList()
    {

        $data = array();
        $x = 0;
        $query = $this->db->get('categories');

        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {

                $data['products'][$x] = $row;

                $sql = "SELECT *,id AS prg_id FROM products WHERE categorie_id = {$row['id']}";
                $items_query = $this->db->query($sql);

                if ($items_query->num_rows() > 0) {

                    foreach ($items_query->result_array() as $sub_row) {

                        $data['products'][$x]['items'][] = $sub_row;

                    }

                } else {

                    $data['products'][$x]['items'][] = array('title' => '');

                }

                $x++;

            }

        }

        return $data;

    }

    public function getCategories($id = null)
    {

        $categories = null;

        $sql = "SELECT * FROM categories";

        if (!is_null($id)) {

            $sql .= " ORDER BY CASE WHEN id = $id THEN 0 ELSE id END";

        }

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            $categories['categories'] = $query->result_array();

            if (is_null($id)) {

                $default = array('id' => -1, 'name' => 'Choose category...');
                array_unshift($categories['categories'], $default);

            }

        }

        return $categories;

    }

    public function deleteProduct($id)
    {

        $sql = "DELETE FROM products WHERE id = ?";
        $query = $this->db->query($sql, array($id));

        if ($this->db->affected_rows()) {

            $this->session->set_flashdata('feedback', 'Product has been deleted!');

        }

    }

    public function insertProduct($product_details)
    {

        $sql = "INSERT INTO products VALUES('', ?, ?, ?, ?, ?, ?, ?)";

        $machin_name = "mn-" . url_title($product_details['title']);

        $product[] = $product_details['title'];
        $product[] = $product_details['description'];
        $product[] = $product_details['category'];
        $product[] = $machin_name;
        $product[] = $product_details['image'];
        $product[] = $product_details['price'];
        $product[] = $product_details['visibility'];

        $this->db->query($sql, $product);

        if ($this->db->affected_rows()) {

            $this->session->set_flashdata('feedback', 'This product was saved!');


        } else {

            $this->session->set_flashdata('feedback', 'Error!  This product was not saved!');

        }

    }

    public function getItemById($id, $table)
    {

        $item = null;

        $sql = "SELECT * FROM $table WHERE id = ?";

        $query = $this->db->query($sql, array($id));

        if ($query->num_rows() > 0) {

            $item = $query->row_array();

        }

        return $item;

    }

    public function updateProduct($data, $id)
    {

        $data['machine_name'] = "mn-" . url_title($data['title']);
        $data['categorie_id'] = $data['category'];
        unset($data['category']);

        $this->db->where('id', $id);
        $this->db->update('products', $data);

        if ($this->db->affected_rows()) {

            $this->session->set_flashdata('feedback', 'The product was updated!');

        } else {

            $this->session->set_flashdata('feedback', 'Error!  The product was not updated!');

        }

    }

////////////////////////////////////////Content//////////////////////////////////////////////////////////
    public function updateContent($post, $id)
    {

        $this->db->where('id', $id);
        $this->db->update('content', array('title' => $post['title'], 'article' => $post['article']));

        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('feedback', 'Content updated!');

        }

    }

///////////////////////////////////////////////////////////////
    public function getContent()
    {

        $content = null;

        $query = $this->db->get('content');

        if ($query->num_rows() > 0) {

            $content['content'] = $query->result_array();

        }

        return $content;

    }

///////////////////////////////////////////////////////////////
    public function insertContent($post)
    {
        $sql = "INSERT INTO content VALUES('', ?, ?, ?)";

        $this->db->query($sql, array('title' => $post['title'], 'article' => $post['article'], 'menu_id' => $post['menu_link']));

        if ($this->db->affected_rows()) {

            $this->session->set_flashdata('feedback', 'New content was saved!');


        } else {

            $this->session->set_flashdata('feedback', 'Error!  This content was not saved!');

        }
    }
///////////////////////////////////////////////////////////////
    public function deleteContent($id)
    {

        $sql = "DELETE FROM content WHERE id = ?";
        $query = $this->db->query($sql, array($id));

        if ($this->db->affected_rows()) {

            $this->session->set_flashdata('feedback', 'Content has been deleted!');

        }

    }

}