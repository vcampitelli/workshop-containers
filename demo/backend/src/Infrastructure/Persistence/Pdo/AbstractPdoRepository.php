<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Pdo;

use App\Domain\ModelInterface;
use stdClass;

abstract class AbstractPdoRepository {

    /**
     * @param PdoWrapper $pdo
     * @param string $tableName
     */
    public function __construct(
        private readonly PdoWrapper $pdo,
        private readonly string $tableName,
    ) {
    }

    /**
     * @return ModelInterface[]
     */
    public function findAll(): array
    {
        // Querying the database
        $sql = 'SELECT * FROM ' . $this->pdo->quoteIdentifier($this->tableName);

        $statement = $this->pdo->prepare($sql);
        if (!$statement->execute()) {
            throw new \RuntimeException(
                'Erro ao executar query: ' . \implode(' - ', $statement->errorInfo())
            );
        }

        $models = [];
        while (($row = $statement->fetch(\PDO::FETCH_OBJ)) !== false) {
            $models[] = $this->buildModelFromPdoObject($row);
        }
        return $models;
    }

    /**
     * @param stdClass $row
     *
     * @return ModelInterface
     */
    abstract protected function buildModelFromPdoObject(stdClass $row): ModelInterface;
}
