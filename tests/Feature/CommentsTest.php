<?php

namespace Tests\Feature;

use App\CourseComment;
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
}
