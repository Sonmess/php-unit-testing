<?php

namespace App;

class Article {
    private $title = '';
    private $slug = '';

    public function getTitle()
    {
        return $this->title;
    }

    public function getSlug()
    {
        $slug = $this->title;
        $slug = preg_replace('/\s+/', '_', $slug);
        $slug = preg_replace('/[^\w]+/', '', $slug);
        $slug = trim($slug, '_');
        return $slug;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
}

?>