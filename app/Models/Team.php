<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'position',
        'image',
        'bio',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'is_active',
    ];

    protected $table = 'teams';

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function socialLinks() {
        return $this->morphMany(SocialLink::class, 'linkable');
    }
}
