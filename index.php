<?php

include_once __DIR__ . '/vendor/autoload.php';

\Deimos\ORM\Connection::setConfig([
    'default' => [
        'dsn'      => 'mysql:host=localhost;dbname=2222',
        'username' => 'root',
        'password' => '',
    ]
]);

$builder = new \Deimos\ORM\Builder();

$query = $builder->queryEntity(\Model\User::class)->where('id', '<', 777);

var_dump((string)$query);
var_dump($query->count());
var_dump($query->findOne());
var_dump($query->find());

$paginate = new \Deimos\Paginate\Paginate();

$paginate->queryPager($query);

$paginate->skip(1);
$paginate->take(1);

var_dump($paginate->currentItems());
var_dump($query->find());