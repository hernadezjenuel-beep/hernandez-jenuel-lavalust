<?php

class Align_products_schema
{
    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->database();
        $this->_lava->call->dbforge();
    }

    public function up()
    {
        if (!$this->_lava->dbforge->table_exists('products')) {
            return;
        }

        if ($this->_lava->dbforge->column_exists('products', 'name') && !$this->_lava->dbforge->column_exists('products', 'product_name')) {
            $this->_lava->db->raw('ALTER TABLE products CHANGE COLUMN name product_name VARCHAR(100) NOT NULL');
        }

        if ($this->_lava->dbforge->column_exists('products', 'stock') && !$this->_lava->dbforge->column_exists('products', 'quantity')) {
            $this->_lava->db->raw('ALTER TABLE products CHANGE COLUMN stock quantity INT UNSIGNED NOT NULL DEFAULT 0');
        }

        $this->_lava->db->raw('ALTER TABLE products MODIFY COLUMN product_name VARCHAR(100) NOT NULL, MODIFY COLUMN price DECIMAL(10,2) NOT NULL DEFAULT 0, MODIFY COLUMN quantity INT UNSIGNED NOT NULL DEFAULT 0, MODIFY COLUMN created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');

        if ($this->_lava->dbforge->column_exists('products', 'updated_at')) {
            $this->_lava->dbforge->drop_column('products', 'updated_at');
        }
    }

    public function down()
    {
        if (!$this->_lava->dbforge->table_exists('products')) {
            return;
        }

        if ($this->_lava->dbforge->column_exists('products', 'product_name') && !$this->_lava->dbforge->column_exists('products', 'name')) {
            $this->_lava->db->raw('ALTER TABLE products CHANGE COLUMN product_name name VARCHAR(255) NOT NULL');
        }

        if ($this->_lava->dbforge->column_exists('products', 'quantity') && !$this->_lava->dbforge->column_exists('products', 'stock')) {
            $this->_lava->db->raw('ALTER TABLE products CHANGE COLUMN quantity stock INT UNSIGNED NOT NULL DEFAULT 0');
        }
    }
}
