<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    protected function setUp(): void
    {
        $this->article = new App\Article();
    }

    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->getTitle());
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertEquals($this->article->getSlug(), '');
        $this->assertSame($this->article->getSlug(), '');
    }

    public function testSlugHasSpacesReplacedByUnderscores()
    {
        $this->article->setTitle('An example article title');
        $this->assertSame($this->article->getSlug(), 'An_example_article_title');
    }

    public function testSlugHasMoreWhitespaces()
    {
        $this->article->setTitle("An   example  \n  article");
        $this->assertEquals($this->article->getSlug(), 'An_example_article');
    }

    public function testSlugDoesNotStartOrEndWithAnUnderscore()
    {
        $this->article->setTitle(' An example article ');
        $this->assertEquals($this->article->getSlug(), 'An_example_article');
    }

    public function testSlugDoesNotHaveAnyNonWordCharacters()
    {
        $this->article->setTitle('Read! This! Now!');
        $this->assertEquals($this->article->getSlug(), 'Read_This_Now');
    }

    public function titleProvider()
    {
        return [
            'Slug has non word characters' => ['Read! This! Now!', 'Read_This_Now',],
            'Slug has whitespaces at start and at end' => [' An example article ', 'An_example_article']
        ];
    }

    /**
     * @dataProvider titleProvider
     */
    public function testSlug($title, $slug)
    {
        $this->article->setTitle($title);
        $this->assertEquals($this->article->getSlug(), $slug);
    }
}

?>