<?php

use PHPUnit\Framework\TestCase;

require("../CMS/CMSPageContentFunctions.php");

class StackTest extends TestCase
{
    /**
     * testScontentHasImage tests that when both label and url are filled in, the function determines there is a valid image.
     */
    public function testScontentHasImage()
    {
        $imageLabel = 'someText';
        $imageUrl = 'someOtherText';
        $expected = 1;
        $actual = contentHasImage($imageLabel, $imageUrl);
        $this->assertEquals($expected, $actual);
    }

    /**
     * testS2contentHasImage tests that when only label is filled in, the function determines there is not a valid image.
     */
    public function testS2contentHasImage()
    {
        $imageLabel = 'someText';
        $imageUrl = '';
        $expected = 0;
        $actual = contentHasImage($imageLabel, $imageUrl);
        $this->assertEquals($expected, $actual);
    }

    /**
     * testS3contentHasImage tests that when only url is filled in, the function determines there is not a valid image.
     */
    public function testS3contentHasImage()
    {
        $imageLabel = '';
        $imageUrl = 'someOtherText';
        $expected = 0;
        $actual = contentHasImage($imageLabel, $imageUrl);
        $this->assertEquals($expected, $actual);
    }

    /**
     * testS4contentHasImage tests that when image label or url are filled with empty strings, the function determines there not a valid image.
     */
    public function testS4contentHasImage()
    {
        $imageLabel = '';
        $imageUrl = '';
        $expected = 0;
        $actual = contentHasImage($imageLabel, $imageUrl);
        $this->assertEquals($expected, $actual);
    }

    /**
     * testS5contentHasImage tests that when only label is filled in, the function determines there is not a valid image.
     */
    public function testS5contentHasImage()
    {
        $imageLabel = 'someText';
        $imageUrl = NULL;
        $expected = 0;
        $actual = contentHasImage($imageLabel, $imageUrl);
        $this->assertEquals($expected, $actual);
    }

    /**
     * testS6contentHasImage tests that when only url is filled in, the function determines there is not a valid image.
     */
    public function testS6ontentHasImage()
    {
        $imageLabel = NULL;
        $imageUrl = 'someText';
        $expected = 0;
        $actual = contentHasImage($imageLabel, $imageUrl);
        $this->assertEquals($expected, $actual);
    }

    /**
     * testS7contentHasImage tests that when neither image label or url is filled in, the function determines there is not a valid image.
     */
    public function testS7contentHasImage()
    {
        $imageLabel = NULL;
        $imageUrl = NULL;
        $expected = 0;
        $actual = contentHasImage($imageLabel, $imageUrl);
        $this->assertEquals($expected, $actual);
    }

    /**
     * testFcontentHasImage tests that when the function is passed arrays, it is not deemed that the content has an image.
     */
    public function testFcontentHasImage()
    {
        $imageLabel = ['lemon', 'apple'];
        $imageUrl = [];
        $expected = 0;
        $actual = contentHasImage($imageLabel, $imageUrl);
        $this->assertEquals($expected, $actual);
    }

}