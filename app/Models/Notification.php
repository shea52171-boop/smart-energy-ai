<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{
    protected $fillable = [

    'smart_alert_id',

    'recipient',

    'message',

    'status',

    'sent_at',

    'read_at'

];
}

