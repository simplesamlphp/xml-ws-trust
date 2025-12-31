<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200502;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;

/**
 * A RequestSecurityToken element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class RequestSecurityToken extends AbstractRequestSecurityTokenType implements SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;
}
