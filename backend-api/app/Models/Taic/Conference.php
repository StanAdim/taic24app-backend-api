<?php

namespace App\Models\Taic;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;
    use HasUuids;
    protected $keyType = 'string'; // specify the primary key type as string
    public $incrementing = false; // ensure that primary key is not auto-incrementing
    protected $fillable = [
        "conferenceYear",
        "startDate",
        "endDate",
        "venue",
        "theme",
        "aboutConference",
        "defaultFee",
        "foreignerFee",
        "guestFee",
        "lock"
    ];
    public function speakers()
    {
        return $this->hasMany(Speaker::class);
    }
}
