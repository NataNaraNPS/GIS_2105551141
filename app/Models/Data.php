<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'tb_rs';

    protected $fillable = ['nama_rs','latitude','longtitude'];

    public $timestamps = false;


}
