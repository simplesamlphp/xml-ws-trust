<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use SimpleSAML\WebServices\Trust\Constants as C;
use SimpleSAML\XML\AbstractElement;

/**
 * Abstract class to be implemented by all the classes in this namespace
 *
 * @package simplesamlphp/xml-ws-trust
 */
abstract class AbstractWstElement extends AbstractElement
{
    public const string NS = C::NS_TRUST_200512;

    public const string NS_PREFIX = 'trust';

    public const string SCHEMA = 'resources/schemas/ws-trust-200512.xsd';
}
