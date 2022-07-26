<?php
namespace Reviews;

use Config\DB;

class ReviewRepository
{
    protected $db;
    protected $table_name = 'guest_book';

    public function __construct()
    {
        $this->db = new DB();
    }

    /**
     * @return array
     */
    public function getMap():array
    {
        return [
            'id',
            'dtime',
            'name',
            'email',
            'body'
        ];

    }

    /**
     * @param int $limit
     * @param string $order
     * @return array
     */
    public function get($limit = 5, $order = 'dtime') : array
    {
        $result = [];
        $sql = 'SELECT ' . implode(', ',$this->getMap()) . ' FROM `' . $this->getTableName() .'` ORDER BY ' . $order . ' DESC  LIMIT ' . $limit.'';
        $query = $this->db->query($sql);
        while ($row = $query->fetch()) {
            $result[] = $row;
        }

        return $result ?: [];
    }

    /**
     * @param string $email
     * @param string $name
     * @param string $message
     * @return bool
     */
    public function add($email, $name, $message):bool
    {
        $result = [];
        $sql = "INSERT INTO {$this->getTableName()} (name, email, body, dtime) VALUES (?,?,?,?)";
        if($this->db->prepare($sql)->execute([$name, $email, $message, date('Y-m-d H:i:s')])) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getTableName():string
    {
        return $this->table_name;
    }
}
