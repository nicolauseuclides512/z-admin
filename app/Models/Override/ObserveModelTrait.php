<?php
/**
 * @author Jehan Afwazi Ahmad <jee.archer@gmail.com>.
 */

namespace App\Models\Override;

use App\Models\Base\BaseModel;
use Illuminate\Support\Facades\Validator;

trait ObserveModelTrait
{
    public static function bootObservable()
    {
        static::saved(function (BaseModel $model) {

            if ($model::$autoValidate) {
                $validation = Validator::make($model->attributes, $model::rules($model->id));

                #cheking validation
                if ($validation->fails()) {
                    $model->errors = $validation->messages();
                    return false;
                } else {
                    return true;
                }
            }
        });

        static::saving(function (BaseModel $model) {

            if ($model::$autoValidate) {
                $validation = Validator::make($model->attributes, $model::rules($model->id));

                #cheking validation
                if ($validation->fails()) {
                    $model->errors = $validation->messages();
                    return false;
                } else {
                    return true;
                }
            }
        });

        static::updated(function (BaseModel $model) {

        });

        static::updating(function (BaseModel $model) {

        });

        static::deleted(function (BaseModel $model) {


        });

        static::deleting(function (BaseModel $model) {


        });
    }
}
