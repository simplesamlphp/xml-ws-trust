<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200512;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;

/**
 * An SignChallenge element
 *
 * @package simplesamlphp/xml-ws-trust
 */
final class SignChallenge extends AbstractSignChallengeType implements SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;
}
