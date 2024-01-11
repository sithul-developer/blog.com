<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotionals extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'order','options', 'image', 'status','Is_deleted',
    ];
    public function  getImage()
    {
        if (!empty($this->image && file_exists('storage//media/'.$this->image))) {
            return asset('storage//media/'.$this->image);
        } else {
            return "";
        }

    }
   
}
