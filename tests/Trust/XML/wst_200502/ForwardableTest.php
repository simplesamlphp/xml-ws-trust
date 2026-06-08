<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\Trust\XML\wst_200502;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\WebServices\Trust\XML\wst_200502\AbstractWstElement;
use SimpleSAML\WebServices\Trust\XML\wst_200502\Forwardable;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;

use function dirname;

/**
 * Class \SimpleSAML\WebServices\Trust\XML\wst_200502\ForwardableTest
 *
 * @package simplesamlphp/xml-ws-trust
 */
#[Group('wst')]
#[CoversClass(Forwardable::class)]
#[CoversClass(AbstractWstElement::class)]
final class ForwardableTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = Forwardable::class;

        self::$xmlRepresentation = DOMDocumentFactory::fromFile(
            dirname(__FILE__, 4) . '/resources/xml/wst/200502/Forwardable.xml',
        );
    }


    // test marshalling


    /**
     * Test creating a Forwardable object from scratch.
     */
    public function testMarshalling(): void
    {
        $forwardable = Forwardable::fromString('true');

        $expectedXml = self::$xmlRepresentation->saveXml(self::$xmlRepresentation->documentElement);
        $this->assertNotFalse($expectedXml);
        $actualXml = strval($forwardable);

        $this->assertXmlStringEqualsXmlString($expectedXml, $actualXml);
    }
}
