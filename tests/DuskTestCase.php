<?php
namespace Tests;
use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;
    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }
    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $options_array = env('TRAVIS', false) ? ['--disable-gpu','--headless','--window-size=1100,600'] : [];
        $options = (new ChromeOptions)->addArguments($options_array);
        return RemoteWebDriver::create(
            env('CHROME_HOST', 'http://selenium:4444/wd/hub'), DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }
}
