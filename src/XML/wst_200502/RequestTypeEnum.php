<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\Trust\XML\wst_200502;

enum RequestTypeEnum: string
{
    case Cancel = 'http://schemas.xmlsoap.org/ws/2005/02/trust/Cancel';
    case Issue = 'http://schemas.xmlsoap.org/ws/2005/02/trust/Issue';
    case Renew = 'http://schemas.xmlsoap.org/ws/2005/02/trust/Renew';
}
