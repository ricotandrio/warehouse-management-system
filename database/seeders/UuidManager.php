<?php

namespace Database\Seeders;

use Illuminate\Support\Str;

class UuidManager
{
    private static $instance = null;
    protected $uuids = [];

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new UuidManager();
        }

        return self::$instance;
    }

    public function generate($key)
    {
        if (!isset($this->uuids[$key])) {
            $this->uuids[$key] = (string) Str::uuid();
        }

        return $this->uuids[$key];
    }

    public function get($key)
    {
        return $this->uuids[$key] ?? null;
    }
}
