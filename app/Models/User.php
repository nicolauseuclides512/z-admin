<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    const GENDERS = [
        0 => 'Not known',
        1 => 'Male',
        2 => 'Female',
        9 => 'Not applicable'
    ];

    const STATUS_ALL = 9;
    const STATUS_DELETED = -1;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'gender',
        'phone',
        'photo',
        'country_id',
        'province_id',
        'district_id',
        'region_id',
        'profession',
        'position',
        'biography',
        'type',
        'status',
        'password',
        'postal_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeFilter($q, $filterBy = "", $key = "")
    {
        $data = $q;

        switch ($filterBy) {
            case self::STATUS_ACTIVE :
                $data->where($this->columnStatus, "=", self::STATUS_ACTIVE);
                break;
            case self::STATUS_INACTIVE :
                $data->where($this->columnStatus, "=", self::STATUS_INACTIVE);
                break;
        }

        if (!empty($key)) {
            $data = $data
                ->where("title", "ILIKE", "%" . $key . "%");
        }


        return $data;
    }

    public static function inst()
    {
        return new self();
    }

}
