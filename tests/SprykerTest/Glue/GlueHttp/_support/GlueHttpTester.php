<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Glue\GlueHttp;

use Codeception\Actor;
use Generated\Shared\Transfer\GlueRequestTransfer;
use Generated\Shared\Transfer\GlueResourceTransfer;
use Generated\Shared\Transfer\GlueResponseTransfer;

/**
 * Inherited Methods
 *
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
 */
class GlueHttpTester extends Actor
{
    use _generated\GlueHttpTesterActions;

    /**
     * @var int
     */
    public const RESPONSE_STATUS = 200;

    /**
     * @var string
     */
    public const RESPONSE_CONTENT = 'test';

    /**
     * @var string
     */
    public const CONNECTION = 'Keep-Alive';

    /**
     * @var string
     */
    protected const META_KEY = 'content-type';

    /**
     * @var string
     */
    protected const CONTENT_TYPE = 'application/vnd.api+json';

    /**
     * @var string
     */
    protected const PATH = '/foo/foo-id';

    /**
     * @var string
     */
    protected const ALLOWED_HEADER = 'allowed-header';

    /**
     * @var string
     */
    protected const RESOURCE_TYPE = 'foo';

    /**
     * @return \Generated\Shared\Transfer\GlueRequestTransfer
     */
    public function createGlueRequestTransfer(): GlueRequestTransfer
    {
        $glueRequestTransfer = (new GlueRequestTransfer())->setQueryFields([
            'include' => 'resource1,resource2',
            'fields' => [
                'items' => 'att1,att2,att3',
            ],
            'page' => [
                'limit' => 1,
                'offset' => 10,
            ],
        ])
            ->setPath(static::PATH)
            ->setMeta([static::META_KEY => [static::CONTENT_TYPE]])
            ->setResource($this->createGlueResourceTransfer());

        return $glueRequestTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\GlueResponseTransfer
     */
    public function createGlueResponseTransfer(): GlueResponseTransfer
    {
        $glueResponseTransfer = (new GlueResponseTransfer())
            ->addResource($this->createGlueResourceTransfer())
            ->setStatus(static::RESPONSE_STATUS)
            ->setContent(static::RESPONSE_CONTENT)
            ->setMeta([
                'Connection' => static::CONNECTION,
            ]);

        return $glueResponseTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\GlueResourceTransfer
     */
    protected function createGlueResourceTransfer(): GlueResourceTransfer
    {
        return (new GlueResourceTransfer())
            ->setType('articles')
            ->setId('1');
    }
}
