<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $fillable  = [
        'image', 'title', 'sub_title', 'content', 'views', 'description', 'category_id', 'status', 'Is_deleted'
    ];
    public function incrementViewsCount()
    {
        $this->views++;
        $this->save();
    }
    public function category()
    {
        return $this->belongsTo(Category::class,);
    }
    //
    public function  getImage()
    {
        if (!empty($this->image && file_exists('storage//media/' . $this->image))) {
            return asset('storage//media/' . $this->image);
        } else {
            return "";
        }
    }
    public function  getImageContent()
    {
        if (!empty($this->image && file_exists('public//media/' . $this->image))) {
            return asset('public//media/' . $this->image);
        } else {
            return "";
        }
    }
}
