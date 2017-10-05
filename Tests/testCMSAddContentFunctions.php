<?php

use PHPUnit\Framework\TestCase;

require ("../CMS/CMSPageContentFunctions.php");

class StackTest extends TestCase
{
    /**
     * testSimageShouldBeAdded tests that when both label and url are filled in, the function determines there is a valid image.
     */
    public function testSimageShouldBeAdded()
    {
        $imageLabel = 'someText';
        $imageUrl = 'someOtherText';
        $expected = 1;
        $actual = imageShouldBeAdded($imageLabel,$imageUrl);
        $this -> assertEquals($expected, $actual);
    }

    /**
     * testS2imageShouldBeAdded tests that when only label is filled in, the function determines there is not a valid image.
     */
    public function testS2imageShouldBeAdded()
    {
        $imageLabel = 'someText';
        $imageUrl = '';
        $expected = 0;
        $actual = imageShouldBeAdded($imageLabel,$imageUrl);
        $this -> assertEquals($expected, $actual);
    }

    /**
     * testS3imageShouldBeAdded tests that when only url is filled in, the function determines there is not a valid image.
     */
    public function testS3imageShouldBeAdded()
    {
        $imageLabel = '';
        $imageUrl = 'someText';
        $expected = 0;
        $actual = imageShouldBeAdded($imageLabel,$imageUrl);
        $this -> assertEquals($expected, $actual);
    }

    /**
     * testS4imageShouldBeAdded tests that when neither image label or url is filled in, the function determines there is not a valid image.
     */
    public function testS4imageShouldBeAdded()
    {
        $imageLabel = '';
        $imageUrl = '';
        $expected = 0;
        $actual = imageShouldBeAdded($imageLabel,$imageUrl);
        $this -> assertEquals($expected, $actual);
    }

    /**
     * testMimageShouldBeAdded tests that when variables other than strings are used, the function errors.
     */
    public function testMimageShouldBeAdded()
    {
        $imageLabel = 4;
        $imageUrl = [];
        $this -> expectException(TypeError::class);
        $actual = imageShouldBeAdded($imageLabel,$imageUrl);

    }


}