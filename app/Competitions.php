<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competitions extends Model
{
    protected $fillable = [
        'title', 'type', 'expire_date','expire_time','country','gift_cate','gift','location','social_links','user_id','latitude','longitude','installed','approved'
    ];
}
