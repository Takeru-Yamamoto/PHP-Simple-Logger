<?php

namespace SimpleLogger\Laravel;

use SimpleLogger\Laravel\Interface\ManagerInterface;
use SimpleLogger\Proxy\LoggerManager as SimpleLoggerManager;

use SimpleLogger\Laravel\Logger;
use SimpleLogger\Enum\LogLevelEnum;

/**
 * Facadeを経由してstaticにアクセスされるManager
 * 
 * @package SimpleLogger\Laravel
 */
class LoggerManager extends SimpleLoggerManager implements ManagerInterface
{
    /**
     * Loggerのインスタンスを生成する
     *
     * @param LogLevelEnum $logLevel
     * @return \SimpleLogger\Laravel\Logger
     */
    public function make(LogLevelEnum $logLevel): Logger
    {
        return new Logger($logLevel);
    }
}
