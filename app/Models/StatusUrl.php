<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusUrl extends Model
{
  protected $table = 'status_url';

    protected $fillable = [
        'request_id',
        'to_email',
        'description',
        'status',
        'status_code',
    ];

    public function request()
    {
      return $this->belongsTo(RequestModel::class, 'request_id');
    }
}
