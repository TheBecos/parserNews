DROP DATABASE IF EXISTS parser;

CREATE DATABASE parser
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

--
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

--
-- Установка базы данных по умолчанию
--
USE parser;

--
-- Удалить таблицу `admin`
--
DROP TABLE IF EXISTS admin;

--
-- Удалить таблицу `news`
--
DROP TABLE IF EXISTS news;

--
-- Удалить таблицу `sources`
--
DROP TABLE IF EXISTS sources;

--
-- Установка базы данных по умолчанию
--
USE parser;

--
-- Создать таблицу `sources`
--
CREATE TABLE sources
(
    source_id   int(11)      NOT NULL AUTO_INCREMENT,
    name        varchar(50) DEFAULT NULL,
    address     varchar(255) NOT NULL,
    parser_code longtext    DEFAULT NULL,
    PRIMARY KEY (source_id)
)
    ENGINE = INNODB,
    CHARACTER SET utf8,
    COLLATE utf8_unicode_ci;

--
-- Создать таблицу `news`
--
CREATE TABLE news
(
    news_id          int(11)      NOT NULL AUTO_INCREMENT,
    source_id        int(11)               DEFAULT NULL,
    url              varchar(300) NOT NULL,
    title            varchar(200) NOT NULL,
    description      text         NOT NULL,
    tag              varchar(50)           DEFAULT NULL,
    image            longtext     NOT NULL,
    date_publication date         NOT NULL,
    date_insert      timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (news_id)
)
    ENGINE = INNODB,
    CHARACTER SET utf8,
    COLLATE utf8_unicode_ci;

--
-- Создать индекс `UK_news` для объекта типа таблица `news`
--
ALTER TABLE news
    ADD UNIQUE INDEX UK_news (source_id, url);

--
-- Создать внешний ключ
--
ALTER TABLE news
    ADD CONSTRAINT FK_news_source_id FOREIGN KEY (source_id)
        REFERENCES sources (source_id) ON DELETE NO ACTION;

--
-- Создать таблицу `admin`
--
CREATE TABLE admin
(
    login    varchar(100) NOT NULL,
    password varchar(100) NOT NULL,
    PRIMARY KEY (login)
)
    ENGINE = INNODB,
    CHARACTER SET utf8,
    COLLATE utf8_unicode_ci;


--
-- Начальные данные
--

INSERT INTO admin
( login
, password)
VALUES ( 'admin' -- login - VARCHAR(100) NOT NULL
       , '$2y$10$Aw2Qc/IukZXz6cjWDNRm9OMwb6KDsaKf.ofktDoGg1oI90gCCO3c6' -- password - VARCHAR(100) NOT NULL
       ),
       ( 'sapegin' -- login - VARCHAR(100) NOT NULL
       , '$2y$10$V0bn5HGYI40rLnfyriIQBetTQYCXHEcrbyXXkpv3Z7dhaFejMrAae' -- password - VARCHAR(100) NOT NULL
       );

INSERT INTO sources
( name
, address
, parser_code)
VALUES ( 'РБК - IT' -- name - VARCHAR(50)
       , 'https://www.rbc.ru/tags/?tag=IT' -- address - VARCHAR(255) NOT NULL
       , 'JGRvYyA9IHBocFF1ZXJ5OjpuZXdEb2N1bWVudCgkaHRtbCk7DQoNCiRuZXdzSXRlbXMgPSAkZG9jLT5maW5kKCcuanMtc2VhcmNoLWNvbnRhaW5lciAuc2VhcmNoLWl0ZW0gLnNlYXJjaC1pdGVtX193cmFwJyk7DQoNCiRuZXdzID0gYXJyYXkoKTsNCmZvcmVhY2ggKCRuZXdzSXRlbXMgYXMgJG5ld3NJdGVtKSB7DQogICAgJG5ld3NFbGVtID0gcHEoJG5ld3NJdGVtKS0+ZmluZCgnLnNlYXJjaC1pdGVtX19saW5rJyk7DQogICAgJGluZm8gPSBwcSgkbmV3c0l0ZW0pLT5maW5kKCcuc2VhcmNoLWl0ZW1fX2NhdGVnb3J5Jyk7DQoNCiAgICBpZiAoIWVtcHR5KCRpbmZvKSAmJiAhZW1wdHkoJG5ld3NFbGVtKSkgew0KICAgICAgICAkaW5mbyA9IGV4cGxvZGUoJywnLCAkaW5mbyk7DQogICAgICAgICR0YWcgPSAkaW5mb1sxXTsNCg0KICAgICAgICAkbW9udGhzID0gWw0KICAgICAgICAgICAgJ9GP0L3QsicgPT4gJzAxJywNCiAgICAgICAgICAgICfRhNC10LInID0+ICcwMicsDQogICAgICAgICAgICAn0LzQsNGAJyA9PiAnMDMnLA0KICAgICAgICAgICAgJ9Cw0L/RgCcgPT4gJzA0JywNCiAgICAgICAgICAgICfQvNCw0Y8nID0+ICcwNScsDQogICAgICAgICAgICAn0LjRjtC9JyA9PiAnMDYnLA0KICAgICAgICAgICAgJ9C40Y7QuycgPT4gJzA3JywNCiAgICAgICAgICAgICfQsNCy0LMnID0+ICcwOCcsDQogICAgICAgICAgICAn0YHQtdC9JyA9PiAnMDknLA0KICAgICAgICAgICAgJ9C+0LrRgicgPT4gJzEwJywNCiAgICAgICAgICAgICfQvdC+0Y8nID0+ICcxMScsDQogICAgICAgICAgICAn0LTQtdC6JyA9PiAnMTInLA0KICAgICAgICBdOw0KDQogICAgICAgICRkYXRlID0gZXhwbG9kZSgnICcsIHRyaW0oJGluZm9bMl0pKTsNCiAgICAgICAgJGRhdGUgPSAkZGF0ZVswXSAuICcuJyAuICRtb250aHNbJGRhdGVbMV1dIC4gJy4nIC4gKGlzc2V0KCRkYXRlWzJdKSA/ICRkYXRlWzJdIDogZGF0ZSgnWScpKTsNCiAgICAgICAgJGRhdGUgPSBkYXRlKCdZLW0tZCcsIHN0cnRvdGltZSgkZGF0ZSkpOw0KDQogICAgICAgICRsaW5rID0gJG5ld3NFbGVtLT5hdHRyKCdocmVmJyk7DQogICAgICAgICR0aXRsZSA9ICRuZXdzRWxlbS0+ZmluZCgnLnNlYXJjaC1pdGVtX190aXRsZScpLT50ZXh0KCk7DQogICAgICAgICRpbWcgPSAkbmV3c0VsZW0tPmZpbmQoJy5zZWFyY2gtaXRlbV9faW1hZ2UnKTsNCiAgICAgICAgJGRlc2NyaXB0aW9uID0gJG5ld3NFbGVtLT5maW5kKCcuc2VhcmNoLWl0ZW1fX3RleHQnKS0+dGV4dCgpOw0KCQkNCiAgICAgICAgYXJyYXlfcHVzaCgkbmV3cywgYXJyYXkoDQogICAgICAgICAgICAndGl0bGUnID0+IHRyaW0oJHRpdGxlKSwNCiAgICAgICAgICAgICd1cmwnICAgPT4gJGxpbmssDQogICAgICAgICAgICAnaW1hZ2UnID0+IGJhc2U2NF9lbmNvZGUoJGltZyksDQogICAgICAgICAgICAndGFnJyAgID0+ICR0YWcsDQoJCQknZGVzY3JpcHRpb24nID0+IHRyaW0oJGRlc2NyaXB0aW9uKSwNCiAgICAgICAgICAgICdkYXRlJyAgPT4gJGRhdGUNCiAgICAgICAgKSk7DQogICAgfQ0KfQ0KDQpyZXR1cm4gJG5ld3M7' -- parser_code - LONGTEXT
       ),
       ( 'ItProger' -- name - VARCHAR(50)
       , 'https://itproger.com/news/' -- address - VARCHAR(255) NOT NULL
       , 'JHVybCA9IHN0cl9yZXBsYWNlKCduZXdzLycsICcnLCAkdXJsKTsNCiRkb2MgPSBwaHBRdWVyeTo6bmV3RG9jdW1lbnQoJGh0bWwpOw0KDQokbmV3c0l0ZW1zID0gJGRvYy0+ZmluZCgnLmFsbEFydGljbGVzIC5hcnRpY2xlJyk7DQokbmV3cyA9IGFycmF5KCk7DQpmb3JlYWNoICgkbmV3c0l0ZW1zIGFzICRuZXdzSXRlbSkgew0KICAgICRtb250aHMgPSBbDQogICAgICAgICfRj9C90LLQsNGA0Y8nICAgPT4gJzAxJywNCiAgICAgICAgJ9GE0LXQstGA0LDQu9GPJyAgPT4gJzAyJywNCiAgICAgICAgJ9C80LDRgNGC0LAnICAgID0+ICcwMycsDQogICAgICAgICfQsNC/0YDQtdC70Y8nICAgPT4gJzA0JywNCiAgICAgICAgJ9C80LDRjycgICAgICA9PiAnMDUnLA0KICAgICAgICAn0LjRjtC90Y8nICAgICA9PiAnMDYnLA0KICAgICAgICAn0LjRjtC70Y8nICAgICA9PiAnMDcnLA0KICAgICAgICAn0LDQstCz0YPRgdGC0LAnICA9PiAnMDgnLA0KICAgICAgICAn0YHQtdC90YLRj9Cx0YDRjycgPT4gJzA5JywNCiAgICAgICAgJ9C+0LrRgtGP0LHRgNGPJyAgPT4gJzEwJywNCiAgICAgICAgJ9C90L7Rj9Cx0YDRjycgICA9PiAnMTEnLA0KICAgICAgICAn0LTQtdC60LDQsdGA0Y8nICA9PiAnMTInLA0KICAgIF07DQoNCiAgICAkZGF0ZSA9IHBxKCRuZXdzSXRlbSktPmZpbmQoJy50aW1lJyktPnRleHQoKTsNCiAgICAkZGF0ZSA9IGV4cGxvZGUoJyDQsiAnLCAkZGF0ZSk7DQogICAgJGRhdGUgPSBleHBsb2RlKCcgJywgdHJpbSgkZGF0ZVswXSkpOw0KICAgICRkYXRlID0gJGRhdGVbMF0gLiAnLicgLiAkbW9udGhzWyRkYXRlWzFdXSAuICcuJyAuIChpc3NldCgkZGF0ZVsyXSkgPyAkZGF0ZVsyXSA6IGRhdGUoJ1knKSk7DQogICAgJGRhdGUgPSBkYXRlKCdZLW0tZCcsIHN0cnRvdGltZSgkZGF0ZSkpOw0KDQogICAgJGxpbmtfYmxvY2sgPSBwcSgkbmV3c0l0ZW0pLT5maW5kKCdhJyk7DQoNCiAgICAkbGluayA9ICRsaW5rX2Jsb2NrLT5hdHRyKCdocmVmJyk7DQogICAgJHRpdGxlID0gJGxpbmtfYmxvY2stPmZpbmQoJ3NwYW4nKS0+dGV4dCgpOw0KDQogICAgJGltZyA9ICRsaW5rX2Jsb2NrLT5maW5kKCdpbWcnKTsNCiAgICAkaW1nX3NyYyA9ICRpbWctPmF0dHIoJ3NyYycpOw0KDQogICAgJG5ld19ibG9jayA9IHBxKCRuZXdzSXRlbSktPmZpbmQoJ2EnKS0+cmVtb3ZlKCk7DQogICAgJG5ld19ibG9jayA9IHBxKCRuZXdzSXRlbSktPmZpbmQoJ2RpdicpLT5yZW1vdmUoKTsNCg0KICAgICRkZXNjcmlwdGlvbiA9IHBxKCRuZXdzSXRlbSktPmZpbmQoJ3NwYW4nKS0+dGV4dCgpOw0KDQogICAgaWYgKHN0cnBvcygkbGluaywgJHVybCkgPT09IGZhbHNlKSB7DQogICAgICAgICRsaW5rID0gJHVybCAuICRsaW5rOw0KICAgIH0NCg0KICAgIGlmIChzdHJwb3MoJGltZ19zcmMsICR1cmwpID09PSBmYWxzZSkgew0KICAgICAgICAkaW1nID0gc3RyX3JlcGxhY2UoJGltZ19zcmMsICR1cmwgLiAkaW1nX3NyYywgJGltZyk7DQogICAgfQ0KDQogICAgYXJyYXlfcHVzaCgkbmV3cywgYXJyYXkoDQogICAgICAgICd0aXRsZScgICAgICAgPT4gJHRpdGxlLA0KICAgICAgICAndXJsJyAgICAgICAgID0+ICRsaW5rLA0KICAgICAgICAnaW1hZ2UnICAgICAgID0+IGJhc2U2NF9lbmNvZGUoJGltZyksDQogICAgICAgICd0YWcnICAgICAgICAgPT4gJycsDQogICAgICAgICdkZXNjcmlwdGlvbicgPT4gJGRlc2NyaXB0aW9uLA0KICAgICAgICAnZGF0ZScgICAgICAgID0+ICRkYXRlDQogICAgKSk7DQp9DQoNCnJldHVybiAkbmV3czs=');