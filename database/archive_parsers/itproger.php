<?php

$url = str_replace('news/', '', $url);
$doc = phpQuery::newDocument($html);

$newsItems = $doc->find('.allArticles .article');
$news = array();
foreach ($newsItems as $newsItem) {
    $months = [
        'января'   => '01',
        'февраля'  => '02',
        'марта'    => '03',
        'апреля'   => '04',
        'мая'      => '05',
        'июня'     => '06',
        'июля'     => '07',
        'августа'  => '08',
        'сентября' => '09',
        'октября'  => '10',
        'ноября'   => '11',
        'декабря'  => '12',
    ];

    $date = pq($newsItem)->find('.time')->text();
    $date = explode(' в ', $date);
    $date = explode(' ', trim($date[0]));
    $date = $date[0] . '.' . $months[$date[1]] . '.' . (isset($date[2]) ? $date[2] : date('Y'));
    $date = date('Y-m-d', strtotime($date));

    $link_block = pq($newsItem)->find('a');

    $link = $link_block->attr('href');
    $title = $link_block->find('span')->text();

    $img = $link_block->find('img');
    $img_src = $img->attr('src');

    $new_block = pq($newsItem)->find('a')->remove();
    $new_block = pq($newsItem)->find('div')->remove();

    $description = pq($newsItem)->find('span')->text();

    if (strpos($link, $url) === false) {
        $link = $url . $link;
    }

    if (strpos($img_src, $url) === false) {
        $img = str_replace($img_src, $url . $img_src, $img);
    }

    array_push($news, array(
        'title'       => $title,
        'url'         => $link,
        'image'       => base64_encode($img),
        'tag'         => '',
        'description' => $description,
        'date'        => $date
    ));
}

return $news;