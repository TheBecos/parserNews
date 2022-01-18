<?php

class Source
{
    private $name;
    private $url;
    private $code;

    public function __construct(string $name, string $url, string $code)
    {
        $this->name = $name;
        $this->url = $url;
        $this->code = $code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setTitle(string $name)
    {
        $this->name = $name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
    }

}
