<?php
/**
 * Jaeger
 *
 * @copyright	Copyright (c) 2015-2016, mithra62
 * @link		http://jaeger-app.com
 * @version		1.0
 * @filesource 	./Platforms/AbstractPlatform.php
 */
namespace JaegerApp\Platforms;

/**
 * Jaeger - Platform Abstract
 *
 * Defines the methods each platform must implement to communicate between themselves
 *
 * @package Platforms
 * @author Eric Lamb <eric@mithra62.com>
 */
abstract class AbstractPlatform
{

    /**
     * The base email configuration prototype
     * 
     * @var array
     */
    private $email_config = array(
        'from_email' => '',
        'sender_name' => '',
        'type' => 'smtp', // choose between `php` and `smtp`
        'smtp_options' => array( // if `smtp` chosen above, this must be completed and accurate
            'host' => '',
            'connection_config' => array(
                'username' => '',
                'password' => ''
            ),
            'port' => ''
        )
    );
    
    /**
     * The settings table name
     * @var string
     */
    protected $settings_table = '';

    /**
     * Returns an array of details about interacting with the database
     */
    abstract public function getDbCredentials();

    /**
     * Returns an array of email connection details
     * 
     * @param array $details            
     */
    abstract public function getEmailConfig();

    /**
     * Returns the Current URL for the given request
     */
    abstract public function getCurrentUrl();

    /**
     * Returns the site name
     */
    abstract public function getSiteName();

    /**
     * Returns the user's timezone
     */
    abstract public function getTimezone();

    /**
     * Returns the site URL
     */
    abstract public function getSiteUrl();

    /**
     * Returns the encryption key to use for salting the encrypted data
     */
    abstract public function getEncryptionKey();

    /**
     * Returns an array of the configuration overrides to use (if any)
     */
    abstract public function getConfigOverrides();

    /**
     * Platform based abstraction to redirect a user's browser session to a given $url
     * 
     * @param string $url            
     */
    abstract public function redirect($url);

    /**
     * Platform based abstraction to handle HTTP get/post request variables
     * 
     * @param string $key            
     * @param string $default            
     * @return mixed
     */
    public function getPost($key, $default = false)
    {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        } elseif (isset($_GET[$key])) {
            return $_GET[$key];
        }
        
        return $default;
    }
    
    /**
     * Set the settings table
     * @param string $table
     * @return \JaegerApp\Platforms\AbstractPlatform
     */
    public function setSettingsTable($table)
    {
        $this->settings_table = $table;
        return $this;
    }
    
    /**
     * Returns the settings table
     * @return string
     */
    public function getSettingsTable()
    {
        return $this->settings_table;
    }
}