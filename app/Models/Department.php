<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departamentos';

    protected $primaryKey = 'departamento_id';

    protected $fillable = [
        'departamento'

    ];

}
