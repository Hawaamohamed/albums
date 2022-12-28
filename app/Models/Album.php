<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';
    protected $fillable = ['name'];
    public static $rules = [
        'name' => 'required|string', 
    ];
    public function pictures()
    {
        return $this->hasMany(Picture::class, 'album_id', 'id');
    }

 
}
