<?php
namespace Builder;

// Interface Builder
interface SQLQueryBuilder
{
    public function reset();
    public function select($fields = ['*']);
    public function from($table);
    public function where($condition);
    public function orderBy($fields);
    public function limit($limit);
    public function getQuery();
}