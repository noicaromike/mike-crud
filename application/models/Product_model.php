<?php

class Product_model extends CI_Model
{
    // create product
    public function createProduct($data)
    {
        $created = $this->db->insert('product', $data);
        if ($created) {
            return true;
        } else {
            return false;
        }
    }

    // get all products
    public function getAllProducts()
    {
        $query = $this->db->query("SELECT * FROM product ORDER BY id DESC ");
        $products = $query->result();
        if ($query) {
            return $products;
        } else {
            return false;
        }
    }

    // get product by id
    public function getProductById($id)
    {
        $query = $this->db->query("SELECT * FROM product WHERE id = $id");
        $product = $query->row();
        if ($query) {
            return $product;
        } else {
            return false;
        }
    }

    // update product
    public function updateProduct($data)
    {
        $this->db->where('id', $data['id']);
        $update = $this->db->update('product', $data);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }
    // delete product
    public function deleteProductById($id)
    {
        $this->db->where('id', $id);
        $delete = $this->db->delete('product');
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }
}
