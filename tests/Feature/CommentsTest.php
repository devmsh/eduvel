<?php

namespace Tests\Feature;

use App\CourseComment;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentsTest extends TestCase
{
    use DatabaseMigrations;

    public function test_can_get_comments()
    {
        factory(CourseComment::class, 10)->create();

        $this->actingAs($this->createTeacher());

        $response = $this->get('dashboard/comments');

        $response->assertSuccessful();
        $response->assertViewHas('comments',function($comments){
            $this->assertCount(10,$comments);
            return true;
        });
    }

    public function test_can_read_comments()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $comment = factory(CourseComment::class)->create();

        $this->actingAs($this->createTeacher());

        $this->assertEquals(0,$comment->dane_read);

        $response = $this->post("dashboard/comments/{$comment->id}/read");

        $response->assertRedirect();
        $this->assertEquals(1,$comment->fresh()->dane_read);
    }
}
