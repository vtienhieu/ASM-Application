<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;

use Illuminate\Database\Eloquent\Model;

class Cource extends Model
{
    use Sortable;
    public $sortable = ['id',
    'name',
    'Description',
    'Credit'];
}
