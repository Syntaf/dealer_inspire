<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    private const DEFAULT_LINE_SIZE = 76;

    protected $fillable = ['full_name', 'email', 'phone_number', 'message'];

    public function getMessageLinesAttribute()
    {
        return str_split($this->message, self::DEFAULT_LINE_SIZE);
    }
}
