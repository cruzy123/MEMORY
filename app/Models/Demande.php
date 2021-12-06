<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $table = 'demandes';
    protected $primaryKey = 'dem_id';
    protected $guarded = []; public $timestamps = false;
}
