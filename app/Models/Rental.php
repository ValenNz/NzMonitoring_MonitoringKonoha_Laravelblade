<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table = 'Rental';
    protected $fillable = [
        'vehicle', 'driver', 'approval_id'
    ];

    public function approval()
    {
        return $this->hasOne(User::class);
    }
}
