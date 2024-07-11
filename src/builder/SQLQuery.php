<?php

 namespace Builder;

// Produit final : La requête SQL
class SQLQuery
{
    private $query = '';

    public function setQuery($query)
    {
        $this->query = $query;
    }

    public function getQuery()
    {
        return $this->query;
    }
}