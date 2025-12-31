<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;

/**
 * A Claims element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class Claims extends AbstractClaimsType implements SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;
}
