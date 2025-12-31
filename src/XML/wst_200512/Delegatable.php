<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;
use SimpleSAML\XML\TypedTextContentTrait;
use SimpleSAML\XMLSchema\Type\BooleanValue;

/**
 * A Delegatable element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class Delegatable extends AbstractWstElement implements SchemaValidatableElementInterface
{
    use TypedTextContentTrait;
    use SchemaValidatableElementTrait;


    public const string TEXTCONTENT_TYPE = BooleanValue::class;
}
