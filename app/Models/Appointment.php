<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Appointment extends Model
{
    // Dans App\Models\Appointment.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
