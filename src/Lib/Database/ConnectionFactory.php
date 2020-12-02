<?php

namespace Src\Lib\Database;

/**
 * @method query(string $string, int $FETCH_ASSOC)
 * @method prepare(string $sql)
 */
abstract class ConnectionFactory
{
    public abstract function getConnection();
}