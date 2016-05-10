<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand_id',
        'name',
        'image',
        'old_price',
        'current_price',
        'quantity',
        'description',
        'des_tech'
    ];

    protected $table = 'products';

    /**
     * Relationship tables.
     *
     * @return array
     */
    public function brands()
    {
        return $this->hasOne('App\Models\Backend\Brand', 'id', 'brand_id');
    }

    /**
     * Upload image.
     *
     * @param string $image image
     *
     * @return \Illuminate\Http\Response
     */
    public static function upload($image)
    {
        $fileName = time() . $image->getClientOriginalName();
        $destinationPath = public_path('upload/');
        $image->move($destinationPath, $fileName);

        return $fileName;
    }
}
