<?php

namespace SimpleLogger;

use EnvLoader\BaseEnvLoader;

/**
 * SimpleLoggerの.envファイルの値を管理するクラス
 * 
 * @package SimpleLogger
 */
class EnvLoader extends BaseEnvLoader
{
    /**
     * key名に共通する接頭後
     * 
     * @var string
     */
    const KEY_PREFIX = "SIMPLE_LOGGER_";



    /*----------------------------------------*
     * Log Rotation Days
     *----------------------------------------*/

    /**
     * ログファイルを保持する日数
     * 
     * @var int
     */
    public int $logRetentionDays;

    /**
     * ログファイルを保持する日数のデフォルト値
     * 
     * @var int
     */
    const LOG_RETENTION_DAYS = 7;

    /**
     * ログファイルを保持する日数のkey名
     * 
     * @var string
     */
    const LOG_RETENTION_DAYS_KEY = self::KEY_PREFIX . "LOG_RETENTION_DAYS";



    /*----------------------------------------*
     * Format
     *----------------------------------------*/

    /**
     * ログに出力するフォーマット
     * 
     * @var string
     */
    public string $format;

    /**
     * ログに出力するフォーマットのデフォルト値
     * 
     * @var string
     */
    const FORMAT = "[%datetime%] %level%: %message%";

    /**
     * ログに出力するフォーマットのkey名
     * 
     * @var string
     */
    const FORMAT_KEY = self::KEY_PREFIX . "FORMAT";



    /*----------------------------------------*
     * File Name Format
     *----------------------------------------*/

    /**
     * ログを出力するファイル名のフォーマット
     * 
     * @var string
     */
    public string $fileNameFormat;

    /**
     * ログを出力するファイル名のフォーマットのデフォルト値
     * 
     * @var string
     */
    const FILE_NAME_FORMAT = "Y-m-d";

    /**
     * ログを出力するファイル名のフォーマットのkey名
     * 
     * @var string
     */
    const FILE_NAME_FORMAT_KEY = self::KEY_PREFIX . "FILE_NAME_FORMAT";



    /*----------------------------------------*
     * File Extension
     *----------------------------------------*/

    /**
     * ログファイルの拡張子
     * 
     * @var string
     */
    public string $fileExtension;

    /**
     * ログファイルの拡張子のデフォルト値
     * 
     * @var string
     */
    const FILE_EXTENSION = "log";

    /**
     * ログファイルの拡張子のkey名
     * 
     * @var string
     */
    const FILE_EXTENSION_KEY = self::KEY_PREFIX . "FILE_EXTENSION";



    /*----------------------------------------*
     * Memory Real Usage
     *----------------------------------------*/

    /**
     * メモリ使用量を取得する際に、実際に割り当てられたメモリ量を取得するかどうか
     *
     * @var bool
     */
    public bool $memoryRealUsage;

    /**
     * メモリ使用量を取得する際に、実際に割り当てられたメモリ量を取得するかどうかのデフォルト値
     *
     * @var bool
     */
    const MEMORY_REAL_USAGE = false;

    /**
     * メモリ使用量を取得する際に、実際に割り当てられたメモリ量を取得するかどうかのkey名
     *
     * @var string
     */
    const MEMORY_REAL_USAGE_KEY = self::KEY_PREFIX . "MEMORY_REAL_USAGE";



    /*----------------------------------------*
     * Use Memory Formatting
     *----------------------------------------*/

    /**
     * メモリ使用量を取得する際に、フォーマットを適用するかどうか
     *
     * @var bool
     */
    public bool $useMemoryFormatting;

    /**
     * メモリ使用量を取得する際に、フォーマットを適用するかどうかのデフォルト値
     *
     * @var bool
     */
    const USE_MEMORY_FORMATTING = true;

    /**
     * メモリ使用量を取得する際に、フォーマットを適用するかどうかのkey名
     *
     * @var string
     */
    const USE_MEMORY_FORMATTING_KEY = self::KEY_PREFIX . "USE_MEMORY_FORMATTING";



    /*----------------------------------------*
     * Memory Precision
     *----------------------------------------*/

    /**
     * メモリ使用量の精度
     *
     * @return int
     */
    public int $memoryPrecision;

    /**
     * メモリ使用量の精度のデフォルト値
     *
     * @return int
     */
    const MEMORY_PRECISION = 2;

    /**
     * メモリ使用量の精度のkey名
     *
     * @return string
     */
    const MEMORY_PRECISION_KEY = self::KEY_PREFIX . "MEMORY_PRECISION";


    /**
     * .envファイルの内容をクラスのプロパティとしてセットする
     * 
     * @return void
     */
    protected function setEnv(): void
    {
        $this->logRetentionDays    = $this->getEnvInt(self::LOG_RETENTION_DAYS_KEY, self::LOG_RETENTION_DAYS);
        $this->format              = $this->getEnvString(self::FORMAT_KEY, self::FORMAT);
        $this->fileNameFormat      = $this->getEnvString(self::FILE_NAME_FORMAT_KEY, self::FILE_NAME_FORMAT);
        $this->fileExtension       = $this->getEnvString(self::FILE_EXTENSION_KEY, self::FILE_EXTENSION);
        $this->memoryRealUsage     = $this->getEnvBool(self::MEMORY_REAL_USAGE_KEY, self::MEMORY_REAL_USAGE);
        $this->useMemoryFormatting = $this->getEnvBool(self::USE_MEMORY_FORMATTING_KEY, self::USE_MEMORY_FORMATTING);
        $this->memoryPrecision     = $this->getEnvInt(self::MEMORY_PRECISION_KEY, self::MEMORY_PRECISION);
    }
}
