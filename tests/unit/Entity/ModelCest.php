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


    /**
     * Test string representation
     *
     * @param UnitTester $I
     */
    public function testToString(UnitTester $I)
    {
        $model = new Model("Test");

        $I->assertIsString($model->__toString());
        $I->assertEquals("Test", $model->__toString());
    }
}
