<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Forums;

class ForumsTest extends TestCase
{
    public function test_set_title_attribute_formats_title_correctly()
    {
        $forum = new Forums();

        $forum->title = "   laravel est génial   ";

        $this->assertEquals("Laravel Est Génial", $forum->title);
    }

    public function test_set_description_attribute_trims_and_limits_length()
    {
        $forum = new Forums();

        $longDescription = str_repeat("a", 600); // 600 caractères
        $forum->description = "   $longDescription   ";

        $this->assertEquals(500, strlen($forum->description));
        $this->assertEquals(str_repeat("a", 500), $forum->description);
    }
}
