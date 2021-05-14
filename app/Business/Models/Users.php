<?php

namespace App\Business\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = "users";

    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

}
