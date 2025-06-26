<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Comments;

class CommentsTest extends TestCase
{
    public function test_comment_is_trimmed_and_truncated_to_250_characters()
    {
        $longText = str_repeat('a', 300); // 300 caractères
        $comment = new Comments();
        $comment->comment = "   $longText   ";

        $this->assertEquals(250, strlen($comment->comment));
    }

    public function test_comment_is_trimmed()
    {
        $comment = new Comments();
        $comment->comment = "   Bonjour le monde   ";

        $this->assertEquals('Bonjour le monde', $comment->comment);
    }
}
