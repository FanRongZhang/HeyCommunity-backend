<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use AuraIsHere\LaravelMultiTenant\Traits\TenantScopedModelTrait;

class Timeline extends Model
{
    use SoftDeletes;
    use TenantScopedModelTrait;

    /**
     * Related User
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     *
     */
    public function author_like()
    {
        return $this->hasMany('App\TimelineLike')->with('author');
    }
}
