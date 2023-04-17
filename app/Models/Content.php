<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table = 'contents';

    public $timestamps = false;

    protected $primaryKey = 'id';
    protected $fillable = ['catagory', 'title', 'subtitle', 'imag', 'mainContent'];

}
