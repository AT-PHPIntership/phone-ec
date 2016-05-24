<?php
namespace App\Models\Frontend;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['id','name','email','enquiry'];
}