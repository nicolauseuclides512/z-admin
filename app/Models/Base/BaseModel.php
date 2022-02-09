<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Models\Base;

use App\Models\Override\ObserveModelTrait;
use App\Models\Override\RestModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class BaseModel extends Model
{
    use RestModelTrait, ObserveModelTrait;

    const STATUS_ALL = 9;
    const STATUS_DELETED = -1;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    protected $dates = ['created_at', 'updated_at'];

    protected static $autoValidate = true;

    protected $statusColumn = 'status';

    protected $filterCfg = [
        'all' => self::STATUS_ALL,
        'deleted' => self::STATUS_DELETED,
        'inactive' => self::STATUS_INACTIVE,
        'active' => self::STATUS_ACTIVE
    ];

    protected $nestedBelongConfigs = [];

    protected $nestedHasManyConfigs = [];

    public function filterCfg()
    {
        $config = config("filters." . $this->getTable());

        if (empty($config)) {
            return $this->filterCfg;
        }

        return $config;
    }

    public function scopeGetByIdRef($q, $id)
    {
        return $q->where('id', $id);
    }

    public function scopeIsExist($q, $id)
    {
        return $q->getByIdRef($id)->exists();
    }

    public function getByStatus($status)
    {
        return $this->where($this->statusColumn, $status);
    }

    public function scopeStatus($q, $status = true)
    {
        return $q->getByStatus($status);
    }

    public static function rules($id = null)
    {
        return [];
    }

    public function populate(Request $request, MasterModel $model = null)
    {
        return $model;
    }

    public function scopeFilter($q, $filterBy = "", $query = "")
    {
        return $q;
    }

    public function scopeNested($q)
    {
        if (!empty($this->nestedBelongConfigs)) {
            $configs = $this->nestedBelongConfigs;
            $result = array_map(function ($k, $v) {
                return [
                    $k => function ($q) use ($v) {
                        $q->addSelect($v);
                    }
                ];
            }, array_keys($configs), array_values($configs));
            $q = $q->with(call_user_func_array("array_merge", $result));
        }

        if (!empty($this->nestedHasManyConfigs)) {
            $configs = $this->nestedHasManyConfigs;
            $result = array_map(function ($k, $v) {
                return [
                    $k => function ($q) use ($v) {
                        $q->addSelect($v);
                    }
                ];
            }, array_keys($configs), array_values($configs));
            $q = $q->with(call_user_func_array("array_merge", $result));
        }

        return $q;
    }
}
