<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200502;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;
use SimpleSAML\XML\TypedTextContentTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;

/**
 * A ComputedKeyAlgorithm element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class ComputedKeyAlgorithm extends AbstractWstElement implements SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;
    use TypedTextContentTrait;


    public const string TEXTCONTENT_TYPE = AnyURIValue::class;
}
