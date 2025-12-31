<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200502;

use SimpleSAML\XML\TypedTextContentTrait;
use SimpleSAML\XMLSchema\Type\StringValue;

/**
 * A Reason element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class Reason extends AbstractWstElement
{
    use TypedTextContentTrait;


    public const string TEXTCONTENT_TYPE = StringValue::class;
}
