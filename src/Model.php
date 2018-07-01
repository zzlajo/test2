<?php
namespace Src;

abstract class Model
{

    private $db;

    private $select = '*';

    private $where = ' WHERE';

    private $orderby = 'ORDER BY';

    private $take = ' LIMIT';

    public function __construct()
    {
        $conn = Database::getInstance();
        $this->db = $conn->getConnection();
    }


    public function create($data)
    {

        $query_string = "INSERT INTO {$this->table} (" . implode(',', $this->fillable) . ") VALUE (";

        for ($i = 0; $i < count($this->fillable); $i++) {
            $query_string .= "'{$data[$this->fillable[$i]]}'" . ($i == count($this->fillable) - 1 ? ')' : ', ');
        }

        $query = $this->db->prepare($query_string);
        return $query->execute();

    }


    public function get()
    {
        $queryString = "SELECT {$this->select} FROM {$this->table}";
        $queryString .= $this->where != ' WHERE' ? $this->where : '';
        $queryString .= $this->orderby != 'ORDER BY' ? $this->orderby : '';
        $queryString .= $this->take != ' LIMIT' ? $this->take : '';
        $query = $this->db->prepare($queryString);

        try {
            $query->execute();
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die();
        }

        $result = $query->fetchAll(\PDO::FETCH_OBJ);

        return $result;

    }


    public function select(...$fields)
    {
        $this->select = $this->select != '*' ? $this->select . ', ' . implode(',', $fields) : implode(', ', $fields);

        return $this;
    }

    public function orderBy($column, $direction = 'ASC')
    {
        if (is_array($column)) {
            $column = implode(', ', $column);
        }
        $this->orderby .= "{$column} {$direction}";

        return $this;

    }

    public function where($field, $operator, $value)
    {
        $this->where .= ($this->where != ' WHERE' ? ' AND ' : '') . " {$field} {$operator} '{$value}'";

        return $this;
    }

    public function orWhere($field, $operator, $value)
    {
        $this->where .= ($this->where != ' WHERE' ? ' OR ' : '') . " {$field} {$operator} '{$value}'";

        return $this;
    }

    public function take($rows)
    {
        $this->take .= " {$rows} ";

        return $this;
    }
}