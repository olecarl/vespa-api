<?php

namespace App\Tests\api;

use App\Tests\ApiTester;

/**
 * Class ModelCest
 *
 * @package App\Tests\api
 */
class ModelCest
{


    public function _before(ApiTester $I)
    {
        $I->am('Anonymous');

        $I->expect('content type is application/ld+json');
        $I->haveHttpHeader('Content-Type', 'application/ld+json');
        $I->haveHttpHeader('accept', 'application/ld+json');
    }

    /**
     * @param ApiTester $I
     */
    public function tryToGetModels(ApiTester $I)
    {
        $I->amGoingTo('GET list of models');
        $I->sendGet('models');

        $I->expect('current route is matching');
        $I->seeCurrentRouteIs('api_models_get_collection');

        $I->expect('request is successful');
        $I->seeResponseCodeIsSuccessful();

        $I->expect('valid json response');
        $I->seeResponseIsJson();

        $I->expect('valid json type');
        $I->seeResponseMatchesJsonType(
                [
                        '@context' => 'string',
                        '@id' => 'string',
                        '@type' => 'string',
                        'hydra:totalItems' => 'integer',
                        'hydra:member' => 'array'
                ]
        );
    }

    /**
     * @param ApiTester $I
     *
     * public function tryToPostModel(ApiTester $I)
     * {
     * $I->amGoingTo('POST new model');
     * $I->sendPost('models', ['title' => 'V50 N']);
     *
     * $I->expect('request is successful');
     * $I->seeResponseCodeIsSuccessful();
     * } */
}
