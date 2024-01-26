<?php

use SimpleLogger\EnvLoader;

return [
    /**
     * Basic
     * 
     * 基本設定
     * 
     * log_retention_days   : int ログファイルを保持する日数
     * format               : string ログを出力する際のフォーマット
     * file_name_format     : string ログを出力するファイル名のフォーマット
     * file_extension       : string ログファイルの拡張子
     * memory_real_usage    : bool メモリ使用量を取得する際に、実際に割り当てられたメモリ量を取得するかどうか
     * use_memory_formatting: bool メモリ使用量を取得する際に、フォーマットを適用するかどうか
     * memory_precision     : int メモリ使用量の精度
     */
    "log_retention_days"    => env(EnvLoader::LOG_RETENTION_DAYS_KEY, EnvLoader::LOG_RETENTION_DAYS),
    "format"                => env(EnvLoader::FORMAT_KEY, EnvLoader::FORMAT),
    "file_name_format"      => env(EnvLoader::FILE_NAME_FORMAT_KEY, EnvLoader::FILE_NAME_FORMAT),
    "file_extension"        => env(EnvLoader::FILE_EXTENSION_KEY, EnvLoader::FILE_EXTENSION),
    "memory_real_usage"     => env(EnvLoader::MEMORY_REAL_USAGE_KEY, EnvLoader::MEMORY_REAL_USAGE),
    "use_memory_formatting" => env(EnvLoader::USE_MEMORY_FORMATTING_KEY, EnvLoader::USE_MEMORY_FORMATTING),
    "memory_precision"      => env(EnvLoader::MEMORY_PRECISION_KEY, EnvLoader::MEMORY_PRECISION),
];
