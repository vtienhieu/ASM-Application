<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Categories extends Model
{
    use Sortable;
    public $sortable = ['id',
    'name',
    'description'];
}
