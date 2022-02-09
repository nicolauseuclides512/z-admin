<?php
/**
 * @author Jehan Afwazi Ahmad <jehan.afwazi@gmail.com>.
 */


namespace App\Services\ongkir\Contracts;

interface CacheOngkirServiceContract
{
    public function fetchCache();

    public function clearCacheByKey($key);

    public function flushCache();
}
