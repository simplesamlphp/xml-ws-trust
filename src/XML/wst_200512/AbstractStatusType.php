<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use DOMElement;
use SimpleSAML\WebServices\Trust\Assert\Assert;
use SimpleSAML\XMLSchema\Exception\InvalidDOMElementException;
use SimpleSAML\XMLSchema\Exception\MissingElementException;
use SimpleSAML\XMLSchema\Exception\TooManyElementsException;

/**
 * Class defining the StatusType element
 *
 * @package simplesamlphp/xml-ws-trust
 */
abstract class AbstractStatusType extends AbstractWstElement
{
    /**
     * AbstractStatusType constructor
     *
     * @param \SimpleSAML\WebServices\Trust\XML\wst_200512\Code $code
     * @param \SimpleSAML\WebServices\Trust\XML\wst_200512\Reason|null $reason
     */
    final public function __construct(
        protected Code $code,
        protected ?Reason $reason = null,
    ) {
    }


    /**
     * @return \SimpleSAML\WebServices\Trust\XML\wst_200512\Code
     */
    public function getCode(): Code
    {
        return $this->code;
    }


    /**
     * @return \SimpleSAML\WebServices\Trust\XML\wst_200512\Reason|null
     */
    public function getReason(): ?Reason
    {
        return $this->reason;
    }


    /**
     * Create an instance of this object from its XML representation.
     *
     * @throws \SimpleSAML\XMLSchema\Exception\InvalidDOMElementException
     *   if the qualified name of the supplied element is wrong
     */
    public static function fromXML(DOMElement $xml): static
    {
        Assert::same($xml->localName, static::getLocalName(), InvalidDOMElementException::class);
        Assert::same($xml->namespaceURI, static::NS, InvalidDOMElementException::class);

        $code = Code::getChildrenOfClass($xml);
        Assert::minCount($code, 1, MissingElementException::class);
        Assert::maxCount($code, 1, TooManyElementsException::class);

        $reason = Reason::getChildrenOfClass($xml);
        Assert::maxCount($reason, 1, TooManyElementsException::class);


        return new static(
            array_pop($code),
            array_pop($reason),
        );
    }


    /**
     * Add this UseKeyType to an XML element.
     */
    public function toXML(?DOMElement $parent = null): DOMElement
    {
        $e = parent::instantiateParentElement($parent);

        $this->getCode()->toXML($e);
        $this->getReason()?->toXML($e);

        return $e;
    }
}
