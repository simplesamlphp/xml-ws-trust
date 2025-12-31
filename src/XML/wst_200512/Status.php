<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;

/**
 * A Status element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class Status extends AbstractStatusType implements SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;
}
