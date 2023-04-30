<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Pdo;

class PdoWrapper extends \PDO
{
    /**
     * @return string
     */
    public function getDriverName(): string
    {
        return $this->getAttribute(\PDO::ATTR_DRIVER_NAME);
    }

    /**
     * @param string $column
     *
     * @return string
     */
    public function quoteIdentifier(string $column): string
    {
        switch ($this->getAttribute(\PDO::ATTR_DRIVER_NAME)) {
            case 'pgsql':
                $char = '"';
                $quote = '""';
                break;

            case 'mysql':
                $char = '`';
                $quote = '`';
                break;

            default:
                return $this->quote($column);
        }

        return $char . str_replace($char, $quote, $column) . $char;
    }
}
