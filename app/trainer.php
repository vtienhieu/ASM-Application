<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class trainer extends Model
{
    protected $primaryKey = 'trainerID';
    use Sortable;
    public $sortable = ['trainerID',
    'TrainerName',
    'email'];

}
