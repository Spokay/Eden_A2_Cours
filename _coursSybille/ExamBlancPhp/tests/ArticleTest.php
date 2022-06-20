<?php

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\ArticleController;

class ArticleTest extends TestCase
{
    public function testArticleTitleLength(){
        //arrange
        $articles = ArticleController::getAll();

        // act
        foreach ($articles as $article){


            // assert
            $this->assertTrue(count($article->title) <= 50);
        }

    }
    public function testArticleTexteNotNull(){
        //arrange
        $articles = ArticleController::getAll();

        // act
        foreach ($articles as $article){


            // assert
            $this->assertNotNull($article->texte);
        }
    }
}
