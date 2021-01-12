<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact_Us extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','subject'];
}
