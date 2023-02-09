<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Collection;
//use Illuminate\Database\Eloquent\Model;

abstract class QueryBuilder
{
    abstract function getAll(): Collection;
    //abstract function getNews(): Collection;
    //abstract function getNews(): void;
    //abstract function setModel(): void;
}
