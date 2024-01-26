<?php

namespace SimpleLogger\Proxy;

use StaticProxy\StaticProxy;

use SimpleLogger\Proxy\LoggerManager;

/**
 * LoggerのProxy
 * LoggerManagerのMethodをstaticに呼び出せるようにする
 * 
 * @package SimpleLogger\Proxy
 * 
 * @method static \SimpleLogger\Interface\LoggerInterface make(\SimpleLogger\Enum\LogLevelEnum $logLevel)
 * 
 * @method static \SimpleLogger\Interface\LoggerInterface debug()
 * @method static \SimpleLogger\Interface\LoggerInterface info()
 * @method static \SimpleLogger\Interface\LoggerInterface notice()
 * @method static \SimpleLogger\Interface\LoggerInterface warning()
 * @method static \SimpleLogger\Interface\LoggerInterface error()
 * @method static \SimpleLogger\Interface\LoggerInterface critical()
 * @method static \SimpleLogger\Interface\LoggerInterface alert()
 * @method static \SimpleLogger\Interface\LoggerInterface emergency()
 * 
 * @method static void debugLog(mixed $message, mixed $value = null)
 * @method static void infoLog(mixed $message, mixed $value = null)
 * @method static void noticeLog(mixed $message, mixed $value = null)
 * @method static void warningLog(mixed $message, mixed $value = null)
 * @method static void errorLog(mixed $message, mixed $value = null)
 * @method static void criticalLog(mixed $message, mixed $value = null)
 * @method static void alertLog(mixed $message, mixed $value = null)
 * @method static void emergencyLog(mixed $message, mixed $value = null)
 * 
 * @see \SimpleLogger\Proxy\Interface\ManagerInterface
 */
class Logger extends StaticProxy
{
    /** 
     * LoggerManagerの実クラス名を取得する
     * 
     * @return string 
     */
    public static function getRealInstanceName(): string
    {
        return LoggerManager::class;
    }
}
