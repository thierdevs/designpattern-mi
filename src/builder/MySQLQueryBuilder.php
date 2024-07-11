<?php
namespace Builder;

// Concrete Builder
class MySQLQueryBuilder implements SQLQueryBuilder
{
    private $query;

    public function reset()
    {
        $this->query = new SQLQuery();
        return $this;
    }

    public function select($fields = ['*'])
    {
        $fieldList = is_array($fields) ? implode(', ', $fields) : $fields;
        $this->query->setQuery("SELECT $fieldList");
        return $this;
    }

    public function from($table)
    {
        $this->query->setQuery($this->query->getQuery() . " FROM $table");
        return $this;
    }

    public function where($condition)
    {
        $this->query->setQuery($this->query->getQuery() . " WHERE $condition");
        return $this;
    }

    public function orderBy($fields)
    {
        $fieldList = is_array($fields) ? implode(', ', $fields) : $fields;
        $this->query->setQuery($this->query->getQuery() . " ORDER BY $fieldList");
        return $this;
    }

    public function limit($limit)
    {
        $this->query->setQuery($this->query->getQuery() . " LIMIT $limit");
        return $this;
    }

    public function getQuery()
    {
        return $this->query;
    }
}