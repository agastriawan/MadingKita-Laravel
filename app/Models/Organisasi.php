<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $table = 'organisasis';
    protected $primarykey = 'id';

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'id';
    }
}