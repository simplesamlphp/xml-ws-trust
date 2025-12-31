<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;

/**
 * A KeyEchangeToken element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class KeyExchangeToken extends AbstractKeyExchangeTokenType implements SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;
}
