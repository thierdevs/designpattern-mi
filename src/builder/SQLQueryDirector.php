<?php
namespace Builder;

// Director (facultatif, mais utile pour des requêtes prédéfinies)
class SQLQueryDirector
{
    private $builder;

    public function setBuilder(SQLQueryBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function buildSimpleQuery($table)
    {
        return $this->builder
            ->reset()
            ->select()
            ->from($table)
            ->getQuery();
    }

    public function buildComplexQuery($table, $fields, $condition, $orderFields, $limit)
    {
        return $this->builder
            ->reset()
            ->select($fields)
            ->from($table)
            ->where($condition)
            ->orderBy($orderFields)
            ->limit($limit)
            ->getQuery();
    }
}