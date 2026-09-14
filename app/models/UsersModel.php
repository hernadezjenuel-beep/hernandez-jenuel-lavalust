<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model
{
    protected $table = 'users';
    protected $has_soft_delete = true;
    protected $soft_delete_column = 'deleted_at';

    public function __construct()
    {
        parent::__construct();
        $this->ensure_soft_delete_column();
    }

    public function find_by_username($username)
    {
        return $this->db->table($this->table)
            ->where('username', $username)
            ->where_null('deleted_at')
            ->get();
    }

    private function ensure_soft_delete_column()
    {
        $columns = [
            'password' => "VARCHAR(255) NOT NULL DEFAULT ''",
            'role' => "VARCHAR(20) NOT NULL DEFAULT 'user'",
            'is_active' => 'TINYINT(1) UNSIGNED NOT NULL DEFAULT 1',
            'deleted_at' => 'DATETIME NULL DEFAULT NULL',
        ];

        foreach ($columns as $name => $definition) {
            $exists = $this->db->raw(
                'SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = :table AND column_name = :column',
                ['table' => $this->table, 'column' => $name]
            )->fetchColumn();

            if ((int) $exists === 0) {
                $this->db->raw("ALTER TABLE users ADD COLUMN {$name} {$definition}");
            }
        }
    }
}