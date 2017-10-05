<?php

use PHPUnit\Framework\TestCase;

require ('../CMS/CMSLogInFunctions.php');

class StackTest extends TestCase
{
    const USERNAME = 'Greengrocer';
    const PASSWORD = 'apples';

    /**
     * Correctly formatted array (correct password)
     */
    public function testShaveCredentialsBeenEntered()
    {
        $creds = ['username' => $this::USERNAME, 'password' => $this::PASSWORD];
        $actual = haveCredentialsBeenEntered($creds);
        $this -> assertTrue($actual);
    }

    /**
     * Correctly formatted array (incorrect password)
     */
    public function testS2haveCredentialsBeenEntered()
    {
        $creds = ['username' => 'Redgrocer', 'password' => 'pears'];
        $actual = haveCredentialsBeenEntered($creds);
        $this -> assertTrue($actual);
    }

    /**
     * Incorrectly formatted array (index array)
     */
    public function testS3haveCredentialsBeenEntered()
    {
        $creds = [2, 4, 5];
        $actual = haveCredentialsBeenEntered($creds);
        $this -> assertFalse($actual);
    }

    /**
     * Incorrectly formatted array (wrong keys)
     */
    public function testS4haveCredentialsBeenEntered()
    {
        $creds = ['lemons' => 4, 'strawberries' => 5];
        $actual = haveCredentialsBeenEntered($creds);
        $this -> assertFalse($actual);
    }

    /**
     * Correctly formatted array with extra entry
     */
    public function testFhaveCredentialsBeenEntered()
    {
        $creds= ['username' => 'red', 'lemons' => 5, 'password' => 3423];
        $actual = haveCredentialsBeenEntered($creds);
        $this -> assertTrue($actual);
    }

    /**
     * Given the function a string rather than an array
     */
    public function testMhaveCredentialsBeenEntered()
    {
        $this -> expectException(TypeError::class);
        haveCredentialsBeenEntered('someRandomString');
    }

    /**
     * Does it accept the correct username?
     */
    public function testSisUsernameValid()
    {
        $actual = isUsernameValid($this::USERNAME);
        $this -> assertTrue($actual);
    }

}