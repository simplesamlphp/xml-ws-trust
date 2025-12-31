<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;

/**
 * A RequestedAttachedReference element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class RequestedAttachedReference extends AbstractRequestedReferenceType implements
    SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;
}
