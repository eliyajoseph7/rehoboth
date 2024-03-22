<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffAllowance extends Model
{
    use HasFactory;

    public function scopeSearch($qs, $keyword) {
        $qs->where('amount', 'like', '%'.$keyword.'%')
            ->orWhereHas('staff', function($query) use($keyword) {
                $query->where('name', 'like', '%'.$keyword.'%');
            });
    }

    public function staff() {
        return $this->belongsTo(Staff::class);
    }
}
