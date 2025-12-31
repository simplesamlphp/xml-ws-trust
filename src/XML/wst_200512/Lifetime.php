<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;

/**
 * A Lifetime element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class Lifetime extends AbstractLifetimeType implements SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;
}
