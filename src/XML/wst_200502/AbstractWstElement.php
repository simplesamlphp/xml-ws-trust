<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200502;

use SimpleSAML\WebServices\Trust\Constants as C;
use SimpleSAML\XML\AbstractElement;

/**
 * Abstract class to be implemented by all the classes in this namespace
 *
 * @package simplesamlphp/xml-ws-trust
 */
abstract class AbstractWstElement extends AbstractElement
{
    public const string NS = C::NS_TRUST_200502;

    public const string NS_PREFIX = 't';

    public const string SCHEMA = 'resources/schemas/ws-trust-200502.xsd';
}
