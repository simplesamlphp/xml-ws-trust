<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use DOMElement;
use SimpleSAML\WebServices\Trust\Assert\Assert;
use SimpleSAML\XML\ExtendableElementTrait;
use SimpleSAML\XMLSchema\Exception\InvalidDOMElementException;
use SimpleSAML\XMLSchema\XML\Constants\NS;

/**
 * Class defining the KeyExchangeTokenType element
 *
 * @package simplesamlphp/xml-ws-trust
 */
abstract class AbstractKeyExchangeTokenType extends AbstractWstElement
{
    use ExtendableElementTrait;


    /** The namespace-attribute for the xs:any element */
    public const string XS_ANY_ELT_NAMESPACE = NS::ANY;


    /**
     * AbstractKeyExchangeTokenType constructor
     *
     * @param array<\SimpleSAML\XML\SerializableElementInterface> $children
     */
    final public function __construct(
        array $children = [],
    ) {
        $this->setElements($children);
    }


    /**
     * Test if an object, at the state it's in, would produce an empty XML-element
     */
    public function isEmptyElement(): bool
    {
        return empty($this->getElements());
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

        return new static(
            self::getChildElementsFromXML($xml),
        );
    }


    /**
     * Add this KeyExchangeTokenType to an XML element.
     */
    public function toXML(?DOMElement $parent = null): DOMElement
    {
        $e = parent::instantiateParentElement($parent);

        foreach ($this->getElements() as $child) {
            if (!$child->isEmptyElement()) {
                $child->toXML($e);
            }
        }

        return $e;
    }
}
