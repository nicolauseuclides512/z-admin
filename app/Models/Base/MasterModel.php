<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Models\Base;


abstract class MasterModel extends BaseModel
{
    /**
     * @override boot
     * it will running validation rules in bootObservable class
     */
    protected static function boot()
    {
        parent::boot();
        self::bootObservable();
    }
}
