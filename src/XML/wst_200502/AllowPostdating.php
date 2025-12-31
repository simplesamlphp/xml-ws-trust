<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200502;

use DOMElement;
use SimpleSAML\WebServices\Trust\Assert\Assert;
use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;
use SimpleSAML\XMLSchema\Exception\InvalidDOMElementException;

/**
 * A AllowPostdating element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class AllowPostdating extends AbstractWstElement implements SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;


    /**
     * Convert XML into a class instance
     *
     * @throws \SimpleSAML\XMLSchema\Exception\InvalidDOMElementException
     *   If the qualified name of the supplied element is wrong
     */
    public static function fromXML(DOMElement $xml): static
    {
        Assert::same($xml->localName, static::getLocalName(), InvalidDOMElementException::class);
        Assert::same($xml->namespaceURI, static::NS, InvalidDOMElementException::class);

        return new static();
    }


    /**
     * Convert this element to XML.
     */
    public function toXML(?DOMElement $parent = null): DOMElement
    {
        return $this->instantiateParentElement($parent);
    }
}
