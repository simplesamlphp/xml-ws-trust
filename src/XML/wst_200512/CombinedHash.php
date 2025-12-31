<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;
use SimpleSAML\XML\TypedTextContentTrait;
use SimpleSAML\XMLSchema\Type\Base64BinaryValue;

/**
 * A CombinedHash element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class CombinedHash extends AbstractWstElement implements SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;
    use TypedTextContentTrait;


    public const string TEXTCONTENT_TYPE = Base64BinaryValue::class;
}
