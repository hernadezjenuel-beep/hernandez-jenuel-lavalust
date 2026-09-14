<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductsModel extends Model
{
    protected $table = 'products';

    public function all()
    {
        return $this->db->table($this->table)->order_by('id', 'DESC')->get_all();
    }

    public function find($id)
    {
        return $this->db->table($this->table)->where('id', (int) $id)->get();
    }

    public function create(array $data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update($id, array $data)
    {
        return $this->db->table($this->table)->where('id', (int) $id)->update($data);
    }

    public function remove($id)
    {
        return $this->db->table($this->table)->where('id', (int) $id)->delete();
    }
}
