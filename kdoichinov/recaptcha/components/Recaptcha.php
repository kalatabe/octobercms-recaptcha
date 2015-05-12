<?php namespace KDoichinov\Recaptcha\Components;

use Cms\Classes\ComponentBase;
use KDoichinov\Recaptcha\Models\RecaptchaSettings;

class Recaptcha extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Recaptcha Component',
            'description' => 'Add a Google Recaptcha to a page'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRender()
    {
        $settings = RecaptchaSettings::instance();
        $this->page['site_key'] = $settings->site_key;
        $this->page['secret_key'] = $settings->site_key;
    }

}