<?php

namespace SimpleLogger\Proxy;

use SimpleLogger\Proxy\Interface\ManagerInterface;

use SimpleLogger\Logger;
use SimpleLogger\Interface\LoggerInterface;
use SimpleLogger\Enum\LogLevelEnum;

/**
 * Proxyを経由してstaticにアクセスされるManager
 * 
 * @package SimpleLogger\Proxy
 */
class LoggerManager implements ManagerInterface
{
    /**
     * Loggerのインスタンスを生成する
     *
     * @param LogLevelEnum $logLevel
     * @return \SimpleLogger\Logger
     */
    public function make(LogLevelEnum $logLevel): Logger
    {
        return new Logger($logLevel);
    }



    /*----------------------------------------*
     * Create Instance
     *----------------------------------------*/

    /**
     * DebugレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Logger
     */
    public function debug(): Logger
    {
        return $this->make(LogLevelEnum::DEBUG);
    }

    /**
     * InfoレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Logger
     */
    public function info(): Logger
    {
        return $this->make(LogLevelEnum::INFO);
    }

    /**
     * NoticeレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Logger
     */
    public function notice(): Logger
    {
        return $this->make(LogLevelEnum::NOTICE);
    }

    /**
     * WarningレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Logger
     */
    public function warning(): Logger
    {
        return $this->make(LogLevelEnum::WARNING);
    }

    /**
     * ErrorレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Logger
     */
    public function error(): Logger
    {
        return $this->make(LogLevelEnum::ERROR);
    }

    /**
     * CriticalレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Logger
     */
    public function critical(): Logger
    {
        return $this->make(LogLevelEnum::CRITICAL);
    }

    /**
     * AlertレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Logger
     */
    public function alert(): Logger
    {
        return $this->make(LogLevelEnum::ALERT);
    }

    /**
     * EmergencyレベルのLoggerのインスタンスを生成する
     *
     * @return \SimpleLogger\Logger
     */
    public function emergency(): Logger
    {
        return $this->make(LogLevelEnum::EMERGENCY);
    }



    /*----------------------------------------*
     * Logging
     *----------------------------------------*/

    /**
     * ログを出力する
     * 
     * @param \SimpleLogger\Interface\LoggerInterface $logger
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    protected function logging(LoggerInterface $logger, mixed $message, mixed $value = null): void
    {
        $logger->setStackTraceIndex(3)->add($message, $value)->logging();
    }

    /**
     * Debugレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function debugLog(mixed $message, mixed $value = null): void
    {
        $this->logging($this->debug(), $message, $value);
    }

    /**
     * Infoレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function infoLog(mixed $message, mixed $value = null): void
    {
        $this->logging($this->info(), $message, $value);
    }

    /**
     * Noticeレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function noticeLog(mixed $message, mixed $value = null): void
    {
        $this->logging($this->notice(), $message, $value);
    }

    /**
     * Warningレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function warningLog(mixed $message, mixed $value = null): void
    {
        $this->logging($this->warning(), $message, $value);
    }

    /**
     * Errorレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function errorLog(mixed $message, mixed $value = null): void
    {
        $this->logging($this->error(), $message, $value);
    }

    /**
     * Criticalレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function criticalLog(mixed $message, mixed $value = null): void
    {
        $this->logging($this->critical(), $message, $value);
    }

    /**
     * Alertレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function alertLog(mixed $message, mixed $value = null): void
    {
        $this->logging($this->alert(), $message, $value);
    }

    /**
     * Emergencyレベルのログを出力する
     *
     * @param mixed $message
     * @param mixed $value
     * @return void
     */
    public function emergencyLog(mixed $message, mixed $value = null): void
    {
        $this->logging($this->emergency(), $message, $value);
    }
}
