<?php

namespace SimpleLogger\Proxy\Interface;

use SimpleLogger\Interface\LoggerInterface;

use SimpleLogger\Enum\LogLevelEnum;

/**
 * Proxyを経由してstaticにアクセスされるManagerのInterface
 * 
 * @package SimpleLogger\Proxy\Interface
 */
interface ManagerInterface
{
    /**
     * Loggerのインスタンスを生成する
     *
     * @param LogLevelEnum $logLevel
     * @return \SimpleLogger\Interface\LoggerInterface
     */
    public function make(LogLevelEnum $logLevel): LoggerInterface;



    /*----------------------------------------*
     * Create Instance
     *----------------------------------------*/

    /**
     * DebugレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Interface\LoggerInterface
     */
    public function debug(): LoggerInterface;

    /**
     * InfoレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Interface\LoggerInterface
     */
    public function info(): LoggerInterface;

    /**
     * NoticeレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Interface\LoggerInterface
     */
    public function notice(): LoggerInterface;

    /**
     * WarningレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Interface\LoggerInterface
     */
    public function warning(): LoggerInterface;

    /**
     * ErrorレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Interface\LoggerInterface
     */
    public function error(): LoggerInterface;

    /**
     * CriticalレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Interface\LoggerInterface
     */
    public function critical(): LoggerInterface;

    /**
     * AlertレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Interface\LoggerInterface
     */
    public function alert(): LoggerInterface;

    /**
     * EmergencyレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Interface\LoggerInterface
     */
    public function emergency(): LoggerInterface;



    /*----------------------------------------*
     * Logging
     *----------------------------------------*/

    /**
     * Debugレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function debugLog(mixed $message, mixed $value = null): void;

    /**
     * Infoレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function infoLog(mixed $message, mixed $value = null): void;

    /**
     * Noticeレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function noticeLog(mixed $message, mixed $value = null): void;

    /**
     * Warningレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function warningLog(mixed $message, mixed $value = null): void;

    /**
     * Errorレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function errorLog(mixed $message, mixed $value = null): void;

    /**
     * Criticalレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function criticalLog(mixed $message, mixed $value = null): void;

    /**
     * Alertレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function alertLog(mixed $message, mixed $value = null): void;

    /**
     * Emergencyレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function emergencyLog(mixed $message, mixed $value = null): void;
}
