<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function($notificable, $url){
            return (new MailMessage)
            ->subject('Verificar Cuenta')
            ->line('Haga clic en el botón a continuación para verificar su dirección de correo electrónico.')
            ->action('Confirmar Cuenta',$url)
            ->line('Si no creaste esta cuenta, puedes ignorar este mensaje. Saludos');
        });
    }
}
