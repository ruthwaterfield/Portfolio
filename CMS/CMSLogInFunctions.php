<?php

/**
 * haveCredentialsBeenEntered checks to see if the username and password have been entered
 *
 * @return bool Returns true if both values are present
 */
function haveCredentialsBeenEntered(array $credentialsArray) : bool {
    $result = false;
    if(array_key_exists('username', $credentialsArray)) {
        if (array_key_exists('password', $credentialsArray)) {
            $result = true;
        }
    }
    return $result;
}

/**
 * isUsernameValid checks whether the username that has been entered is a valid username
 *
 * @param string $username The string that has been entered.
 *
 * @return bool Is the username valid?
 */
function isUsernameValid(string $enteredUsername) : bool {
    $result = false;
    if($enteredUsername === 'Greengrocer') {
        $result = true;
    }
    return $result;
}

/**
 * areCredentialsCorrect checks if a username password combination is valid
 *
 * @param string $username
 * @param string $password
 *
 * @return bool Should the credentials be validated
 */
function areCredentialsCorrect(string $enteredUsername, string $enteredPassword) : bool {
    $result = false;
    if($enteredUsername === 'Greengrocer' && $enteredPassword === 'apples') {
        $result = true;
    }
    return $result;
}

/**
 * isLoggedIn checks the credentials to see whether the user should be approved
 *
 * @param string $credentialsArray The array containing the credentials
 *
 * @return bool Is the user approved?
 */
function isApproved(array $credentialsArray) : bool {
    $result = false;
    if(haveCredentialsBeenEntered($credentialsArray)) {
        $enteredUsername = $credentialsArray['username'];
        $enteredPassword = $credentialsArray['password'];
        if (isUsernameValid($enteredUsername)) {
            if (areCredentialsCorrect($enteredUsername, $enteredPassword)) {
                $result=true;
            }
        }
    }
    return $result;
}


?>
