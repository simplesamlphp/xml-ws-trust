<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use DOMElement;
use SimpleSAML\WebServices\Trust\Assert\Assert;
use SimpleSAML\XML\ExtendableAttributesTrait;
use SimpleSAML\XML\ExtendableElementTrait;
use SimpleSAML\XMLSchema\Exception\InvalidDOMElementException;
use SimpleSAML\XMLSchema\Type\AnyURIValue;
use SimpleSAML\XMLSchema\XML\Constants\NS;

/**
 * Class defining the RequestSecurityTokenType element
 *
 * @package simplesamlphp/xml-ws-trust
 *
 * @phpstan-consistent-constructor
 */
abstract class AbstractRequestSecurityTokenType extends AbstractWstElement
{
    use ExtendableAttributesTrait;
    use ExtendableElementTrait;


    /** The namespace-attribute for the xs:any element */
    public const string XS_ANY_ELT_NAMESPACE = NS::ANY;

    /** The namespace-attribute for the xs:anyAttribute element */
    public const string XS_ANY_ATTR_NAMESPACE = NS::OTHER;


    /**
     * AbstractRequestSecurityTokenType constructor
     *
     * @param \SimpleSAML\XMLSchema\Type\AnyURIValue|null $context
     * @param array<\SimpleSAML\XML\SerializableElementInterface> $children
     * @param array<\SimpleSAML\XML\Attribute> $namespacedAttributes
     */
    final public function __construct(
        protected ?AnyURIValue $context = null,
        array $children = [],
        array $namespacedAttributes = [],
    ) {
        $this->setElements($children);
        $this->setAttributesNS($namespacedAttributes);
    }


    /**
     * @return \SimpleSAML\XMLSchema\Type\AnyURIValue|null
     */
    public function getContext(): ?AnyURIValue
    {
        return $this->context;
    }


    /**
     * Test if an object, at the state it's in, would produce an empty XML-element
     */
    public function isEmptyElement(): bool
    {
        return empty($this->getContext())
            && empty($this->getElements())
            && empty($this->getAttributesNS());
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
            self::getOptionalAttribute($xml, 'Context', AnyURIValue::class),
            self::getChildElementsFromXML($xml),
            self::getAttributesNSFromXML($xml),
        );
    }


    /**
     * Add this RequestSecurityTokenType to an XML element.
     */
    public function toXML(?DOMElement $parent = null): DOMElement
    {
        $e = parent::instantiateParentElement($parent);

        if ($this->getContext() !== null) {
            $e->setAttribute('Context', $this->getContext()->getValue());
        }

        foreach ($this->getAttributesNS() as $attr) {
            $attr->toXML($e);
        }

        foreach ($this->getElements() as $child) {
            if (!$child->isEmptyElement()) {
                $child->toXML($e);
            }
        }

        return $e;
    }
}
