<?php

namespace SimpleLogger\Enum;

/**
 * ログの出力レベルを表すEnum
 * 
 * @package SimpleLogger\Enum
 */
enum LogLevelEnum: string
{
    case DEBUG     = "debug";
    case INFO      = "info";
    case NOTICE    = "notice";
    case WARNING   = "warning";
    case ERROR     = "error";
    case CRITICAL  = "critical";
    case ALERT     = "alert";
    case EMERGENCY = "emergency";

    /**
     * ログの出力レベルがDEBUGかどうかを判定する
     *
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->value === self::DEBUG;
    }

    /**
     * ログの出力レベルがINFOかどうかを判定する
     *
     * @return bool
     */
    public function isInfo(): bool
    {
        return $this->value === self::INFO;
    }

    /**
     * ログの出力レベルがNOTICEかどうかを判定する
     *
     * @return bool
     */
    public function isNotice(): bool
    {
        return $this->value === self::NOTICE;
    }

    /**
     * ログの出力レベルがWARNINGかどうかを判定する
     *
     * @return bool
     */
    public function isWarning(): bool
    {
        return $this->value === self::WARNING;
    }

    /**
     * ログの出力レベルがERRORかどうかを判定する
     *
     * @return bool
     */
    public function isError(): bool
    {
        return $this->value === self::ERROR;
    }

    /**
     * ログの出力レベルがCRITICALかどうかを判定する
     *
     * @return bool
     */
    public function isCritical(): bool
    {
        return $this->value === self::CRITICAL;
    }

    /**
     * ログの出力レベルがALERTかどうかを判定する
     *
     * @return bool
     */
    public function isAlert(): bool
    {
        return $this->value === self::ALERT;
    }

    /**
     * ログの出力レベルがEMERGENCYかどうかを判定する
     *
     * @return bool
     */
    public function isEmergency(): bool
    {
        return $this->value === self::EMERGENCY;
    }
}
