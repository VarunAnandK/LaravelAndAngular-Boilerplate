<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{

    use \OwenIt\Auditing\Auditable;
    use Notifiable;
    protected $guarded = [];
    protected $table = "user";
    public $timestamps = false;
}
