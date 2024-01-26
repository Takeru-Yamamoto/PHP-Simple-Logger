<?php

namespace SimpleLogger\Trait;

/**
 * ログに出力するメッセージを管理する
 * 
 * @package SimpleLogger\Trait
 */
trait Message
{
    /**
     * 出力するメッセージの配列
     *
     * @var array<int, string>
     */
    protected array $messages = [];


    /**
     * メッセージを追加する
     *
     * @param mixed $message
     * @param mixed $value
     * @return static
     */
    public function add(mixed $message, mixed $value = null, bool $isEmphasis = false): static
    {
        $message = match (true) {
            // $messageがnullの場合は、nullを文字列に変換する
            is_null($message)    => "null",

            // $messageが文字列の場合は、文字列をそのまま返す
            is_string($message)  => $message,

            // $messageが数値の場合は、数値を文字列に変換する
            is_numeric($message) => (string) $message,

            // $messageが真偽値の場合は、真偽値を文字列に変換する
            is_bool($message)    => $message ? "true" : "false",

            // $messageが配列の場合は、配列を文字列に変換する
            is_array($message)   => json_encode($message, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),

            // $messageがオブジェクトの場合は、オブジェクトを文字列に変換する
            is_object($message)  => json_encode($message, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),

            default              => $message,
        };

        $value = match (true) {
            // $messageが文字列の場合は、文字列をそのまま返す
            is_string($value)  => $value,

            // $valueが数値の場合は、数値を文字列に変換する
            is_numeric($value) => (string) $value,

            // $valueが真偽値の場合は、真偽値を文字列に変換する
            is_bool($value)    => $value ? "true" : "false",

            // $valueが配列の場合は、配列を文字列に変換する
            is_array($value)   => json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),

            // $valueがオブジェクトの場合は、オブジェクトを文字列に変換する
            is_object($value)  => json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),

            default            => $value,
        };

        // $valueがnullでない場合は、$messageと$valueをキーと値の形式で$messageに追加する
        if (!is_null($value)) $message = $message . ": " . $value;

        // $isEmphasisがtrueの場合は、ログに追加するメッセージを強調する
        $this->messages[] = $isEmphasis ? "===== " . $message . " =====" : $message;

        return $this;
    }

    /**
     * メッセージを強調して追加する
     *
     * @param mixed $message
     * @return static
     */
    public function addEmphasis(mixed $message): static
    {
        return $this->addEmpty()->add($message, isEmphasis: true)->addEmpty();
    }

    /**
     * ログに共通部分だけの空の行を追加する
     *
     * @return static
     */
    public function addEmpty(): static
    {
        return $this->add("");
    }

    /**
     * ログに共通部分だけの区切り線を追加する
     *
     * @return static
     */
    public function addDivider(): static
    {
        return $this->addEmpty()->add("===========================")->addEmpty();
    }
}
