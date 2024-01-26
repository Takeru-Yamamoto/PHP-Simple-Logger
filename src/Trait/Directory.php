<?php

namespace SimpleLogger\Trait;

/**
 * ログを出力するディレクトリを管理する
 * 
 * @package SimpleLogger\Trait
 * 
 * @property-read \SimpleLogger\Enum\LogLevelEnum $logLevel
 */
trait Directory
{
    /**
     * ログファイルの出力先ディレクトリ
     *
     * @var string
     */
    protected string $directory = "";


    /**
     * ログファイルの出力先ディレクトリを取得する
     * 
     * @throws \RuntimeException
     * @return string
     */
    protected function getDirectory(): string
    {
        // ログファイルの出力先ディレクトリ
        $directory = empty($this->directory) ? $this->directory() : $this->directory;

        // 出力先ディレクトリを成型する
        $directory = $this->moldDirectory($directory);

        // 出力先ディレクトリが空の場合は、例外を発生させる
        if (empty($directory)) throw new \RuntimeException("Output directory is empty.");

        // 出力先ディレクトリが存在しない場合は、ディレクトリを作成する
        if (!file_exists($directory)) mkdir($directory, 0777, true);

        return $directory;
    }

    /**
     * 設定された出力先ディレクトリを成型する
     *
     * @param string $directory
     * @return string
     */
    protected function moldDirectory(string $directory): string
    {
        return $directory;
    }

    /**
     * ログファイルの出力先ディレクトリを取得する
     *
     * @return string
     */
    protected function directory(): string
    {
        return $this->logLevel->value;
    }

    /**
     * ログファイルの出力先ディレクトリを設定する
     *
     * @param string $directory
     * @return static
     */
    public function setDirectory(string $directory): static
    {
        // $directoryが空の場合は、処理を終了する
        if (empty($directory)) return $this;

        $this->directory = $directory;

        return $this;
    }

    /**
     * ログファイルの出力先ディレクトリを追加する
     *
     * @param string $directory
     * @return static
     */
    public function addDirectory(string $directory): static
    {
        // $directoryが空の場合は、処理を終了する
        if (empty($directory)) return $this;

        // $this->directoryが空の場合は、setDirectory()を実行する
        if (empty($this->directory)) return $this->setDirectory($directory);

        $this->directory .= DIRECTORY_SEPARATOR . $directory;

        return $this;
    }
}
