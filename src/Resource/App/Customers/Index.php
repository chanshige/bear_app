<?php
namespace Framework\BearSunday\Resource\App\Customers;

use BEAR\Resource\ResourceObject;
use PDO;
use Ray\AuraSqlModule\AuraSqlInject;
use Ray\AuraSqlModule\AuraSqlSelectInject;

final class Index extends ResourceObject
{
    use AuraSqlInject;
    use AuraSqlSelectInject;

    public function onGet(?int $id = null)
    {
        $this->select->cols(['*'])
            ->from('app_bear_db.customer')
            ->where('customer.id = :id')
            ->bindValues(['id' => $id]);
        $statement = $this->pdo->prepare($this->select->getStatement());
        $statement->execute($this->select->getBindValues());

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $this->body = [
            'gettype' => gettype($result),
            'result' => $result
        ];

        return $this;
    }
}
