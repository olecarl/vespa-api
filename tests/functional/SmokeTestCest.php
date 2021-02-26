<?php

namespace App\Tests\functional;

use App\Tests\FunctionalTester;
use Codeception\Example;

/**
 * Class SmokeTestCest
 *
 * @package App\Tests\functional
 */
class SmokeTestCest
{

    /**
     * @param FunctionalTester $I
     * @param Example $example
     * @dataProvider providePages
     */
    public function tryToAccessPage(FunctionalTester $I, Example $example)
    {
        $I->am('Anonymous');

        $I->amGoingTo('access page');
        $I->amOnPage($example['url']);

        $I->expect('page is available');
        $I->seePageIsAvailable($example['url']);

        if (!empty($example['headline'])) {
            $I->expect('headline matches');
            $I->see($example['headline'], 'h1');
        }

        if (!empty($example['title'])) {
            $I->expect('page title matches');
            $I->seeInTitle($example['title']);
        }
    }

    /**
     * Data provider function
     *
     * @return string[]
     */
    private function providePages() : array {
        return [
            ['url' => '/']
        ];
    }
}
