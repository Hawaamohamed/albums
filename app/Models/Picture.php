<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $table = 'pictures';
    protected $fillable = ['picture_name', 'picture', 'album_id'];
    public static $rules = [
        'picture_name' => 'required', 
        'picture' => 'required',    
    ];
 
    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
