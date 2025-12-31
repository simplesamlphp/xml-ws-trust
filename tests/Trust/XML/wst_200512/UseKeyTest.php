<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\Trust\XML\wst_200512;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\SOAP11\Type\MustUnderstandValue;
use SimpleSAML\Test\WebServices\Trust\Constants as C;
use SimpleSAML\WebServices\Addressing\XML\wsa_200508\MessageID;
use SimpleSAML\WebServices\Trust\XML\wst_200512\AbstractUseKeyType;
use SimpleSAML\WebServices\Trust\XML\wst_200512\AbstractWstElement;
use SimpleSAML\WebServices\Trust\XML\wst_200512\UseKey;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;

use function dirname;

/**
 * Class \SimpleSAML\WebServices\Trust\XML\wst_200512\UseKeyTest
 *
 * @package simplesamlphp/xml-ws-trust
 */
#[Group('wst')]
#[CoversClass(UseKey::class)]
#[CoversClass(AbstractUseKeyType::class)]
#[CoversClass(AbstractWstElement::class)]
final class UseKeyTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = UseKey::class;

        self::$xmlRepresentation = DOMDocumentFactory::fromFile(
            dirname(__FILE__, 4) . '/resources/xml/wst/200512/UseKey.xml',
        );
    }


    // test marshalling


    /**
     * Test creating a UseKey object from scratch.
     */
    public function testMarshalling(): void
    {
        $mustUnderstand = MustUnderstandValue::fromBoolean(true);
        $msgId = new MessageID(
            AnyURIValue::fromString('uuid:d0ccf3cd-2dce-4c1a-a5d6-be8912ecd7de'),
            [$mustUnderstand->toAttribute()],
        );

        $useKey = new UseKey($msgId, AnyURIValue::fromString(C::NAMESPACE));

        $this->assertEquals(
            self::$xmlRepresentation->saveXML(self::$xmlRepresentation->documentElement),
            strval($useKey),
        );
    }


    /**
     * Test creating an empty UseKey object from scratch.
     */
    public function testMarshallingEmpty(): void
    {
        $useKey = new UseKey();

        $this->assertTrue($useKey->isEmptyElement());
    }
}
