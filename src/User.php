<?php

/**
 * User
 *
 * A user of the system
 */
class User
{

    /**
     * First name
     * @var string
     */
    public $first_name;
    
    /**
     * Last name
     * @var string
     */
    public $surname;

    /**
     * Email address
     * @var string
     */
    public $email;

    /**
     * Mailer object
     * 
     * @var Mailer;
     */
    protected $mailer;

    /**
     * Sets mailer object
     * 
     * @param Mailer
     */
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Get the user's full name from their first name and surname
     *
     * @return string The user's full name
     */
    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }

    /**
     * Send the user a Message
     * 
     * @param string $message The message
     * 
     * @return boolean true if send, false otherwise
     */
    public function notify($message)
    {

        return $this->mailer->sendMessage($this->email, 'hello');
    }
}