<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * @NOTE: Array containing all fields which can intake mass assignment
     * (sending an array to the model to directly create a new record in DB)
     *
     */
    protected $fillable = ['user_id', 'title', 'body', 'image'];

    // Assign posts to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
