<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';
    protected $fillable = ['product_id','user_id','comment','score'];

    /**
     * Relationship tables.
     *
     * @return array
     */
    public function users()
    {
        return $this->hasOne('App\Models\Frontend\User', 'id', 'user_id');
    }
}
