<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable  = [

        'logo', 'favaicon','description','status', 'Is_deleted'
    ];
    public function  getLogo()
    {
        if (!empty($this->logo && file_exists('storage//media/' . $this->logo))) {
            return asset('storage//media/' . $this->logo);
        } else {
            return "";
        }
    }
    public function  getFavaicon()
    {
        if (!empty($this->favaicon && file_exists('storage//media/' . $this->favaicon))) {
            return asset('storage//media/' . $this->favaicon);
        } else {
            return "";
        }
    }
}
