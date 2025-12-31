<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\Trust\XML\wst_200502;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\Test\WebServices\Trust\Constants as C;
use SimpleSAML\WebServices\Trust\XML\wst_200502\AbstractWstElement;
use SimpleSAML\WebServices\Trust\XML\wst_200502\EncryptWith;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;

use function dirname;

/**
 * Class \SimpleSAML\WebServices\Trust\XML\wst_200502\EncryptWithTest
 *
 * @package simplesamlphp/xml-ws-trust
 */
#[Group('wst')]
#[CoversClass(EncryptWith::class)]
#[CoversClass(AbstractWstElement::class)]
final class EncryptWithTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$schemaFile = dirname(__FILE__, 5) . '/resources/schemas/ws-trust-200502.xsd';

        self::$testedClass = EncryptWith::class;

        self::$xmlRepresentation = DOMDocumentFactory::fromFile(
            dirname(__FILE__, 4) . '/resources/xml/wst/200502/EncryptWith.xml',
        );
    }


    // test marshalling


    /**
     * Test creating a EncryptWith object from scratch.
     */
    public function testMarshalling(): void
    {
        $encryptWith = new EncryptWith(AnyURIValue::fromString(C::NAMESPACE));

        $this->assertEquals(
            self::$xmlRepresentation->saveXML(self::$xmlRepresentation->documentElement),
            strval($encryptWith),
        );
    }
}
