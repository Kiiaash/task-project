<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;


    protected function task() : Attribute{
        return Attribute::make(
            //get:fn(string $value) => Str::title($value),
            set:fn(string $value) => Str::lower($value)
        );
    }

    // protected function task() : Attribute{
    //     return Attribute::make(get:fn(string $value)
    //     =>Str::kebab($value)
    //     );
    // }
}
