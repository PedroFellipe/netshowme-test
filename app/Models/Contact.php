<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Storage;

class Contact extends BaseModel
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'ip',
        'attachment'
    ];

}
