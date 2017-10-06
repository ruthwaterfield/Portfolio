<?php

use PHPUnit\Framework\TestCase;

require("../CMS/CMSEditContentFunctions.php");

class StackTest extends TestCase
{
    /**
     * testSimageShouldBeIncluded tests that when both label and url are filled in, the function determines there is a valid image.
     */
    public function testSimageShouldBeIncluded()
    {
        $imageLabel = 'someText';
        $imageUrl = 'someOtherText';
        $expected = 1;
        $actual = imageShouldBeIncluded($imageLabel, $imageUrl);
        $this->assertEquals($expected, $actual);
    }

    /**
     * testS2imageShouldBeIncluded tests that when only label is filled in, the function determines there is not a valid image.
     */
    public function testS2imageShouldBeIncluded()
    {
        $imageLabel = 'someText';
        $imageUrl = '';
        $expected = 0;
        $actual = imageShouldBeIncluded($imageLabel, $imageUrl);
        $this->assertEquals($expected, $actual);
    }

    /**
     * testS3imageShouldBeIncluded tests that when only url is filled in, the function determines there is not a valid image.
     */
    public function testS3imageShouldBeIncluded()
    {
        $imageLabel = '';
        $imageUrl = 'someText';
        $expected = 0;
        $actual = imageShouldBeIncluded($imageLabel, $imageUrl);
        $this->assertEquals($expected, $actual);
    }

    /**
     * testS4imageShouldBeIncluded tests that when neither image label or url is filled in, the function determines there is not a valid image.
     */
    public function testS4imageShouldBeIncluded()
    {
        $imageLabel = '';
        $imageUrl = '';
        $expected = 0;
        $actual = imageShouldBeIncluded($imageLabel, $imageUrl);
        $this->assertEquals($expected, $actual);
    }

    /**
     * testMimageShouldBeIncluded tests that when variables other than strings are used, the function errors.
     */
    public function testMimageShouldBeIncluded()
    {
        $imageLabel = 4;
        $imageUrl = [];
        $this->expectException(TypeError::class);
        $actual = imageShouldBeIncluded($imageLabel, $imageUrl);

    }


}