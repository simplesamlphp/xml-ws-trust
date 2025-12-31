<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;

/**
 * A RequestSecurityTokenCollection element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class RequestSecurityTokenCollection extends AbstractRequestSecurityTokenCollectionType implements
    SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;
}
