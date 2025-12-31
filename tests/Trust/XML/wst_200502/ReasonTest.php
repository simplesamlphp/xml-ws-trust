<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\Trust\XML\wst_200502;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\WebServices\Trust\XML\wst_200502\AbstractWstElement;
use SimpleSAML\WebServices\Trust\XML\wst_200502\Reason;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\StringValue;

use function dirname;

/**
 * Class \SimpleSAML\WebServices\Trust\XML\wst_200502\ReasonTest
 *
 * @package simplesamlphp/xml-ws-trust
 */
#[Group('wst')]
#[CoversClass(Reason::class)]
#[CoversClass(AbstractWstElement::class)]
final class ReasonTest extends TestCase
{
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = Reason::class;

        self::$xmlRepresentation = DOMDocumentFactory::fromFile(
            dirname(__FILE__, 4) . '/resources/xml/wst/200502/Reason.xml',
        );
    }


    // test marshalling


    /**
     * Test creating a Reason object from scratch.
     */
    public function testMarshalling(): void
    {
        $reason = new Reason(StringValue::fromString('phpunit'));

        $this->assertEquals(
            self::$xmlRepresentation->saveXML(self::$xmlRepresentation->documentElement),
            strval($reason),
        );
    }
}
