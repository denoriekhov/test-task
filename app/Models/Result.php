<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
      'url',
      'position',
      'scanned_at'
    ];

    public function getScannedAtAttribute() {
        try {
            return (new Carbon($this->attributes['scanned_at']))->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}
