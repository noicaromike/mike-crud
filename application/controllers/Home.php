<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('session');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Users_model');
    }
    public function register()
    {
        $data = array(
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'contact' => '',
            'address' => '',
            'first_nameError' => '',
            'last_nameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'contactError' => '',
            'addressError' => '',

        );
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'first_name' => trim($this->input->post('first_name')),
                'last_name' => trim($this->input->post('last_name')),
                'email' => trim($this->input->post('email')),
                'password' => trim($this->input->post('password')),
                'confirmPassword' => trim($this->input->post('confirmPassword')),
                'contact' => trim($this->input->post('contact')),
                'address' => trim($this->input->post('address')),
                'first_nameError' => '',
                'last_nameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'contactError' => '',
                'addressError' => '',

            );
            $nameValidation = "/^[a-zA-Z\s]+$/";
            $numberValidation = "/^[0-9]*$/";
            if (empty($data['first_name'])) {
                $data['first_nameError'] = 'Please enter your name';
            } elseif (!preg_match($nameValidation, $data['first_name'])) {
                $data['first_nameError'] = 'Please input letters only.';
                $data['first_name'] = '';
            }
            if (empty($data['last_name'])) {
                $data['last_nameError'] = 'Please enter your last name';
            } elseif (!preg_match($nameValidation, $data['last_name'])) {
                $data['last_nameError'] = 'Please input letters only.';
                $data['last_name'] = '';
            }
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter your email address';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter correct email address';
            } else {
                if ($this->Users_model->findUserByEmail($data['email'])) {
                    $data['emailError'] = 'Email address is already exist';
                }
            }
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter your Password';
            }
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter your password';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'Password did not match';
                }
            }
            if (empty($data['contact'])) {
                $data['contactError'] = 'Please enter your contact no.';
            } elseif (!preg_match($numberValidation, $data['contact'])) {
                $data['contactError'] = 'Please input numbers only.';
                $data['contact'] = '';
            }
            if (empty($data['address'])) {
                $data['addressError'] = 'Please enter your Address';
            }
            if (empty($data['first_nameError']) && empty($data['last_nameError']) && empty($data['emailError']) && empty($data['contactError']) && empty($data['addressError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {
                $pass = $data['password'];
                $hashpass = password_hash($pass, PASSWORD_DEFAULT);
                $data = array(
                    'first_name' => trim($this->input->post('first_name')),
                    'last_name' => trim($this->input->post('last_name')),
                    'email' => trim($this->input->post('email')),
                    'password' => $hashpass,
                    'contact' => trim($this->input->post('contact')),
                    'address' => trim($this->input->post('address')),
                );

                $register = $this->Users_model->registerUser($data);
                if ($register) {

                    redirect(base_url('login'));
                } else {
                    die('Something went wrong mike');
                }
            }
        }

        $this->load->view('templates/header');
        $this->load->view('home/register', $data);
        $this->load->view('templates/footer');
    }



    // login page
    public function login()
    {
        guard();
        $data = array(
            'email' => '',
            'password' => '',
            'emailError' => '',
            'passwordError' => '',

        );

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'email' => trim($this->input->post('email')),
                'password' => trim($this->input->post('password')),
                'emailError' => '',
                'passwordError' => '',

            );
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter correct email address.';
            }
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter password.';
            }
            if (empty($data['emailError']) && empty($data['passwordError'])) {
                $isLoggedIn = $this->Users_model->login($data['email'], $data['password']);

                if ($isLoggedIn) {
                    $this->createSessionUser($isLoggedIn);
                    // redirect(base_url('product'));
                } else {
                    $data['passwordError'] = 'Incorrect email address or password';
                }
            }
        }

        $this->load->view('templates/header');
        $this->load->view('home/login', $data);
        $this->load->view('templates/footer');
    }
    // create session 
    public function createSessionUser($isLoggedIn)
    {
        // echo '<prev>';
        // print_r($isLoggedIn);
        // echo '</prev>';
        $_SESSION['id'] = $isLoggedIn['id'];
        $_SESSION['first_name'] = $isLoggedIn['first_name'];
        $_SESSION['last_name'] = $isLoggedIn['last_name'];
        $_SESSION['email'] = $isLoggedIn['email'];
        $_SESSION['contact'] = $isLoggedIn['contact'];
        $_SESSION['address'] = $isLoggedIn['address'];
        redirect(base_url('product'));
    }
}
