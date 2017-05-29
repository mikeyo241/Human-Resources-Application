<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public static function activeUser() {
      return static::where('deleted', 0)->orderBy('name')->get();
    }

}
