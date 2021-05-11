
<?php

class Blog extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('Bloger');
    }
    
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => $_POST['firstName'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'confirm-password' => $_POST['userConfirmPassword'],
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm-password_err' => ''
            ];

            if (empty($data['name'])) $data['name_err'] = 'Please fill your name';
            if (empty($data['email'])) $data['email_err'] = 'Please fill your email';
            if (empty($data['password'])) $data['password_err'] = 'Please fill your password';
            if ($data['password'] !== $data['confirm-password']) $data['confirm-password_err'] = "passwords don't match";
            if (empty($data['confirm-password'])) $data['confirm-password_err'] = 'Please fill your confirm password';
            //check if email exist
            if ($this->userModel->getUserByEmail($data['email'])) {
                $data['email_err'] = 'Email already taken';
            }

            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm-password_err'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                //user register success
                if ($this->userModel->register($data['name'], $data['email'], $data['password'])) {
                    //user added successfully
                    redirect('blog/login');
                } else {
                    die("something went wrong!!");
                }
            } else {
                //user register faild
                $this->view("blog/register", $data);
            }
        } else {

            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm-password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm-password_err' => ''
            ];

            //load the register
            $this->view("blog/register", $data);
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'email_err' => '',
                'password_err' => ''
            ];

            //check if email exist
            if (!$this->userModel->getUserByEmail($data['email'])) {
                $data['email_err'] = "user not found";
            }

            if (empty($data['email'])) $data['email_err'] = 'Please fill your email';
            if (empty($data['password'])) $data['password_err'] = 'Please fill your password';


            if (empty($data['email_err']) && empty($data['password_err'])) {
                $user = $this->userModel->login($data['email'], $data['password']);



                if ($user) {
                    //set the sessions
                    $_SESSION['id'] = $user->id;
                    $_SESSION['firstName'] = $user->firstName;

                    redirect('posts');
                } else {
                    //password incorrect
                    $data['password_err'] = 'password incorrect';
                    $this->view('blog/login', $data);
                }
            } else {
                //user register faild
                $this->view("blog/login", $data);
            }
        } else {

            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            //load the register
            $this->view("blog/login", $data);
        }
    }

    //logout
    public function logout()
    {

        $_SESSION['id'] = null;
        $_SESSION['firstName'] = null;
        session_destroy();
        
        redirect('blog/login');
    }
}
