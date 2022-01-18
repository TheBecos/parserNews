<?php

class News
{
    private $title;
    private $description;
    private $tag;
    private $image;
    private $url;
    private $date;

    public function __construct(string $url, string $title, string $description, string $tag, string $image, string $date)
    {
        $this->title = $title;
        $this->description = $description;
        $this->tag = $tag;
        $this->image = $image;
        $this->url = $url;
        $this->date = $date;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function setTag(string $tag)
    {
        $this->tag = $tag;
    }


    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

}
