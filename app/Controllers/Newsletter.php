<?php

namespace App\Controllers;

class Newsletter extends BaseMailer
{
    public function subscribe()
    {
        try {
            // Get form data
            $email = $this->request->getPost('email');

            // Debug log
            log_message('debug', '--------- Newsletter Subscription Start ---------');
            log_message('debug', 'Email: ' . ($email ?? 'not set'));

            // Validate email
            if (empty($email)) {
                log_message('error', 'Form validation failed - Empty email');
                return redirect()->back()->with('newsletter_error', 'Email is required');
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                log_message('error', 'Form validation failed - Invalid email: ' . $email);
                return redirect()->back()->with('newsletter_error', 'Invalid email format');
            }

            // Prepare email content
            $subject = 'New Newsletter Subscription';
            $body = "
                <h2>New Newsletter Subscription</h2>
                <p><strong>Email:</strong> {$email}</p>
                <p>This user has subscribed to your newsletter.</p>
            ";

            // Send email
            $this->sendEmail($subject, $body, $email);
            log_message('info', 'Email sent successfully to: ujawan42@gmail.com');
            
            // Success response
            log_message('debug', '--------- Newsletter Subscription End: Success ---------');
            return redirect()->back()->with('newsletter_success', 'Thank you for subscribing to our newsletter!');
        } catch (Exception $e) {
            // Log the full error
            log_message('error', '--------- Newsletter Subscription End: Error ---------');
            log_message('error', 'Exception message: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());
            
            // Return user-friendly error
            return redirect()->back()->with('newsletter_error', 'Could not subscribe. Please try again later.');
        }
    }
}
