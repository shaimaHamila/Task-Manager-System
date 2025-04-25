<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model

{
    protected $fillable = [
        'title',
        'is_completed',
        'user_id',
        'status',
    ];
    // Default value
    protected $attributes = [
        'is_completed' => false,
        'status' => 'pending',
    ];
    protected $casts = [
        'is_completed' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
