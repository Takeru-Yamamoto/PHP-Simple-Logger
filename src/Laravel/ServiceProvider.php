<?php

namespace SimpleLogger\Laravel;

use Illuminate\Support\ServiceProvider as Provider;

use SimpleLogger\Laravel\LoggerManager;
use SimpleLogger\Laravel\Facade\Logger;

/**
 * ServiceProvider
 * Facadeの登録とパッケージに含まれるファイルの公開の設定を行う
 * 
 * @package SimpleLogger\Laravel
 */
class ServiceProvider extends Provider
{
    /**
     * publications配下を公開する際に使うルートパス
     *
     * @var string
     */
    private string $publicationsPath = __DIR__ . DIRECTORY_SEPARATOR . "publications";


    /**
     * アプリケーションの起動時に実行する
     * FacadeとManagerの紐づけを行う
     * 
     * @return void
     */
    public function register(): void
    {
        // FacadeとManagerの紐づけ
        $this->app->singleton(Logger::class, function () {
            return new LoggerManager();
        });
    }

    /**
     * アプリケーションのブート時に実行する
     * パッケージに含まれるファイルの公開の設定を行う
     * 
     * @return void
     */
    public function boot(): void
    {
        // config配下の公開
        // 自作パッケージ共通タグ
        $this->publishes([
            $this->publicationsPath . DIRECTORY_SEPARATOR . "config" => config_path(),
        ], "publications");

        // このパッケージのみ
        $this->publishes([
            $this->publicationsPath . DIRECTORY_SEPARATOR . "config" => config_path(),
        ], "simple-logger");
    }
}
