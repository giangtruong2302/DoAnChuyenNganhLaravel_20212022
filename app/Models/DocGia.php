<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocGia extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'hoten','username','password','phone','email'
    ];
    protected $primaryKey = "id";
    protected $table ="docgia";}
