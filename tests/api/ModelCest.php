<?php

namespace App\Tests\api;

use Exception;
use App\Tests\ApiTester;
use Codeception\Util\HttpCode;

/**
 * Class ModelCest
 *
 * @package App\Tests\api
 */
class ModelCest
{

    /** @var array $item */
    private $item;

    public function _before(ApiTester $I)
    {
        $I->am('Anonymous');

        $I->expect('content type is application/ld+json');
        $I->haveHttpHeader('Content-Type', 'application/ld+json');
        $I->haveHttpHeader('accept', 'application/ld+json');

        try {
            $this->tryToPostModel($I);
        } catch (Exception $exception) {

        }
    }

    /**
     * Try to POST model
     *
     * @param ApiTester $I
     *
     * @throws Exception
     */
    public function tryToPostModel(ApiTester $I)
    {
        $params = [
                'title' => '50 N',
                'type' => 'V5A1T',
                'buildFrom' => '1963-01-01',
                'buildTo' => '1971-12-31',
                'quantity' => 273276
        ];

        $I->amGoingTo('create a new Model');
        $I->sendPOST('/models', $params);

        $I->expect('Response is created (201)');
        $I->seeResponseCodeIs(HttpCode::CREATED);

        $I->expect('Valid Json Response');
        $I->seeResponseIsJson();

        $I->expect('Route is matching');
        $I->seeCurrentRouteIs('api_models_post_collection');

        list($item) = $I->grabDataFromResponseByJsonPath('$.');
        $this->item = $item;
    }

    /**
     * Try to GET model
     *
     * @param ApiTester $I
     */
    public function tryToGetModel(ApiTester $I)
    {
        $I->amGoingTo('Retrieve a Model');
        $I->sendGET($this->item['@id']);

        $I->expect('Response is successful (200)');
        $I->seeResponseCodeIsSuccessful();

        $I->expect('current route is matching');
        $I->seeCurrentRouteIs('api_models_get_item');

        $I->expect('Valid Json Response');
        $I->seeResponseIsJson();

        $I->seeResponseMatchesJsonType(
                [
                        'brand' => 'string',
                        'series' => 'string',
                        'type' => 'string',
                        'title' => 'string',
                        'buildFrom' => 'integer',
                        'buildTo' => 'integer',
                        'quantity' => 'integer'
                ]
        );
    }

    /**
     * @param ApiTester $I
     */
    public function tryToUpdateModel(ApiTester $I) {
        $I->haveHttpHeader('Content-Type', 'application/vnd.api+json');
        $I->sendPatch('models/1', ['quantity' => 666666]);
        $I->expect('Response is successful (200)');
        $I->seeResponseCodeIsSuccessful();

        $I->expect('current route is matching');
        $I->seeCurrentRouteIs('api_models_patch_item');

        $I->expect('Valid Json Response');
        $I->seeResponseIsJson();
    }

    /**
     * Try to GET model collection
     *
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
        $I->seeResponseContainsJson(
                [
                    '@type' => 'hydra:Collection',
                    '@context' => '/contexts/Model'
                ]
        );
    }

    /**
     * Try to DELETE model
     *
     * @group integration
     * @param ApiTester $I
     */
    public function tryToDeleteModel(ApiTester $I)
    {
        $I->amGoingTo('remove Model');
        $I->sendDELETE($this->item['@id']);

        $I->expect('Response is no content');
        $I->seeResponseCodeIs(HttpCode::NO_CONTENT);
    }
}
