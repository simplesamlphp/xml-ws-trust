<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\Utils;

use Dom;
use SimpleSAML\WebServices\Trust\Constants as C;

/**
 * Compilation of utilities for XPath.
 *
 * @package simplesamlphp/xml-ws-trust
 */
class XPath extends \SimpleSAML\XPath\XPath
{
    /*
     * Get a Dom\XPath object that can be used to search for WS-Trust elements.
     *
     * @param \Dom\Node $node The document to associate to the DOMXPath object.
     * @param bool $autoregister Whether to auto-register all namespaces used in the document
     *
     * @return \Dom\XPath A Dom\XPath object ready to use in the given document, with several
     *   ws-related namespaces already registered.
     */
    public static function getXPath(Dom\Node $node, bool $autoregister = false): Dom\XPath
    {
        $xp = parent::getXPath($node, $autoregister);

        $xp->registerNamespace('wst', C::NS_TRUST_200502);
        $xp->registerNamespace('wst', C::NS_TRUST_200512);
        $xp->registerNamespace('wst14', C::NS_TRUST_200802);

        return $xp;
    }
}
