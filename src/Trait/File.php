<?php

namespace SimpleLogger\Trait;

/**
 * ログを出力するファイルを管理する
 * 
 * @package SimpleLogger\Trait
 * 
 * @property-read \SimpleLogger\EnvLoader $env
 */
trait File
{
    /**
     * ログファイルのファイル名
     *
     * @var string
     */
    protected string $fileName = "";

    /**
     * ログファイルの拡張子
     *
     * @var string
     */
    protected string $fileExtension = "";

    /**
     * ログファイルのファイル名のフォーマット
     *
     * @var string
     */
    protected string $fileNameFormat = "";


    /**
     * ログファイルのファイル名を取得する
     * 
     * @throws \RuntimeException
     * @return string
     */
    protected function getFileName(): string
    {
        // ログファイルのファイル名
        $fileName = empty($this->fileName) ? $this->fileName() : $this->fileName;

        // ログファイルの拡張子
        $fileExtension = empty($this->fileExtension) ? $this->fileExtension() : $this->fileExtension;

        return match (true) {
            empty($fileName) && empty($fileExtension) => throw new \RuntimeException("File name and file extension are empty."),

            empty($fileName)      => ".{$fileExtension}",
            empty($fileExtension) => $fileName,

            default => "{$fileName}.{$fileExtension}",
        };
    }



    /*----------------------------------------*
     * File Name
     *----------------------------------------*/

    /**
     * ログファイルのファイル名を取得する
     *
     * @return string
     */
    protected function fileName(): string
    {
        // ファイル名のフォーマット
        $fileNameFormat = empty($this->fileNameFormat) ? $this->fileNameFormat() : $this->fileNameFormat;

        return (new \DateTime())->format($fileNameFormat);
    }

    /**
     * ログファイルのファイル名を設定する
     *
     * @param string $fileName
     * @return static
     */
    public function setFileName(string $fileName): static
    {
        // $fileNameが空の場合は、処理を終了する
        if (empty($fileName)) return $this;

        $this->fileName = $fileName;

        return $this;
    }



    /*----------------------------------------*
     * File Name Format
     *----------------------------------------*/

    /**
     * ログファイルのファイル名のフォーマットを取得する
     *
     * @return string
     */
    protected function fileNameFormat(): string
    {
        return $this->env->fileNameFormat;
    }

    /**
     * ログファイルのファイル名のフォーマットを設定する
     *
     * @param string $fileNameFormat
     * @return static
     */
    public function setFileNameFormat(string $fileNameFormat): static
    {
        // $fileNameFormatが空の場合は、処理を終了する
        if (empty($fileNameFormat)) return $this;

        $this->fileNameFormat = $fileNameFormat;

        return $this;
    }



    /*----------------------------------------*
     * File Extension
     *----------------------------------------*/

    /**
     * ログファイルの拡張子を取得する
     *
     * @return string
     */
    protected function fileExtension(): string
    {
        return $this->env->fileExtension;
    }

    /**
     * ログファイルの拡張子を設定する
     *
     * @param string $fileExtension
     * @return static
     */
    public function setFileExtension(string $fileExtension): static
    {
        $this->fileExtension = $fileExtension;

        return $this;
    }
}
