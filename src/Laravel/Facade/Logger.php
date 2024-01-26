<?php

namespace SimpleLogger\Laravel\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * LoggerのFacade
 * LoggerManagerのMethodをstaticに呼び出せるようにする
 * 
 * @package SimpleLogger\Laravel\Facade
 * 
 * @method static \SimpleLogger\Laravel\Interface\LoggerInterface make(\SimpleLogger\Enum\LogLevelEnum $logLevel)
 * 
 * @method static \SimpleLogger\Laravel\Interface\LoggerInterface debug()
 * @method static \SimpleLogger\Laravel\Interface\LoggerInterface info()
 * @method static \SimpleLogger\Laravel\Interface\LoggerInterface notice()
 * @method static \SimpleLogger\Laravel\Interface\LoggerInterface warning()
 * @method static \SimpleLogger\Laravel\Interface\LoggerInterface error()
 * @method static \SimpleLogger\Laravel\Interface\LoggerInterface critical()
 * @method static \SimpleLogger\Laravel\Interface\LoggerInterface alert()
 * @method static \SimpleLogger\Laravel\Interface\LoggerInterface emergency()
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
 * @see \SimpleLogger\Laravel\Interface\ManagerInterface
 */
class Logger extends Facade
{
    /** 
     * LoggerManagerにアクセスするためのFacadeの名前を取得する
     * 
     * @return string 
     */
    protected static function getFacadeAccessor(): string
    {
        return static::class;
    }
}
