<?php

namespace SimpleLogger\Trait;

/**
 * メモリ使用量を管理する
 * 
 * @package SimpleLogger\Trait
 * 
 * @property-read \SimpleLogger\EnvLoader $env
 */
trait Memory
{
    /**
     * メモリ使用量を取得する
     *
     * @return string
     */
    protected function memoryUsage(): string
    {
        $usage = memory_get_usage($this->memoryRealUsage());

        if ($this->useMemoryFormatting()) {
            $usage = $this->formatBytes($usage);
        }

        return $usage;
    }

    /**
     * メモリ使用量の最大値を取得する
     *
     * @return string
     */
    protected function memoryPeakUsage(): string
    {
        $usage = memory_get_peak_usage($this->memoryRealUsage());

        if ($this->useMemoryFormatting()) {
            $usage = $this->formatBytes($usage);
        }

        return $usage;
    }

    /**
     * バイト数をフォーマットする
     *
     * @param float $bytes
     * @return string
     */
    protected function formatBytes(float $bytes): string
    {
        $units = [
            3 => "GB",
            2 => "MB",
            1 => "KB",
            0 => "B",
        ];

        foreach ($units as $pow => $unit) {
            $target = 1024 ** $pow;

            if ($bytes < $target) continue;

            return round($bytes / $target, $this->memoryPrecision()) . $unit;
        }
    }

    /**
     * メモリ使用量を取得する際に、実際に割り当てられたメモリ量を取得するかどうか
     * 
     * @return bool
     */
    protected function memoryRealUsage(): bool
    {
        return $this->env->memoryRealUsage;
    }

    /**
     * メモリ使用量を取得する際に、フォーマットを適用するかどうか
     * 
     * @return bool
     */
    protected function useMemoryFormatting(): bool
    {
        return $this->env->useMemoryFormatting;
    }

    /**
     * メモリ使用量の精度
     * 
     * @return int
     */
    protected function memoryPrecision(): int
    {
        return $this->env->memoryPrecision;
    }
}
