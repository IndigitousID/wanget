<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade, Config;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Blade::directive('date_indo', function($expression) 
		{
			return "<?php echo with{$expression}->format('d-m-Y'); ?>";
		});

		Blade::directive('datetime_indo', function($expression) 
		{
			return "<?php echo with{$expression}->format('d-m-Y H:i'); ?>";
		});

		Blade::directive('datetime_with_name_month_indo', function($expression) 
		{
			return "<?php echo with{$expression}->format('d F Y  |  H:i'); ?>";
		});

		Blade::directive('number', function($expression)
		{
			return "<?php echo number_format($expression, 0, ',', '.'); ?>";
		});

		Config::set('fb_app.id', '491225264379551');
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}
