<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = ['updated_at', 'created_at'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'topic_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'topic_id', 'id');
    }
}
