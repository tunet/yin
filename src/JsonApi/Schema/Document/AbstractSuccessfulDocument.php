<?php
declare(strict_types=1);

namespace WoohooLabs\Yin\JsonApi\Schema\Document;

use WoohooLabs\Yin\JsonApi\Exception\ExceptionFactoryInterface;
use WoohooLabs\Yin\JsonApi\Request\RequestInterface;
use WoohooLabs\Yin\JsonApi\Transformer\SuccessfulDocumentTransformation;

abstract class AbstractSuccessfulDocument implements SuccessfulDocumentInterface
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var mixed
     */
    protected $object;

    /**
     * @var ExceptionFactoryInterface
     */
    protected $exceptionFactory;

    /**
     * @var array
     */
    protected $additionalMeta = [];

    /**
     * @internal
     */
    public function initializeTransformation(SuccessfulDocumentTransformation $transformation): void
    {
        $this->request = $transformation->request;
        $this->object = $transformation->object;
        $this->exceptionFactory = $transformation->exceptionFactory;
        $this->additionalMeta = $transformation->additionalMeta;
    }

    /**
     * @internal
     */
    public function clearTransformation(): void
    {
        $this->request = null;
        $this->object = null;
        $this->exceptionFactory = null;
        $this->additionalMeta = [];
    }
}
