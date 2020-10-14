<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Categories extends Model
{
    protected $primaryKey = 'cateID';

    use Sortable;
    public $sortable = ['cateID',
    'cateName',
    'description'];
}
