<?php

namespace AgePsychoSocial;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{

    protected $date = ['created_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getFormattedDateAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
