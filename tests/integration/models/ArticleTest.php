<?php

use Tests\TestCase;
use \Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleTest extends TestCase
{
    use DatabaseTransactions;
    /** @test */
    function it_fetches_trending_articles()
    {
        factory(Article::Class,2)->create();
        factory(Article::class)->create(['reads'=>10]);
        $mostPopular=factory(Article::class)->create(['reads'=>20]);

        $articles=Article::trending();

        $this->assertEquals($mostPopular->id,$articles->first()->id);
        $this->assertCount(3,$articles);
    }
}
