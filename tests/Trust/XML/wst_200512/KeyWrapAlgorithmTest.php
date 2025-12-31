<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\Trust\XML\wst_200512;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\Test\WebServices\Trust\Constants as C;
use SimpleSAML\WebServices\Trust\XML\wst_200512\AbstractWstElement;
use SimpleSAML\WebServices\Trust\XML\wst_200512\KeyWrapAlgorithm;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;

use function dirname;

/**
 * Class \SimpleSAML\WebServices\Trust\XML\wst_200512\KeyWrapAlgorithmTest
 *
 * @package simplesamlphp/xml-ws-trust
 */
#[Group('wst')]
#[CoversClass(KeyWrapAlgorithm::class)]
#[CoversClass(AbstractWstElement::class)]
final class KeyWrapAlgorithmTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = KeyWrapAlgorithm::class;

        self::$xmlRepresentation = DOMDocumentFactory::fromFile(
            dirname(__FILE__, 4) . '/resources/xml/wst/200512/KeyWrapAlgorithm.xml',
        );
    }


    // test marshalling


    /**
     * Test creating a KeyWrapAlgorithm object from scratch.
     */
    public function testMarshalling(): void
    {
        $keyWrapAlgorithm = new KeyWrapAlgorithm(AnyURIValue::fromString(C::NAMESPACE));

        $this->assertEquals(
            self::$xmlRepresentation->saveXML(self::$xmlRepresentation->documentElement),
            strval($keyWrapAlgorithm),
        );
    }
}
