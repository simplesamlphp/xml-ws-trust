<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\Utils;

use DOMNode;
use DOMXPath;
use SimpleSAML\WebServices\Trust\Constants as C;

/**
 * Compilation of utilities for XPath.
 *
 * @package simplesamlphp/xml-ws-trust
 */
class XPath extends \SimpleSAML\XPath\XPath
{
    /*
     * Get a DOMXPath object that can be used to search for WS-Trust elements.
     *
     * @param \DOMNode $node The document to associate to the DOMXPath object.
     * @param bool $autoregister Whether to auto-register all namespaces used in the document
     *
     * @return \DOMXPath A DOMXPath object ready to use in the given document, with several
     *   ws-related namespaces already registered.
     */
    public static function getXPath(DOMNode $node, bool $autoregister = false): DOMXPath
    {
        $xp = parent::getXPath($node, $autoregister);

        $xp->registerNamespace('wst', C::NS_TRUST_200502);
        $xp->registerNamespace('wst', C::NS_TRUST_200512);
        $xp->registerNamespace('wst14', C::NS_TRUST_200802);

        return $xp;
    }
}
