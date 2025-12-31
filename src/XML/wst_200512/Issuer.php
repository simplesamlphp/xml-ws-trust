<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use SimpleSAML\WebServices\Addressing\XML\wsa_200508\AbstractEndpointReferenceType;
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


    public const string NS = C::NS_TRUST_200512;

    public const string NS_PREFIX = 'trust';

    /** The exclusions for the xs:any element */
    public const array XS_ANY_ELT_EXCLUSIONS = [
        ['http://www.w3.org/2005/08/addressing', 'Address'],
        ['http://www.w3.org/2005/08/addressing', 'Metadata'],
        ['http://www.w3.org/2005/08/addressing', 'ReferenceParameters'],
    ];
}
