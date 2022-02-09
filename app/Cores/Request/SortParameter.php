<?php

namespace App\Cores\Request;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;

class SortParameter implements Arrayable
{
    const ASC = 'ASC';
    const DESC = 'DESC';

    private $column;
    private $order;

    private function __construct($column, $order)
    {
        $this->column = $column;
        $this->order = $order;
    }

    private static function sanitizeOrder($order)
    {
        $upper = strtoupper($order);
        if (in_array($upper, [self::ASC, self::DESC]) && !empty($order)) {
            return $upper;
        }
        return self::ASC;
    }

    private static function sanitizeColumn($column, $availableColumns)
    {
        if (empty($availableColumns)) {
            return $column;
        }
        if (in_array($column, $availableColumns) && !empty($column)) {
            return $column;
        }
        return array_first($availableColumns);
    }

    public static function fromRequest(Request $request, $availableColumns = [])
    {
        $param = $request->get('sort');

        if (empty($param)) {
            return self::default();
        }

        $paramArray = explode('.', $param);
        $lastIndex = count($paramArray) - 1;
        $order = $paramArray[$lastIndex];

        $columnArray = array_slice($paramArray, 0, $lastIndex);
        $column = implode('.', $columnArray);

        return new static(
            self::sanitizeColumn($column, $availableColumns),
            self::sanitizeOrder($order)
        );
    }

    public static function default()
    {
        return new static('created_at', self::ASC);
    }

    public function getColumn()
    {
        return $this->column;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function toArray()
    {
        return [
            'sort_column' => $this->column,
            'sort_order' => $this->order,
        ];
    }

    public function toString()
    {
        return $this->column . '.' . strtolower($this->order);
    }
}
