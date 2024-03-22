<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportCategory extends Model
{
    use HasFactory;

    public function scopeSearch($qs, $keyword) {
        $qs->where('name', 'like', '%'.$keyword.'%');
    }
}
