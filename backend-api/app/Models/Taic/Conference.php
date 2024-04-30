<?php

namespace App\Models\Taic;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;
    use HasUuids;
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

}
