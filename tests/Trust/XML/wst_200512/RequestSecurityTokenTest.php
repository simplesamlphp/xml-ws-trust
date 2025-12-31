<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\Trust\XML\wst_200512;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\SOAP11\Type\MustUnderstandValue;
use SimpleSAML\Test\WebServices\Trust\Constants as C;
use SimpleSAML\WebServices\Addressing\XML\wsa_200508\MessageID;
use SimpleSAML\WebServices\Trust\XML\wst_200512\AbstractRequestSecurityTokenType;
use SimpleSAML\WebServices\Trust\XML\wst_200512\AbstractWstElement;
use SimpleSAML\WebServices\Trust\XML\wst_200512\RequestSecurityToken;
use SimpleSAML\XML\Attribute as XMLAttribute;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;
use SimpleSAML\XMLSchema\Type\StringValue;

use function dirname;

/**
 * Class \SimpleSAML\WebServices\Trust\XML\wst_200512\RequestSecurityTokenTest
 *
 * @package simplesamlphp/xml-ws-trust
 */
#[Group('wst')]
#[CoversClass(RequestSecurityToken::class)]
#[CoversClass(AbstractRequestSecurityTokenType::class)]
#[CoversClass(AbstractWstElement::class)]
final class RequestSecurityTokenTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = RequestSecurityToken::class;

        self::$xmlRepresentation = DOMDocumentFactory::fromFile(
            dirname(__FILE__, 4) . '/resources/xml/wst/200512/RequestSecurityToken.xml',
        );
    }


    // test marshalling


    /**
     * Test creating a RequestSecurityToken object from scratch.
     */
    public function testMarshalling(): void
    {
        $mustUnderstand = MustUnderstandValue::fromBoolean(true);
        $msgId = new MessageID(
            AnyURIValue::fromString('uuid:d0ccf3cd-2dce-4c1a-a5d6-be8912ecd7de'),
            [$mustUnderstand->toAttribute()],
        );

        $attr1 = new XMLAttribute(C::NAMESPACE, 'ssp', 'attr1', StringValue::fromString('testval1'));
        $requestSecurityToken = new RequestSecurityToken(
            AnyURIValue::fromString(C::NAMESPACE),
            [$msgId],
            [$attr1],
        );

        $this->assertEquals(
            self::$xmlRepresentation->saveXML(self::$xmlRepresentation->documentElement),
            strval($requestSecurityToken),
        );
    }


    /**
     * Test creating an empty RequestSecurityToken object from scratch.
     */
    public function testMarshallingEmpty(): void
    {
        $requestSecurityToken = new RequestSecurityToken();

        $this->assertTrue($requestSecurityToken->isEmptyElement());
    }
}
