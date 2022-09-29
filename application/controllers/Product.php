<?php

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Product_model');
        // helper folder
        $this->load->helper('session');
    }
    // create Product
    public function product()
    {
        prevention();

        $data = array(
            'product_code' => '',
            'name' => '',
            'price' => '',
            'description' => '',
            'qty' => '',
            'product_codeError' => '',
            'nameError' => '',
            'priceError' => '',
            'descriptionError' => '',
            'qtyError' => '',

        );

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'product_code' => trim($this->input->post('product_code')),
                'name' => trim($this->input->post('name')),
                'price' => trim($this->input->post('price')),
                'description' => trim($this->input->post('description')),
                'qty' => trim($this->input->post('qty')),
                'product_codeError' => '',
                'nameError' => '',
                'priceError' => '',
                'descriptionError' => '',
                'qtyError' => '',

            );
            $numberValidation = "/^[0-9]*$/";

            if (empty($data['product_code'])) {
                $data['product_codeError'] = 'Please enter product code';
            }
            if (empty($data['name'])) {
                $data['nameError'] = 'Please enter product name';
            }
            if (empty($data['price'])) {
                $data['priceError'] = 'Please enter product price';
            } elseif (!preg_match($numberValidation, $data['price'])) {
                $data['priceError'] = 'Please input numbers only';
                $data['price'] = '';
            }

            if (empty($data['description'])) {
                $data['descriptionError'] = 'Please enter product description';
            }
            if (empty($data['qty'])) {
                $data['qtyError'] = 'Please enter product quantity';
            } elseif (!preg_match($numberValidation, $data['qty'])) {
                $data['qtyError'] = 'Please input numbers only';
                $data['qty'] = '';
            }
            if (empty($data['product_codeError']) && empty($data['nameError']) && empty($data['priceError']) && empty($data['descriptionError']) && empty($data['qtyError'])) {
                $data = array(
                    'users_id' => $_SESSION['id'],
                    'product_code' => trim($this->input->post('product_code')),
                    'name' => trim($this->input->post('name')),
                    'price' => trim($this->input->post('price')),
                    'description' => trim($this->input->post('description')),
                    'qty' => trim($this->input->post('qty')),
                    'created_at' => date('Y-m-d H:i:s'),


                );
                $created = $this->Product_model->createProduct($data);
                if ($created) {
                    redirect(base_url('product_list'));
                } else {
                    die('Something went wrong mike');
                }
            }
        }

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('product/product', $data);
        $this->load->view('templates/header');
    }

    // logout user
    public function logout()
    {
        if (isloggedIn()) {
            unset($_SESSION['id']);
            unset($_SESSION['first_name']);
            unset($_SESSION['last_name']);
            unset($_SESSION['email']);
            unset($_SESSION['address']);
            unset($_SESSION['contact']);
            redirect(base_url('login'));
        }
    }




    // product list

    public function product_list()
    {
        prevention();
        $Allproducts = $this->Product_model->getAllProducts();
        $data = array(
            'products' => $Allproducts,
        );
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('product/product_list', $data);
        $this->load->view('templates/header');
    }
    public function edit($id)
    {
        $product = $this->Product_model->getProductById($id);
        // echo '<prev>';
        // print_r($product);
        // echo '</prev>';
        prevention();

        $data = array(
            'id' => $id,
            'product' => $product,
            'product_code' => '',
            'name' => '',
            'price' => '',
            'description' => '',
            'qty' => '',
            'product_codeError' => '',
            'nameError' => '',
            'priceError' => '',
            'descriptionError' => '',
            'qtyError' => '',

        );

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'id' => $id,
                'product' => $product,
                'product_code' => trim($this->input->post('product_code')),
                'name' => trim($this->input->post('name')),
                'price' => trim($this->input->post('price')),
                'description' => trim($this->input->post('description')),
                'qty' => trim($this->input->post('qty')),
                'product_codeError' => '',
                'nameError' => '',
                'priceError' => '',
                'descriptionError' => '',
                'qtyError' => '',

            );
            $numberValidation = "/^[0-9]*$/";

            if (empty($data['product_code'])) {
                $data['product_codeError'] = 'Please enter product code';
            }
            if (empty($data['name'])) {
                $data['nameError'] = 'Please enter product name';
            }
            if (empty($data['price'])) {
                $data['priceError'] = 'Please enter product price';
            } elseif (!preg_match($numberValidation, $data['price'])) {
                $data['priceError'] = 'Please input numbers only';
                $data['price'] = '';
            }

            if (empty($data['description'])) {
                $data['descriptionError'] = 'Please enter product description';
            }
            if (empty($data['qty'])) {
                $data['qtyError'] = 'Please enter product quantity';
            } elseif (!preg_match($numberValidation, $data['qty'])) {
                $data['qtyError'] = 'Please input numbers only';
                $data['qty'] = '';
            }
            if (empty($data['product_codeError']) && empty($data['nameError']) && empty($data['priceError']) && empty($data['descriptionError']) && empty($data['qtyError'])) {
                $data = array(
                    'id' => $id,
                    'users_id' => $_SESSION['id'],
                    'product_code' => trim($this->input->post('product_code')),
                    'name' => trim($this->input->post('name')),
                    'price' => trim($this->input->post('price')),
                    'description' => trim($this->input->post('description')),
                    'qty' => trim($this->input->post('qty')),
                    'updated_at' => date('Y-m-d H:i:s'),


                );
                $update = $this->Product_model->updateProduct($data);
                if ($update) {
                    redirect(base_url('product_list'));
                } else {
                    die('Something went wrong mike');
                }
            }
        }



        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('product/edit', $data);
        $this->load->view('templates/header');
    }


    public function delete($id)
    {
        $deleted = $this->Product_model->deleteProductById($id);
        if ($deleted) {
            redirect(base_url('product_list'));
        } else {
            die('Something went wrong mike');
        }
    }
}
