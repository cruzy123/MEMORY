<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeInfo extends Model
{
    use HasFactory;
    protected $table = 'demandes_infos';
    protected $primaryKey = 'deminfo_id';
    protected $guarded = []; public $timestamps = false;
}
