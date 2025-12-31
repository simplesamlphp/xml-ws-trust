<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use DOMElement;
use SimpleSAML\WebServices\Trust\Assert\Assert;
use SimpleSAML\XMLSchema\Exception\InvalidDOMElementException;
use SimpleSAML\XMLSchema\Exception\MissingElementException;
use SimpleSAML\XMLSchema\Exception\SchemaViolationException;

/**
 * A RequestSecurityTokenCollectionType element
 *
 * @package simplesamlphp/xml-ws-trust
 */
abstract class AbstractRequestSecurityTokenCollectionType extends AbstractWstElement
{
    /**
     * @param array<\SimpleSAML\WebServices\Trust\XML\wst_200512\RequestSecurityToken> $requestSecurityToken
     */
    final public function __construct(
        protected array $requestSecurityToken,
    ) {
        Assert::minCount($requestSecurityToken, 2, MissingElementException::class);
        Assert::allIsInstanceOf(
            $requestSecurityToken,
            RequestSecurityToken::class,
            SchemaViolationException::class,
        );
    }


    /**
     * Get the requestSecurityToken property.
     *
     * @return \SimpleSAML\WebServices\Trust\XML\wst_200512\RequestSecurityToken[]
     */
    public function getRequestSecurityToken(): array
    {
        return $this->requestSecurityToken;
    }


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

        return new static(
            RequestSecurityToken::getChildrenOfClass($xml),
        );
    }


    /**
     * Convert this element to XML.
     */
    public function toXML(?DOMElement $parent = null): DOMElement
    {
        $e = $this->instantiateParentElement($parent);

        foreach ($this->getRequestSecurityToken() as $r) {
            $r->toXML($e);
        }

        return $e;
    }
}
