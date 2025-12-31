<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use SimpleSAML\XML\TypedTextContentTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;

/**
 * A ComputedKeyOpenEnum element
 *
 * @package simplesamlphp/xml-ws-trust
 *
 * @phpstan-consistent-constructor
 */
abstract class AbstractComputedKeyOpenEnum extends AbstractWstElement
{
    use TypedTextContentTrait;


    public const string TEXTCONTENT_TYPE = AnyURIValue::class;
}
