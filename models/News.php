<?php

class News
{
    private $source_id;
    private $title;
    private $description;
    private $tag;
    private $image;
    private $url;
    private $date;

    public function __construct(int $source_id, string $url, string $title, string $description, string $tag, string $image, string $date)
    {
        $this->source_id = $source_id;
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

    public function getSource(): int
    {
        return $this->source_id;
    }

    public function setSource(int $source_id)
    {
        $this->source_id = $source_id;
    }

    public function getSourceName(): string
    {
        global $database, $db_login, $db_password;
        $gw = new SourceGateway(new Connection($database, $db_login, $db_password));
        $source = $gw->editSource($this->source_id);
        return $source['name'];
    }

}
