<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partai extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public function gelanggang(){
        return $this->belongsTo(Gelanggang::class,'gelanggang_id');
    }
}
