<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200502;

use SimpleSAML\WebServices\Addressing\XML\wsa_200408\AbstractEndpointReferenceType;
use SimpleSAML\WebServices\Trust\Constants as C;
use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;

/**
 * An Issuer element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class Issuer extends AbstractEndpointReferenceType implements SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;


    public const string NS = C::NS_TRUST_200502;

    public const string NS_PREFIX = AbstractWstElement::NS_PREFIX;

    /** The exclusions for the xs:any element */
    public const array XS_ANY_ELT_EXCLUSIONS = [
        ['http://schemas.xmlsoap.org/ws/2004/08/addressing', 'Address'],
        ['http://schemas.xmlsoap.org/ws/2004/08/addressing', 'ReferenceParameters'],
    ];

    public const string SCHEMA = AbstractWstElement::SCHEMA;
}
