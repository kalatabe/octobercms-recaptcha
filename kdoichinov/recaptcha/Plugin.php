<?php
namespace KDoichinov\Recaptcha;

use Backend;
use RainLab\User\Components\Account as AccountComponent;
/**
 * Class Plugin
 * @package KDoichinov\Recaptcha
 */
class Plugin extends \System\Classes\PluginBase
{
    /**
     * Plugin details such as description, author, etc
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Recaptcha Plugin',
            'description' => 'Provides a Google Recaptcha',
            'author' => 'KDoichinov',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * Components that this plugin utilizes, located in {plugins_dir}/{plugin_dir}/components
     * @return array
     */
    public function registerComponents()
    {
        return [
            'KDoichinov\Recaptcha\Components\Recaptcha' => 'recaptcha'
        ];
    }

    /**
     * Settings model for this plugin
     * @return array
     */
    public function registerSettings(){
        return [
            'settings' => [
                'label'       => 'Google Recaptcha',
                'description' => 'Manage Google Recaptcha keys.',
                'icon'        => 'icon-bar-chart-o',
                'class'       => 'KDoichinov\Recaptcha\Models\RecaptchaSettings',
                'order'       => 3
            ]
        ];
    }
}

