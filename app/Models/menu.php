<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [

'name',
'category',
'discription',
'price',
 'image',
'status',

];
}
