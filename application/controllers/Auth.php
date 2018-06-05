<?php
/**
 * Created by PhpStorm.
 * User: Cyber2-PPLN Taipei
 * Date: 5/22/2018
 * Time: 10:31 AM
 */

class Auth extends CI_Controller {
    public function index()
    {
        if (isset($_SESSION['user_logged'])) {
            redirect(base_url()."user/profile","refresh");
        } else {
			redirect(base_url()."auth/login","refresh");
        }
    }

    public function login(){
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            //check user in database
            $this->load->model("Auth_m");
            $user = $this->Auth_m->login($username,$password);

            //if user exists
            if (!is_null($user)) {
                //temporary message
                $this->session->set_flashdata("success", "Login berhasil!");

                //set session variables
                $_SESSION['user_logged'] = TRUE;
                $_SESSION['username'] = $user->username;

                //redirect to profile page
                redirect(base_url()."user/profile","refresh");
            } else {
                $this->session->set_flashdata("error", "Username/password salah.");
                redirect(base_url()."auth/login", "refresh");
            }
        }

        if (isset($_SESSION['user_logged'])) {
            redirect(base_url()."user/profile","refresh");
        }

        //load view
        $this->load->view('admin/login');
    }

    public function logout() {
        unset($_SESSION);
        session_destroy();
        redirect(base_url()."auth/login", "refresh");
    }

    public function register() {

        if (isset($_SESSION['user_logged'])) {
            if (isset($_POST['register'])) {
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                //check user in database
                $this->load->model("Auth_m");
                $user = $this->Auth_m->login($username,$password);

                //if user exists
                if (!is_null($user)) {
                    //temporary message
                    $this->session->set_flashdata("error", "Registrasi gagal. User telah terdaftar!");

                    //redirect to profile page
                    redirect(base_url()."auth/register","refresh");
                } else {
                    $data = array(
                        'username' => $_POST['username'],
                        'email' => $_POST['email'],
                        'password' => md5($_POST['password']),
                        'gender' => $_POST['gender'],
                        'date_created' => date("Y-m-d h:i:sa"),
                        'phone' => $_POST['phone']
                    );
                    $result = $this->Auth_m->insert($data);
                    if ($result) {
                        $this->session->set_flashdata("success", "Registrasi berhasil!");
                        redirect(base_url() . "auth/register", "refresh");
                    } else {
                        $this->session->set_flashdata("error", "Registrasi gagal!");
                        redirect(base_url() . "auth/register", "refresh");
                    }
                }
            }
        } else {
            $this->session->set_flashdata("error", "Harap login terlebih dahulu.");
            redirect(base_url()."auth/login", "refresh");
        }

        //load view
        $this->load->view('admin/register');
    }
}
