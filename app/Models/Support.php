<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    public function scopeSearch($qs, $keyword) {
        $qs->where('amount', 'like', '%'.$keyword.'%')
            ->orWhereHas('supportCategory', function($query) use($keyword) {
                $query->where('name', 'like', '%'.$keyword.'%');
            });
    }

    public function supportCategory() {
        return $this->belongsTo(SupportCategory::class);
    }
}
