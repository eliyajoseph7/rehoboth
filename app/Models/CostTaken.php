<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostTaken extends Model
{
    use HasFactory;

    public function scopeSearch($qs, $keyword) {
        $qs->where('amount', 'like', '%'.$keyword.'%')
            ->orWhere('form', 'like', '%'.$keyword.'%')
            ->orWhere('code', 'like', '%'.$keyword.'%')
            ->orWhereHas('client', function($query) use($keyword) {
                $query->where('name', 'like', '%'.$keyword.'%');
            })
            ->orWhereHas('paymentMethod', function($query) use($keyword) {
                $query->where('name', 'like', '%'.$keyword.'%');
            });
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function paymentMethod() {
        return $this->belongsTo(PaymentMethod::class);
    }
}
