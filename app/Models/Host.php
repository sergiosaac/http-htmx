<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    use HasFactory;

    public function urls()
    {
        return $this->hasMany(Url::class);
    }

    public function host_print()
    {   
        if ($this->port == 80) {
            return $this->host;
        } else {
            return $this->host.':'.$this->port;
        }
    }
}
