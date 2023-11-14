<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

      // Relación "belongsTo" con el modelo Host
      public function host()
      {
          return $this->belongsTo(Host::class);
      }
}
