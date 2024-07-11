<?php
require 'vendor/autoload.php';

use Builder\MySQLQueryBuilder;
use Builder\SQLQueryDirector;

// Utilisation
$builder = new MySQLQueryBuilder();

// 1. select * from table
$query1 = $builder
    ->reset()
    ->select()
    ->from('users')
    ->getQuery();

echo $query1->getQuery() . "\n";

// 2. select [fields] from table
$query2 = $builder
    ->reset()
    ->select(['name', 'email'])
    ->from('users')
    ->getQuery();

echo $query2->getQuery() . "\n";

// 3. select [fields] from table where [field]=10
$query3 = $builder
    ->reset()
    ->select(['name', 'email'])
    ->from('users')
    ->where('id = 10')
    ->getQuery();

echo $query3->getQuery() . "\n";

// 4. select [field] from table order by [field*]
$query4 = $builder
    ->reset()
    ->select(['name'])
    ->from('users')
    ->orderBy(['name', 'email'])
    ->getQuery();

echo $query4->getQuery() . "\n";

// Utilisation du Director pour une requête complexe
$director = new SQLQueryDirector();
$director->setBuilder($builder);
$complexQuery = $director->buildComplexQuery(
    'users',
    ['name', 'email'],
    'age > 18',
    ['name'],
    10
);

echo $complexQuery->getQuery() . "\n";