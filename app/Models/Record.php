<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'log_pertandingan';
    protected $guarded =['id'];
    use HasFactory;
}
