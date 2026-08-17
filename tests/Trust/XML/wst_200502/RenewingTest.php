<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\Trust\XML\wst_200502;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\WebServices\Trust\XML\wst_200502\AbstractRenewingType;
use SimpleSAML\WebServices\Trust\XML\wst_200502\AbstractWstElement;
use SimpleSAML\WebServices\Trust\XML\wst_200502\Renewing;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\BooleanValue;

use function dirname;

/**
 * Class \SimpleSAML\WebServices\Trust\XML\wst_200502\RenewingTest
 *
 * @package simplesamlphp/xml-ws-trust
 */
#[Group('wst')]
#[CoversClass(Renewing::class)]
#[CoversClass(AbstractRenewingType::class)]
#[CoversClass(AbstractWstElement::class)]
final class RenewingTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = Renewing::class;

        self::$xmlRepresentation = DOMDocumentFactory::fromFile(
            dirname(__FILE__, 4) . '/resources/xml/wst/200502/Renewing.xml',
        );
    }


    // test marshalling


    /**
     * Test creating a Renewing object from scratch.
     */
    public function testMarshalling(): void
    {
        $renewing = new Renewing(BooleanValue::fromBoolean(true), BooleanValue::fromBoolean(false));

        $expectedXml = self::$xmlRepresentation->saveXml(self::$xmlRepresentation->documentElement);
        $this->assertNotFalse($expectedXml);
        $actualXml = strval($renewing);

        $this->assertXmlStringEqualsXmlString($expectedXml, $actualXml);
    }


    /**
     * Test creating an empty Renewing object from scratch.
     */
    public function testMarshallingEmpty(): void
    {
        $renewing = new Renewing();

        $this->assertTrue($renewing->isEmptyElement());
    }
}
