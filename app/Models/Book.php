<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Book extends Model
{
    use HasFactory;
    use Sortable;
    
    /**
     * Field that results can be sorted by.
     * @var
     */
    public $sortable = ['title','author','published'];
}
