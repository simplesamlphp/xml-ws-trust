<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\Trust\XML\wst_200512;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\SOAP11\Type\MustUnderstandValue;
use SimpleSAML\Test\WebServices\Trust\Constants as C;
use SimpleSAML\WebServices\Addressing\XML\wsa_200508\MessageID;
use SimpleSAML\WebServices\Trust\XML\wst_200512\AbstractRequestSecurityTokenCollectionType;
use SimpleSAML\WebServices\Trust\XML\wst_200512\AbstractWstElement;
use SimpleSAML\WebServices\Trust\XML\wst_200512\RequestSecurityToken;
use SimpleSAML\WebServices\Trust\XML\wst_200512\RequestSecurityTokenCollection;
use SimpleSAML\XML\Attribute as XMLAttribute;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;
use SimpleSAML\XMLSchema\Type\StringValue;

use function dirname;

/**
 * Class \SimpleSAML\WebServices\Trust\XML\wst_200512\RequestSecurityTokenCollectionTest
 *
 * @package simplesamlphp/xml-ws-trust
 */
#[Group('wst')]
#[CoversClass(RequestSecurityTokenCollection::class)]
#[CoversClass(AbstractRequestSecurityTokenCollectionType::class)]
#[CoversClass(AbstractWstElement::class)]
final class RequestSecurityTokenCollectionTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = RequestSecurityTokenCollection::class;

        self::$xmlRepresentation = DOMDocumentFactory::fromFile(
            dirname(__FILE__, 4) . '/resources/xml/wst/200512/RequestSecurityTokenCollection.xml',
        );
    }


    // test marshalling


    /**
     * Test creating a RequestSecurityTokenCollection object from scratch.
     */
    public function testMarshalling(): void
    {
        $mustUnderstand = MustUnderstandValue::fromBoolean(true);
        $msgId1 = new MessageID(
            AnyURIValue::fromString('uuid:d0ccf3cd-2dce-4c1a-a5d6-be8912ecd7de'),
            [$mustUnderstand->toAttribute()],
        );
        $msgId2 = new MessageID(
            AnyURIValue::fromString('uuid:d0ccf3cd-2dce-4c1a-a5d6-be8912ecd7df'),
            [$mustUnderstand->toAttribute()],
        );

        $attr1 = new XMLAttribute(C::NAMESPACE, 'ssp', 'attr1', StringValue::fromString('testval1'));
        $attr2 = new XMLAttribute(C::NAMESPACE, 'ssp', 'attr2', StringValue::fromString('testval2'));
        $requestSecurityToken1 = new RequestSecurityToken(AnyURIValue::fromString(C::NAMESPACE), [$msgId1], [$attr1]);
        $requestSecurityToken2 = new RequestSecurityToken(AnyURIValue::fromSTring(C::NAMESPACE), [$msgId2], [$attr2]);

        $requestSecurityTokenCollection = new RequestSecurityTokenCollection([
            $requestSecurityToken1,
            $requestSecurityToken2,
        ]);

        $this->assertEquals(
            self::$xmlRepresentation->saveXML(self::$xmlRepresentation->documentElement),
            strval($requestSecurityTokenCollection),
        );
    }
}
