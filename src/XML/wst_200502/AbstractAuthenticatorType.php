<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200502;

use DOMElement;
use SimpleSAML\WebServices\Trust\Assert\Assert;
use SimpleSAML\XML\ExtendableElementTrait;
use SimpleSAML\XMLSchema\Exception\InvalidDOMElementException;
use SimpleSAML\XMLSchema\XML\Constants\NS;

use function array_pop;

/**
 * Class defining the AuthenticatorType element
 *
 * @package simplesamlphp/xml-ws-trust
 */
abstract class AbstractAuthenticatorType extends AbstractWstElement
{
    use ExtendableElementTrait;


    /** The namespace-attribute for the xs:any element */
    public const string XS_ANY_ELT_NAMESPACE = NS::OTHER;


    /**
     * AbstractAuthenticatorType constructor
     *
     * @param \SimpleSAML\WebServices\Trust\XML\wst_200502\CombinedHash|null $combinedHash
     * @param array<\SimpleSAML\XML\SerializableElementInterface> $children
     */
    final public function __construct(
        protected ?CombinedHash $combinedHash = null,
        array $children = [],
    ) {
        $this->setElements($children);
    }


    /**
     * @return \SimpleSAML\WebServices\Trust\XML\wst_200502\CombinedHash|null
     */
    public function getCombinedHash(): ?CombinedHash
    {
        return $this->combinedHash;
    }


    /**
     * Test if an object, at the state it's in, would produce an empty XML-element
     */
    public function isEmptyElement(): bool
    {
        return empty($this->getCombinedHash())
            && empty($this->getElements());
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

        $combinedHash = CombinedHash::getChildrenOfClass($xml);

        return new static(
            array_pop($combinedHash),
            self::getChildElementsFromXML($xml),
        );
    }


    /**
     * Add this AuthenticatorType to an XML element.
     */
    public function toXML(?DOMElement $parent = null): DOMElement
    {
        $e = parent::instantiateParentElement($parent);

        $this->getCombinedHash()?->toXML($e);

        foreach ($this->getElements() as $child) {
            if (!$child->isEmptyElement()) {
                $child->toXML($e);
            }
        }

        return $e;
    }
}
