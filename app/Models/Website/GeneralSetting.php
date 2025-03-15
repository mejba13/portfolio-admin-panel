<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_title',
        'site_tagline',
        'site_logo',
        'site_favicon',
        'contact_email',
        'contact_number',
    ];
}
