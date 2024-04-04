<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    use HasFactory;

    protected $table = 'tbl_images' ;
    protected $primaryKey = 'user_id';
    protected $fillable = [
	'user_id',
    'image_id',
    'image',
    'image_name'
    ];
}
