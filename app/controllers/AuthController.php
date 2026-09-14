<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session = $this->call->library('session');
    }

    public function login()
    {
        if ($this->session->userdata('auth_user_id')) {
            redirect('products');
            return;
        }

        $this->call->view('login', [
            'error' => null,
            'username' => '',
        ]);
    }

    public function authenticate()
    {
        $username = trim((string) $this->request->post('username'));
        $password = (string) $this->request->post('password');
        $admin_username = getenv('ADMIN_USERNAME') ?: 'admin';
        $admin_password = getenv('ADMIN_PASSWORD') ?: 'admin123';

        if (!hash_equals($admin_username, $username) || !hash_equals($admin_password, $password)) {
            $this->call->view('login', [
                'error' => 'Invalid username or password.',
                'username' => $username,
            ]);
            return;
        }

        $this->session->regenerate_on_login();
        $this->session->set_userdata([
            'auth_user_id' => 1,
            'auth_username' => $admin_username,
        ]);

        $intended = $this->session->userdata('auth_intended_url') ?: 'products';
        $this->session->unset_userdata('auth_intended_url');
        redirect($intended);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}