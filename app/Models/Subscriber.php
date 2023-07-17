<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'gender',
        'birthday',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($subscriber) {
            Mail::to($subscriber->email)->send(new Welcome($subscriber));
        });
        
    }
}
