<?php

namespace KDoichinov\Recaptcha\Traits;

use ReCaptcha\ReCaptcha;
use KDoichinov\Recaptcha\Models\RecaptchaSettings;

trait Recaptchable {
    
    private $failed;
    private $errors;
    
    public function recaptcha()
    {
        $settings = RecaptchaSettings::instance();
        if (\Request::has('g-recaptcha-response')) {
            $gRecaptchaResponse = \Request::get('g-recaptcha-response');
            require_once plugins_path() . '/KDoichinov/recaptcha/vendor/autoload.php';
            $recaptcha = new ReCaptcha($settings->secret_key);
            $resp = $recaptcha->verify($gRecaptchaResponse);
            if ($resp->isSuccess()) {
                $this->failed = false;
                return $this;
            } else {
                $this->errors = $resp->getErrorCodes();
                $this->failed = true;
                return $this;
            }
        } else {
            $this->errors = 'Please prove you are not a robot!';
            $this->failed = true;
            return $this;
        }
    }

    public function failed()
    {
        if ($this->failed) {
            return true;
        } else {
            return false;
        }
    }

    public function succeeded()
    {
        return ! $this->failed();
    }

    public function errors()
    {
        return $this->errors;
    }
}