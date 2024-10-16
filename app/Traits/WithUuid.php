<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait WithUuid
{
    protected static function bootWithUuid()
    {
        static::creating(function ($model) {
            $uuid = Str::uuid()->toString();
            $model->id = $uuid;
            $model->created_by = $uuid; 
            $model->created_at = now();
        });
    }
}
