<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialLink extends Model
{

// use SoftDeletes;
    protected $fillable = [
        'platform',
        'url',
        'linkable_type',
        'linkable_id',
    ];

    public function linkable()
    {
        return $this->morphTo();

    }
}
