<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

     /**
      * Get all of the replies for the Question
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function replies(): HasMany
     {
         return $this->hasMany(Reply::class);
     }

     /**
      * Get the category that owns the Question
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function category(): BelongsTo
     {
         return $this->belongsTo(Category::class);
     }
}
