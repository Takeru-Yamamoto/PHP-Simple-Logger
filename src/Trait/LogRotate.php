<?php

namespace SimpleLogger\Trait;

/**
 * ログローテーションを行う処理を管理する
 * 
 * @package SimpleLogger\Trait
 * 
 * @property-read \SimpleLogger\EnvLoader $env
 * 
 * @method string getDirectory()
 */
trait LogRotate
{
    /**
     * ログローテーションを行う
     * 
     * @return void
     */
    protected function rotateLog(): void
    {
        // ログファイルを保持する日数を取得
        $logRetentionDays = $this->logRetentionDays();

        // ログファイルを保持する日数が0以下の場合は処理を終了する
        if ($logRetentionDays <= 0) return;

        // 削除するログファイルの最終更新日時を取得する
        $deleteDate = date("Ymd", strtotime("-{$logRetentionDays} day"));

        // ログの出力ディレクトリ内のファイルの一覧を取得する
        // 拡張子が変更される可能性があるため、すべてのファイルを取得する
        $files = glob($this->getDirectory() . DIRECTORY_SEPARATOR . "*");

        // ログファイルを保持する日数を超えたファイルを削除する
        foreach ($files as $file) {
            // ファイルの最終更新日時を取得する
            $fileDate = date("Ymd", filemtime($file));

            // ファイルの最終更新日時が削除するログファイルの最終更新日時よりも古い場合は削除する
            if ($fileDate < $deleteDate) {
                unlink($file);
            }
        }
    }

    /**
     * ログファイルを保持する日数を取得する
     * 
     * @return int
     */
    protected function logRetentionDays(): int
    {
        return $this->env->logRetentionDays;
    }
}
