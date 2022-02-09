<?php
/**
 * @author Jehan Afwazi Ahmad <jee.archer@gmail.com>.
 */

namespace App\Cores\Request;


class Sort
{
    const ASC = 'ASC';
    const DESC = 'DESC';

    /**
     * Digunakan untuk validasi keberadaan order
     * @param $order
     * @return bool
     * @internal param $sort
     */
    public static function isAvailableOrder($order)
    {
        if (!empty($order) && in_array(strtoupper($order), array(self::ASC, self::DESC))) {
            return true;
        }
        return false;
    }

    /**
     * @param $column
     * @param array $arrCustomColumn
     * @return bool
     */
    public static function isAvailableColumn($column, $arrCustomColumn = array())
    {
        if (!empty($column) && in_array($column, $arrCustomColumn)) {
            return true;
        }
        return false;
    }

    //TODO (jee) : not relevant

    /**
     * @param $filterBy
     * @param array $arrFilter
     * @return bool
     */
    public static function isAvailableFilterBy($filterBy, $arrFilter = array())
    {
        if (!empty($filterBy) && in_array($filterBy, $arrFilter)) {
            return true;
        }
        return false;
    }

    /**
     * @param $order
     * @return string
     */
    public static function getOrder($order)
    {
        if (self::isAvailableOrder($order)) {
            return $order;
        }
        return self::DESC;
    }

    /**
     * @param $column
     * @param array $arrCustomColumn
     * @return string
     */
    public static function getColumn($column, $arrCustomColumn = array())
    {
        if (empty($arrCustomColumn)) {
            return "Missing column param";
        }

        if (self::isAvailableColumn($column, $arrCustomColumn)) {
            return $column;
        }
        return array_first($arrCustomColumn);
    }


}
