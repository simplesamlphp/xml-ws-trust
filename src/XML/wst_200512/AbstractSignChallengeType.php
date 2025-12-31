<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use DOMElement;
use SimpleSAML\WebServices\Trust\Assert\Assert;
use SimpleSAML\XML\ExtendableAttributesTrait;
use SimpleSAML\XML\ExtendableElementTrait;
use SimpleSAML\XMLSchema\Exception\InvalidDOMElementException;
use SimpleSAML\XMLSchema\XML\Constants\NS;

use function array_pop;

/**
 * Class defining the SignChallengeType element
 *
 * @package simplesamlphp/xml-ws-trust
 */
abstract class AbstractSignChallengeType extends AbstractWstElement
{
    use ExtendableAttributesTrait;
    use ExtendableElementTrait;


    /** The namespace-attribute for the xs:any element */
    public const string XS_ANY_ELT_NAMESPACE = NS::ANY;

    /** The exclusions for the xs:any element */
    public const array XS_ANY_ELT_EXCLUSIONS = [
        ['http://docs.oasis-open.org/ws-sx/ws-trust/200512/', 'Challenge'],
    ];

    /** The namespace-attribute for the xs:anyAttribute element */
    public const string XS_ANY_ATTR_NAMESPACE = NS::ANY;


    /**
     * AbstractSignChallengeType constructor
     *
     * @param \SimpleSAML\WebServices\Trust\XML\wst_200512\Challenge|null $challenge
     * @param array<\SimpleSAML\XML\SerializableElementInterface> $children
     * @param array<\SimpleSAML\XML\Attribute> $namespacedAttributes
     */
    final public function __construct(
        protected ?Challenge $challenge = null,
        array $children = [],
        array $namespacedAttributes = [],
    ) {
        $this->setElements($children);
        $this->setAttributesNS($namespacedAttributes);
    }


    /**
     * @return \SimpleSAML\WebServices\Trust\XML\wst_200512\Challenge|null
     */
    public function getChallenge(): ?Challenge
    {
        return $this->challenge;
    }


    /**
     * Test if an object, at the state it's in, would produce an empty XML-element
     */
    public function isEmptyElement(): bool
    {
        return empty($this->getChallenge())
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

        $challenge = Challenge::getChildrenOfClass($xml);
        $children = self::getChildElementsFromXML($xml);

        return new static(
            array_pop($challenge),
            $children,
            self::getAttributesNSFromXML($xml),
        );
    }


    /**
     * Add this SignChallengeType to an XML element.
     */
    public function toXML(?DOMElement $parent = null): DOMElement
    {
        $e = parent::instantiateParentElement($parent);

        $this->getChallenge()?->toXML($e);

        foreach ($this->getElements() as $child) {
            if (!$child->isEmptyElement()) {
                $child->toXML($e);
            }
        }

        foreach ($this->getAttributesNS() as $attr) {
            $attr->toXML($e);
        }

        return $e;
    }
}
