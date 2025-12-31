<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200502;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;

/**
 * An Entropy element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class Entropy extends AbstractEntropyType implements SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;
}
