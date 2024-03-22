<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;

    public function scopeSearch($qs, $keyword) {
        $qs->where('amount', 'like', '%'.$keyword.'%')
            ->orWhereHas('paymentMethod', function($query) use($keyword) {
                $query->where('name', 'like', '%'.$keyword.'%');
            });
    }

    public function paymentMethod() {
        return $this->belongsTo(PaymentMethod::class);
    }
}
