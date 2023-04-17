<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribute extends Model
{
    use HasFactory;
    protected $table = 'contributes';
    public $timestamps = false;

    protected $primaryKey = 'id';
    protected $fillable = ['author', 'title', 'content'];



}
