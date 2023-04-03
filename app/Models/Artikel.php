<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
        protected $table = 'artikels';
    protected $primarykey = 'id';

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'id';
    }
}

