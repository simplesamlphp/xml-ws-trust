<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\Trust\XML\wst_200512;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\SOAP11\Type\MustUnderstandValue;
use SimpleSAML\Test\WebServices\Trust\Constants as C;
use SimpleSAML\WebServices\Addressing\XML\wsa_200508\MessageID;
use SimpleSAML\WebServices\Trust\XML\wst_200512\AbstractClaimsType;
use SimpleSAML\WebServices\Trust\XML\wst_200512\AbstractWstElement;
use SimpleSAML\WebServices\Trust\XML\wst_200512\Claims;
use SimpleSAML\XML\Attribute as XMLAttribute;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;
use SimpleSAML\XMLSchema\Type\StringValue;

use function dirname;

/**
 * Class \SimpleSAML\WebServices\Trust\XML\wst_200512\ClaimsTest
 *
 * @package simplesamlphp/xml-ws-trust
 */
#[Group('wst')]
#[CoversClass(Claims::class)]
#[CoversClass(AbstractClaimsType::class)]
#[CoversClass(AbstractWstElement::class)]
final class ClaimsTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = Claims::class;

        self::$xmlRepresentation = DOMDocumentFactory::fromFile(
            dirname(__FILE__, 4) . '/resources/xml/wst/200512/Claims.xml',
        );
    }


    // test marshalling


    /**
     * Test creating a Claims object from scratch.
     */
    public function testMarshalling(): void
    {
        $mustUnderstand = MustUnderstandValue::fromBoolean(true);
        $msgId = new MessageID(
            AnyURIValue::fromString('uuid:d0ccf3cd-2dce-4c1a-a5d6-be8912ecd7de'),
            [$mustUnderstand->toAttribute()],
        );

        $attr1 = new XMLAttribute(C::NAMESPACE, 'ssp', 'attr1', StringValue::fromString('testval1'));
        $claims = new Claims(AnyURIValue::fromString(C::NAMESPACE), [$msgId], [$attr1]);

        $this->assertEquals(
            self::$xmlRepresentation->saveXML(self::$xmlRepresentation->documentElement),
            strval($claims),
        );
    }


    /**
     * Test creating an empty Claims object from scratch.
     */
    public function testMarshallingEmpty(): void
    {
        $claims = new Claims();

        $this->assertTrue($claims->isEmptyElement());
    }
}
