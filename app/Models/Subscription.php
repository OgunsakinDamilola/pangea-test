<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['topic_id', 'url'];

    protected $hidden = ['updated_at', 'created_at'];

    public function topic()
    {
        $this->belongsTo(Topic::class, 'topic_id', 'id');
    }
}
