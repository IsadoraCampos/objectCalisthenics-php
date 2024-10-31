<?php

namespace Alura\Calisthenics\Tests\Unit\Domain\Video;

use Alura\Calisthenics\Domain\Video\Video;
use PHPUnit\Framework\TestCase;

class VideoTest extends TestCase
{
    public function testMakingAVideoPublicMustWork()
    {
        $video = new Video();
        $video->publish();

        self::assertTrue($video->isPublic());
    }

    public function testMakingAVideoPrivateMustWork() {
        $video = new Video();
        $video->publish();

        $video->unpublish();

        self::assertEquals($video->isPublic(), false);
    }
}
