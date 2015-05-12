<?php

namespace KDoichinov\Recaptcha\Models;

use Model;

class RecaptchaSettings extends Model {
    
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'KDoichinov_recaptcha';

    public $settingsFields = 'fields.yaml';
    
}