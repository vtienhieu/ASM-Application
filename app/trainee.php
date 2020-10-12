<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;


use Illuminate\Database\Eloquent\Model;

class trainee extends Model
{
    use Sortable;
    public $sortable = ['id',
    'TraineeName',
    'Address'];
}
