<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\Trust\XML\wst_200512;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\WebServices\Trust\XML\wst_200512\AbstractWstElement;
use SimpleSAML\WebServices\Trust\XML\wst_200512\KeySize;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\UnsignedIntValue;

use function dirname;

/**
 * Class \SimpleSAML\WebServices\Trust\XML\wst_200512\KeySizeTest
 *
 * @package simplesamlphp/xml-ws-trust
 */
#[Group('wst')]
#[CoversClass(KeySize::class)]
#[CoversClass(AbstractWstElement::class)]
final class KeySizeTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = KeySize::class;

        self::$xmlRepresentation = DOMDocumentFactory::fromFile(
            dirname(__FILE__, 4) . '/resources/xml/wst/200512/KeySize.xml',
        );
    }


    // test marshalling


    /**
     * Test creating a KeySize object from scratch.
     */
    public function testMarshalling(): void
    {
        $keySize = new KeySize(UnsignedIntValue::fromInteger(4096));

        $this->assertEquals(
            self::$xmlRepresentation->saveXML(self::$xmlRepresentation->documentElement),
            strval($keySize),
        );
    }
}
