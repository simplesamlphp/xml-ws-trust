<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust;

/**
 * Class holding constants relevant for WS-Trust.
 *
 * @package simplesamlphp/xml-ws-trust
 */

class Constants extends \SimpleSAML\WebServices\Security\Constants
{
    /**
     * The namespace for WS-Trust protocol.
     */
    public const string NS_TRUST_200502 = 'http://schemas.xmlsoap.org/ws/2005/02/trust';

    public const string NS_TRUST_200512 = 'http://docs.oasis-open.org/ws-sx/ws-trust/200512/';

    public const string NS_TRUST_200802 = 'http://docs.oasis-open.org/ws-sx/ws-trust/200802';
}
