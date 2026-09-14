<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('ProductsModel');
    }

    public function index()
    {
        $this->call->view('products', ['products' => $this->ProductsModel->all()]);
    }

    public function create()
    {
        $this->form('Create product', [], site_url('products/create'));
    }

    public function store()
    {
        $data = $this->validated_input();
        if ($data === false) {
            return;
        }

        $this->ProductsModel->create($data);
        redirect('products');
    }

    public function edit($id)
    {
        $product = $this->ProductsModel->find($id);
        if (!$product) {
            show_404();
            return;
        }

        $this->form('Edit product', $product, site_url('products/edit/' . (int) $id));
    }

    public function update($id)
    {
        if (!$this->ProductsModel->find($id)) {
            show_404();
            return;
        }

        $data = $this->validated_input();
        if ($data === false) {
            return;
        }

        $this->ProductsModel->update($id, $data);
        redirect('products');
    }

    public function delete($id)
    {
        $this->ProductsModel->remove($id);
        redirect('products');
    }

    private function form($title, array $product, $action, $error = null)
    {
        $this->call->view('product_form', compact('title', 'product', 'action', 'error'));
    }

    private function validated_input()
    {
        $product_name = trim((string) $this->request->post('product_name'));
        $description = trim((string) $this->request->post('description'));
        $price = (string) $this->request->post('price');
        $quantity = (string) $this->request->post('quantity');

        if ($product_name === '' || strlen($product_name) > 100 || !is_numeric($price) || (float) $price < 0 || filter_var($quantity, FILTER_VALIDATE_INT) === false || (int) $quantity < 0) {
            http_response_code(422);
            $this->form('Product', [
                'product_name' => $product_name,
                'description' => $description,
                'price' => $price,
                'quantity' => $quantity,
            ], $_SERVER['REQUEST_URI'] ?? site_url('products/create'), 'Enter a product name, a non-negative price, and a non-negative quantity.');
            return false;
        }

        return [
            'product_name' => $product_name,
            'description' => $description,
            'price' => number_format((float) $price, 2, '.', ''),
            'quantity' => (int) $quantity,
        ];
    }
}
