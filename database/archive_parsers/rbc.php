<?php
$doc = phpQuery::newDocument($html);

$newsItems = $doc->find('.js-search-container .search-item .search-item__wrap');

$news = array();
foreach ($newsItems as $newsItem) {
    $newsElem = pq($newsItem)->find('.search-item__link');
    $info = pq($newsItem)->find('.search-item__category');

    if (!empty($info) && !empty($newsElem)) {
        $info = explode(',', $info);
        $tag = $info[1];

        $months = [
            'янв' => '01',
            'фев' => '02',
            'мар' => '03',
            'апр' => '04',
            'мая' => '05',
            'июн' => '06',
            'июл' => '07',
            'авг' => '08',
            'сен' => '09',
            'окт' => '10',
            'ноя' => '11',
            'дек' => '12',
        ];

        $date = explode(' ', trim($info[2]));
        $date = $date[0] . '.' . $months[$date[1]] . '.' . (isset($date[2]) ? $date[2] : date('Y'));
        $date = date('Y-m-d', strtotime($date));

        $link = $newsElem->attr('href');
        $title = $newsElem->find('.search-item__title')->text();
        $img = $newsElem->find('.search-item__image');
        $description = $newsElem->find('.search-item__text')->text();

        array_push($news, array(
            'title' => trim($title),
            'url'   => $link,
            'image' => base64_encode($img),
            'tag'   => $tag,
            'description' => trim($description),
            'date'  => $date
        ));
    }
}

return $news;