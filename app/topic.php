<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class topic extends Model
{
    protected $primaryKey = 'TopicId';
    use Sortable;
    public $sortable = ['TopicId',
    'TopicName',
    'Description'];
}
