<?php

namespace SimpleLogger\Trait;

use SimpleLogger\Enum\LogLevelEnum;
use SimpleLogger\Enum\LogFormatEnum;

/**
 * ログを出力する際のフォーマットを管理する
 * 
 * @package SimpleLogger\Trait
 * 
 * @property-read LogLevelEnum $logLevel
 * @property-read \SimpleLogger\EnvLoader $env
 * 
 * @method string memoryUsage()
 * @method string memoryPeakUsage()
 * 
 * @method static setStackTrace()
 * @method string stackTraceFileName()
 * @method int stackTraceLineNumber()
 * @method string stackTraceFunctionName()
 * @method string stackTraceClassName()
 */
trait Format
{
    /**
     * ログを出力する際のフォーマット
     *
     * @var string
     */
    protected string $format = "";


    /**
     * message以外の共通フォーマットを置換する
     * 
     * @return string
     */
    protected function replaceCommonFormat(): string
    {
        $format = empty($this->format) ? $this->format() : $this->format;

        // stackTraceを設定する
        $this->setStackTrace();

        foreach (LogFormatEnum::cases() as $case) {
            // formatに$caseが含まれていない場合は、次のループに移る
            if (!str_contains($format, $case->format())) continue;

            // messageの場合は、次のループに移る
            if ($case === LogFormatEnum::MESSAGE) continue;

            // 置換する文字列を取得する
            $replace = match ($case) {
                LogFormatEnum::LOG_LEVEL         => $this->logLevel->value,
                LogFormatEnum::DATETIME          => date("Y-m-d H:i:s"),
                LogFormatEnum::FILE_NAME         => $this->stackTraceFileName(),
                LogFormatEnum::LINE_NUMBER       => $this->stackTraceLineNumber(),
                LogFormatEnum::FUNCTION_NAME     => $this->stackTraceFunctionName(),
                LogFormatEnum::CLASS_NAME        => $this->stackTraceClassName(),
                LogFormatEnum::MEMORY_USAGE      => $this->memoryUsage(),
                LogFormatEnum::MEMORY_PEAK_USAGE => $this->memoryPeakUsage(),
            };

            // formatを置換する
            $format = str_replace($case->format(), $replace, $format);
        }

        return $format;
    }

    /**
     * ログを出力する際のフォーマットを取得する
     *
     * @return string
     */
    protected function format(): string
    {
        return $this->env->format;
    }

    /**
     * ログを出力する際のフォーマットを設定する
     *
     * @param LogFormatEnum|string $format
     * @return static
     */
    public function setFormat(LogFormatEnum|string $format): static
    {
        $this->format = $format;

        return $this;
    }

    /**
     * ログを出力する際のフォーマットを追加する
     *
     * @param LogFormatEnum|string $format
     * @return static
     */
    public function addFormat(LogFormatEnum|string $format): static
    {
        // $formatが空の場合は、setFormat()メソッドを実行する
        if (empty($format)) return $this->setFormat($format);

        $this->format .= $format;

        return $this;
    }
}
