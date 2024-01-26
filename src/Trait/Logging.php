<?php

namespace SimpleLogger\Trait;

use SimpleLogger\Enum\LogLevelEnum;
use SimpleLogger\Enum\LogFormatEnum;

/**
 * ログを出力する処理を管理する
 * 
 * @package SimpleLogger\Trait
 * 
 * @property-read LogLevelEnum       $logLevel
 * @property-read array<int, string> $messages
 * 
 * @method void rotateLog()
 * @method string replaceCommonFormat()
 * @method string getDirectory()
 * @method string getFileName()
 */
trait Logging
{
    /**
     * ログを出力する
     *
     * @return void
     */
    public function logging(): void
    {
        // ログローテーションを実行する
        $this->rotateLog();

        // ログを出力するかどうかを判定する
        if (!$this->isLogging()) return;

        // ログを出力するパスを取得する
        $filePath = $this->getDirectory() . DIRECTORY_SEPARATOR . $this->getFileName();

        // message以外の共通フォーマットを置換した文字列を取得する
        $replaceCommonFormat = $this->replaceCommonFormat();

        // ログを出力する
        foreach ($this->messages as $message) {
            // フォーマットをコピーする
            $format = $replaceCommonFormat;

            // messageを置換する
            $text = str_replace(
                LogFormatEnum::MESSAGE->format(),
                $message,
                $format
            );

            // ログを出力する
            file_put_contents(
                $filePath,
                $text . PHP_EOL,
                FILE_APPEND | LOCK_EX
            );
        }
    }

    /**
     * ログを出力するかどうかを判定する
     *
     * @return bool
     */
    protected function isLogging(): bool
    {
        return !empty($this->messages);
    }
}
