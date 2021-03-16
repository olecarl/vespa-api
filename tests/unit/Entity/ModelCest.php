<?php

namespace App\Tests\unit\Entity;

use App\Entity\Model;
use App\Tests\UnitTester;

/**
 * Class ModelCest
 *
 * @package App\Tests\unit\Entity
 */
class ModelCest
{
    public function testToString(UnitTester $I)
    {
        $model = new Model("Test");

        $I->assertEquals($model->getTitle(), $model->__toString());
    }
}
