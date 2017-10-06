<?php

/**
 * createPDO creates a PDO that connects to the database
 *
 * @return PDO the PDO to use
 */
function createPDO(): PDO
{
    $db = new PDO('mysql:host=127.0.0.1;dbname=WebsiteContentDb', 'root', '');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}