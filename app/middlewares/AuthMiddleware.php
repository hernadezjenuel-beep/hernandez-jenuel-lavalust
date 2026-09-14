<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle($next)
    {
        $session = lava_instance()->call->library('session');

        if (!$session->userdata('auth_user_id')) {
            $session->set_userdata('auth_intended_url', $_SERVER['REQUEST_URI'] ?? '/products');
            redirect('login');
            return;
        }

        return $next();
    }
}
