<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\Trust\XML\wst_200512;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\WebServices\Trust\XML\wst_200512\AbstractRequestTypeOpenEnum;
use SimpleSAML\WebServices\Trust\XML\wst_200512\AbstractWstElement;
use SimpleSAML\WebServices\Trust\XML\wst_200512\RequestType;
use SimpleSAML\WebServices\Trust\XML\wst_200512\RequestTypeEnum;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;

use function dirname;

/**
 * Class \SimpleSAML\WebServices\Trust\XML\wst_200512\RequestTypeTest
 *
 * @package simplesamlphp/xml-ws-trust
 */
#[Group('wst')]
#[CoversClass(RequestType::class)]
#[CoversClass(AbstractRequestTypeOpenEnum::class)]
#[CoversClass(AbstractWstElement::class)]
final class RequestTypeTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = RequestType::class;

        self::$xmlRepresentation = DOMDocumentFactory::fromFile(
            dirname(__FILE__, 4) . '/resources/xml/wst/200512/RequestType.xml',
        );
    }


    // test marshalling


    /**
     * Test creating a RequestType object from scratch.
     */
    public function testMarshalling(): void
    {
        $requestType = new RequestType(AnyURIValue::fromString(RequestTypeEnum::Issue->value));

        $this->assertEquals(
            self::$xmlRepresentation->saveXML(self::$xmlRepresentation->documentElement),
            strval($requestType),
        );
    }
}
