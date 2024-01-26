<?php

namespace SimpleLogger\Laravel;

use SimpleLogger\Laravel\Interface\LoggerInterface;

use SimpleLogger\Logger as SimpleLogger;
use SimpleLogger\EnvLoader;
use SimpleLogger\Enum\LogLevelEnum;

/**
 * \SimpleLogger\Loggerを継承し、Laravel用に拡張したLogger
 * 設定された出力先ディレクトリをstorage_path()を用いて成型する
 * 
 * @package SimpleLogger\Laravel
 */
class Logger extends SimpleLogger implements LoggerInterface
{
    /**
     * コンストラクタ
     * EnvLoaderを使用しない
     *
     * @param LogLevelEnum $logLevel
     */
    function __construct(LogLevelEnum $logLevel)
    {
        // ログの出力レベルをセット
        $this->logLevel = $logLevel;
    }

    /**
     * 設定された出力先ディレクトリを成型する
     *
     * @param string $directory
     * @return string
     */
    protected function moldDirectory(string $directory): string
    {
        if (!function_exists("storage_path")) return parent::moldDirectory($directory);

        return storage_path("logs" . DIRECTORY_SEPARATOR . $directory);
    }

    /**
     * ログを出力するかどうかを判定する
     * 継承元のisLogging()がfalseを返す場合は、ログを出力しない
     * logLevelがDEBUGであり、環境変数APP_DEBUGがfalseの場合は、ログを出力しない
     *
     * @return bool
     */
    protected function isLogging(): bool
    {
        if (!parent::isLogging()) return false;

        if (!function_exists("config")) return false;

        if ($this->logLevel->isDebug() && !config("app.debug")) return false;

        return true;
    }

    /**
     * ログファイルを保持する日数を取得する
     * 
     * @return int
     */
    protected function logRetentionDays(): int
    {
        if (!function_exists("config")) return EnvLoader::LOG_RETENTION_DAYS;

        return config("simple-logger.log_retention_days", EnvLoader::LOG_RETENTION_DAYS);
    }

    /**
     * ログを出力する際のフォーマットを取得する
     *
     * @return string
     */
    protected function format(): string
    {
        if (!function_exists("config")) return EnvLoader::FORMAT;

        return config("simple-logger.format", EnvLoader::FORMAT);
    }

    /**
     * ログファイルのファイル名のフォーマットを取得する
     *
     * @return string
     */
    protected function fileNameFormat(): string
    {
        if (!function_exists("config")) return EnvLoader::FILE_NAME_FORMAT;

        return config("simple-logger.file_name_format", EnvLoader::FILE_NAME_FORMAT);
    }

    /**
     * ログファイルの拡張子を取得する
     *
     * @return string
     */
    protected function fileExtension(): string
    {
        if (!function_exists("config")) return EnvLoader::FILE_EXTENSION;

        return config("simple-logger.file_extension", EnvLoader::FILE_EXTENSION);
    }

    /**
     * メモリ使用量を取得する際に、実際に割り当てられたメモリ量を取得するかどうか
     * 
     * @return bool
     */
    protected function memoryRealUsage(): bool
    {
        if (!function_exists("config")) return EnvLoader::MEMORY_REAL_USAGE;

        return config("simple-logger.memory_real_usage", EnvLoader::MEMORY_REAL_USAGE);
    }

    /**
     * メモリ使用量を取得する際に、フォーマットを適用するかどうか
     * 
     * @return bool
     */
    protected function useMemoryFormatting(): bool
    {
        if (!function_exists("config")) return EnvLoader::USE_MEMORY_FORMATTING;

        return config("simple-logger.use_memory_formatting", EnvLoader::USE_MEMORY_FORMATTING);
    }

    /**
     * メモリ使用量の精度
     * 
     * @return int
     */
    protected function memoryPrecision(): int
    {
        if (!function_exists("config")) return EnvLoader::MEMORY_PRECISION;

        return config("simple-logger.memory_precision", EnvLoader::MEMORY_PRECISION);
    }
}
