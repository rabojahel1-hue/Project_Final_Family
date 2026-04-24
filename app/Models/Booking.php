<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{

    use HasFactory, SoftDeletes;
   protected $fillable = ['patient_name', 'patient_phone', 'patient_email', 'doctor_id', 'service_id', 'booking_date', 'booking_time', 'status', 'notes'];
    protected $casts = [
        'booking_date' => 'date',
        'booking_time' => 'datetime:H:i',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function patient()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
