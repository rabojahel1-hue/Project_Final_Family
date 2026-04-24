<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;
    protected $table = 'doctors';

    protected $fillable = [
        'user_id',
        'title',
        'description_1',
        'description_2',
        'education',
        'experience',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function socialLinks() {
        return $this->morphMany(SocialLink::class, 'linkable');
    }
}
