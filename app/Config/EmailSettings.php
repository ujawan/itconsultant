<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class EmailSettings extends BaseConfig
{
    /**
     * SMTP Configuration
     */
    public $smtpHost = 'smtp.gmail.com';
    public $smtpPort = 587;
    public $smtpCrypto = 'tls';
    public $smtpAuth = true;

    /**
     * Email Credentials
     */
    public $fromEmail = 'ujawan42@gmail.com';
    public $fromName = 'IT Consultant';
    public $username = 'ujawan42@gmail.com';
    public $password = 'nqau xsee dyzf ypqo';

    /**
     * Debug Settings
     */
    public $debug = 3; // Maximum debug level for development

    /**
     * Get PHPMailer configuration array
     */
    public function getConfig()
    {
        return [
            'host' => $this->smtpHost,
            'port' => $this->smtpPort,
            'secure' => $this->smtpCrypto,
            'auth' => $this->smtpAuth,
            'username' => $this->username,
            'password' => $this->password,
            'from_email' => $this->fromEmail,
            'from_name' => $this->fromName,
            'debug' => $this->debug
        ];
    }
}
