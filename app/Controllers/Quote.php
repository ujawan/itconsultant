<?php

namespace App\Controllers;

class Quote extends BaseMailer
{
    public function send()
    {
        try {
            // Get form data
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $service = $this->request->getPost('service');
            $message = $this->request->getPost('message');

            // Debug log
            log_message('debug', '--------- Quote Form Submission Start ---------');
            log_message('debug', 'Form data received:');
            log_message('debug', 'Name: ' . ($name ?? 'not set'));
            log_message('debug', 'Email: ' . ($email ?? 'not set'));
            log_message('debug', 'Service: ' . ($service ?? 'not set'));
            log_message('debug', 'Message: ' . ($message ?? 'not set'));

            // Validate required fields
            if (empty($name) || empty($email) || empty($service) || empty($message)) {
                log_message('error', 'Form validation failed - Empty fields');
                return redirect()->back()->with('error', 'All fields are required');
            }

            // Validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                log_message('error', 'Form validation failed - Invalid email: ' . $email);
                return redirect()->back()->with('error', 'Invalid email format');
            }

            // Prepare email content
            $subject = 'New Quote Request from ' . $name;
            $body = "
                <h2>New Quote Request</h2>
                <p><strong>Name:</strong> {$name}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Service:</strong> {$service}</p>
                <p><strong>Message:</strong></p>
                <p>{$message}</p>
            ";

            // Send email
            $this->sendEmail($subject, $body, $email, $name);

            log_message('debug', 'Email content prepared');

            
            // Success response
            log_message('debug', '--------- Quote Form Submission End: Success ---------');
            return redirect()->back()->with('success', 'Your quote request has been sent successfully!');
        } catch (Exception $e) {
            // Log the full error
            log_message('error', '--------- Quote Form Submission End: Error ---------');
            log_message('error', 'Exception message: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());
            
            // Return user-friendly error
            return redirect()->back()->with('error', 'Could not send message. Please try again later or contact us directly.');
        }
    }
}
