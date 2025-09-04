<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    protected $table = 'requests';
    protected $fillable = ['url', 'email', 'name', 'duration_id', 'status', 'last_visited'];
    protected $casts = [
        'last_visited' => 'datetime',
    ];

public function duration()
{
    return $this->belongsTo(Duration::class, 'duration_id');
}

}
