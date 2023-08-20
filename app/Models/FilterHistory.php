<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterHistory extends Model
{
    use HasFactory;
    protected $table='filter_history';
    protected $fillable=['count'];
    public $timestamps=false;
}
