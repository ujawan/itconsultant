<?php

namespace App\Controllers;

class Contact extends BaseMailer
{
    public function send()
    {
        try {
            // Get form data
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $subject = $this->request->getPost('subject');
            $message = $this->request->getPost('message');

            // Debug log
            log_message('debug', '--------- Contact Form Submission Start ---------');
            log_message('debug', 'Form data received:');
            log_message('debug', 'Name: ' . ($name ?? 'not set'));
            log_message('debug', 'Email: ' . ($email ?? 'not set'));
            log_message('debug', 'Subject: ' . ($subject ?? 'not set'));
            log_message('debug', 'Message: ' . ($message ?? 'not set'));

            // Validate required fields
            if (empty($name) || empty($email) || empty($subject) || empty($message)) {
                log_message('error', 'Form validation failed - Empty fields');
                return redirect()->back()->with('error', 'All fields are required');
            }

            // Validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                log_message('error', 'Form validation failed - Invalid email: ' . $email);
                return redirect()->back()->with('error', 'Invalid email format');
            }

            // Prepare email content
            $emailSubject = 'New Contact Message from ' . $name;
            $body = "
                <h2>New Contact Message</h2>
                <p><strong>Name:</strong> {$name}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Subject:</strong> {$subject}</p>
                <p><strong>Message:</strong></p>
                <p>{$message}</p>
            ";

            // Send email
            $this->sendEmail($emailSubject, $body, $email, $name);

            log_message('debug', 'Email content prepared');

            
            // Success response
            log_message('debug', '--------- Contact Form Submission End: Success ---------');
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (Exception $e) {
            // Log the full error
            log_message('error', '--------- Contact Form Submission End: Error ---------');
            log_message('error', 'Exception message: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());
            
            // Return user-friendly error
            return redirect()->back()->with('error', 'Could not send message. Please try again later or contact us directly.');
        }
    }
}
