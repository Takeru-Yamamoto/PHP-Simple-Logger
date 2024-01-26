<?php

namespace SimpleLogger\Enum;

/**
 * ログを出力する際のフォーマットを表すEnum
 * 
 * @package SimpleLogger\Enum
 */
enum LogFormatEnum: string
{
    case LOG_LEVEL         = "log_level";
    case MESSAGE           = "message";
    case DATETIME          = "datetime";
    case FILE_NAME         = "file_name";
    case LINE_NUMBER       = "line_number";
    case FUNCTION_NAME     = "function_name";
    case CLASS_NAME        = "class_name";
    case MEMORY_USAGE      = "memory_usage";
    case MEMORY_PEAK_USAGE = "memory_peak_usage";

    /**
     * ログの出力フォーマットを取得する
     *
     * @return string
     */
    public function format(): string
    {
        return match ($this) {
            self::LOG_LEVEL         => "%level%",
            self::MESSAGE           => "%message%",
            self::DATETIME          => "%datetime%",
            self::FILE_NAME         => "%file%",
            self::LINE_NUMBER       => "%line%",
            self::FUNCTION_NAME     => "%function%",
            self::CLASS_NAME        => "%class%",
            self::MEMORY_USAGE      => "%memory_usage%",
            self::MEMORY_PEAK_USAGE => "%memory_peak_usage%",
        };
    }
}
