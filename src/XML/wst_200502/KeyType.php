<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200502;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;

/**
 * A KeyType element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class KeyType extends AbstractKeyTypeOpenEnum implements SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;
}
