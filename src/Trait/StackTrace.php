<?php

namespace SimpleLogger\Trait;

/**
 * スタックトレースを管理する
 * 
 * @package SimpleLogger\Trait
 */
trait StackTrace
{
    /**
     * スタックトレース
     *
     * @var array
     */
    protected array $stackTrace = [];

    /**
     * スタックトレースを取得する為のindex
     * 
     * @var int
     */
    protected int $stackTraceIndex = 0;

    /**
     * スタックトレースを設定する
     *
     * @return static
     */
    protected function setStackTrace(): static
    {
        $stackTrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);

        // 0番目は必ずこのメソッド自身なので削除する
        array_shift($stackTrace);

        // 1番目は必ずこのメソッドを呼び出したメソッドなので削除する
        array_shift($stackTrace);

        // スタックトレースを格納する
        $this->stackTrace = $stackTrace;

        return $this;
    }

    /**
     * ログ出力処理を実行したファイルのパスを取得する
     * 
     * @return string
     */
    protected function stackTraceFileName(): string
    {
        return $this->stackTrace[$this->stackTraceIndex]["file"] ?? "";
    }

    /**
     * ログ出力処理を実行したファイルの行番号を取得する
     * 
     * @return int
     */
    protected function stackTraceLineNumber(): int
    {
        return $this->stackTrace[$this->stackTraceIndex]["line"] ?? 0;
    }

    /**
     * ログ出力処理を実行したファイルの関数名を取得する
     * 
     * @return string
     */
    protected function stackTraceFunctionName(): string
    {
        return $this->stackTrace[$this->stackTraceIndex + 1]["function"] ?? "";
    }

    /**
     * ログ出力処理を実行したファイルのクラス名を取得する
     * 
     * @return string
     */
    protected function stackTraceClassName(): string
    {
        return $this->stackTrace[$this->stackTraceIndex + 1]["class"] ?? "";
    }

    /**
     * スタックトレースを取得する為のindexを設定する
     * 
     * @param int $index
     * @return static
     */
    public function setStackTraceIndex(int $index): static
    {
        $this->stackTraceIndex = $index;

        return $this;
    }
}
