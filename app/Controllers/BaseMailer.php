<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Config\EmailSettings;

class BaseMailer extends Controller
{
    protected $mail;
    protected $emailConfig;

    public function __construct()
    {
        $this->emailConfig = new EmailSettings();
    }

    protected function setupMailer()
    {
        try {
            $this->mail = new PHPMailer(true);
            $config = $this->emailConfig->getConfig();

            // Enable debug logging
            $this->mail->SMTPDebug = $config['debug'];
            $this->mail->Debugoutput = function($str, $level) {
                log_message('debug', "PHPMailer ($level): " . trim($str));
            };

            // Server settings
            $this->mail->isSMTP();
            $this->mail->Host = $config['host'];
            $this->mail->SMTPAuth = $config['auth'];
            $this->mail->Username = $config['username'];
            $this->mail->Password = $config['password'];
            $this->mail->SMTPSecure = $config['secure'];
            $this->mail->Port = $config['port'];

            // Default sender
            $this->mail->setFrom($config['from_email'], $config['from_name']);
            $this->mail->addAddress($config['from_email']); // Admin will receive all emails

            // Email settings
            $this->mail->isHTML(true);

            log_message('debug', 'PHPMailer configured successfully');
            return true;
        } catch (Exception $e) {
            log_message('error', 'Failed to configure PHPMailer: ' . $e->getMessage());
            return false;
        }
    }

    protected function sendEmail($subject, $body, $replyTo = null, $replyToName = null)
    {
        try {
            if (!$this->setupMailer()) {
                throw new Exception('Failed to configure mailer');
            }

            // Set reply-to if provided
            if ($replyTo) {
                $this->mail->addReplyTo($replyTo, $replyToName ?? '');
            }

            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            $this->mail->send();
            log_message('info', 'Email sent successfully');
            return true;
        } catch (Exception $e) {
            log_message('error', 'Failed to send email: ' . $e->getMessage());
            throw $e;
        }
    }
}
