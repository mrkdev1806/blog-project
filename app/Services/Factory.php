<?php
namespace App\Services;

class Factory {
    public static function make($class) {
        return new $class();
    }
}