<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        try {
            $this->call->database();
        } catch (Throwable $e) {
            // Gracefully continue when no database is configured yet.
        }

        $this->call->model('UsersModel');
    }

    public function index()
    {
        $data['users'] = $this->UsersModel->all();
        $this->call->view('users', $data);
    }
}