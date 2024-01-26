<?php

namespace SimpleLogger;

use SimpleLogger\Interface\LoggerInterface;

use SimpleLogger\Trait\Constructor;
use SimpleLogger\Trait\Logging;
use SimpleLogger\Trait\LogRotate;

use SimpleLogger\Trait\Message;
use SimpleLogger\Trait\Directory;
use SimpleLogger\Trait\File;
use SimpleLogger\Trait\Format;
use SimpleLogger\Trait\Memory;
use SimpleLogger\Trait\StackTrace;

/**
 * ログを出力する
 * 
 * @package SimpleLogger
 */
class Logger implements LoggerInterface
{
    use Constructor;
    use Logging;
    use LogRotate;

    use Message;
    use Directory;
    use File;
    use Format;
    use Memory;
    use StackTrace;
}
