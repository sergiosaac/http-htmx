<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    use HasFactory;

    // Relación "hasMany" con el modelo Url
    public function urls()
    {
        return $this->hasMany(Url::class);
    }
}
