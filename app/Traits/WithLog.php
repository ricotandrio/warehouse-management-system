<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

Trait WithLog
{
    protected static function bootWithLog()
    {
        static::updating(function ($model) {
            $model->updated_at = now();
            $model->updated_by = Auth::user()->id ?? $model->id;
        });
    }
}