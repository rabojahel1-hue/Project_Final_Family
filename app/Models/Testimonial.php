<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Testimonial extends Model
{
    use HasFactory,SoftDeletes;



    protected $fillable = [
        'client_name',
        'client_position',
        'client_image',
        'content',
        'rating',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'rating' => 'integer'
    ];

    public function socialLinks()
{
    return $this->morphMany(SocialLink::class, 'linkable');
}
}
