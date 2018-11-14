<?php

namespace AgePsychoSocial;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the users for the role.
     */
    public function users()
    {
        return $this->hasMany('AgePsychoSocial\User');
    }
}
