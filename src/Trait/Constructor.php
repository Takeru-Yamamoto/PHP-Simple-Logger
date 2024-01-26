<?php

namespace SimpleLogger\Trait;

use SimpleLogger\EnvLoader;
use SimpleLogger\Enum\LogLevelEnum;

/**
 * Loggerクラスのコンストラクタを管理する
 * 
 * @package SimpleLogger\Trait
 */
trait Constructor
{
    /**
     * .envに定義された項目の値を保持するクラス
     * 
     * @var EnvLoader
     */
    protected EnvLoader $env;

    /**
     * ログの出力レベル
     *
     * @var LogLevelEnum
     */
    protected LogLevelEnum $logLevel;


    /**
     * コンストラクタ
     *
     * @param LogLevelEnum $logLevel
     */
    function __construct(LogLevelEnum $logLevel)
    {
        // .envファイルの内容を保持するクラスのインスタンスを生成
        $this->env = new EnvLoader();

        // ログの出力レベルをセット
        $this->logLevel = $logLevel;
    }

    /**
     * ログの出力レベルを取得する
     *
     * @return LogLevelEnum
     */
    public function logLevel(): LogLevelEnum
    {
        return $this->logLevel;
    }
}
