<?php

class NewsGateway
{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function viewNews()
    {
        $news = [];
        try {

            $query = 'Select * FROM News';
            $this->con->executeQuery($query, array());
            $res = $this->con->getResults();
            foreach ($res as $line) {
                $news[] = new News($line['url'], $line['title'], $line['description'], $line['category'], $line['date'], $line['note']);
            }
            return $news;
        }
        catch (PDOException $e) {
            $this->myError($e);
        }
    }

    public function addNew(News $news)
    {
        try {
            $query = "INSERT INTO News(source_id, url, title, description, tag, image, date_publication) VALUES (:source,:url,:title,:description,:tag,:image,:date)";
            $this->con->executeQuery($query, array(
                ':source'      => array($news->getSource(), PDO::PARAM_STR),
                ':url'         => array($news->getUrl(), PDO::PARAM_STR),
                ':title'       => array($news->getTitle(), PDO::PARAM_STR),
                ':description' => array($news->getDescription(), PDO::PARAM_STR),
                ':tag'         => array($news->getTag(), PDO::PARAM_STR),
                ':date'        => array($news->getDate(), PDO::PARAM_STR),
                ':image'       => array($news->getImage(), PDO::PARAM_STR),
            ));
        }
        catch (PDOException $e) {
            //$this->myError($e);
        }

    }

    public function viewNewsPerPage($debut, $nbNewsPerPage)
    {
        try {
            $query = "SELECT * FROM news ORDER BY date_publication DESC, title LIMIT $debut, $nbNewsPerPage";
            $this->con->executeQuery($query, array());
            $res = $this->con->getResults();
            $news = null;
            foreach ($res as $line) {
                $news[] = new News($line['source_id'], $line['url'], $line['title'], $line['description'], $line['tag'], $line['image'], $line['date_publication']);
            }
            return $news;
        }
        catch (PDOException $e) {
            $this->myError($e);
        }
    }

    public function nbNewsPerPage(int $page, int $nbDeNewsPerPage)
    {
        return ($page - 1) * $nbDeNewsPerPage;
    }

    public function countNews()
    {
        try {
            $query = 'SELECT COUNT(*) FROM news';
            $this->con->executeQuery($query, array());
            $res = $this->con->getResults();
            foreach ($res as $line) {
                $countNews = $line[0];
            }
            return $countNews;
        }
        catch (PDOException $e) {
            $this->myError($e);
        }
    }

    pubLic function deleteAllNews()
    {
        try {
            $query = "DELETE FROM news";
            $this->con->executeQuery($query);
        }
        catch (PDOException $e) {
            $this->myError($e);
        }
    }

    private function myError(PDOException $e)
    {
        $dVueEreur[] = $e->getMessage();
        throw new Exception("DataBase error: " . $e->getMessage());
    }
}
