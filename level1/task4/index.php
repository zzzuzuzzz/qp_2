<?php

class Article
{
    public function __construct(
        public string $title,
        public string $content,
        public ?int $age,
        public bool $img = false,
    ) {
    }
}

class CensorService
{
    public function censor(string $text): string
    {
        $result = str_replace('Нецензурное слово', '', $text);
        return $result;
    }
}

class Publisher
{
    public function __construct(
        private CensorService $censor
    ) {
    }

    private function send(string $title, string $content, string $channel): void
    {
        echo 'Статья: ' . $title . ' была опубликована в ' . $channel . '. ' . $content . '"; <br>';
    }

    public function publishe(Article $article): void
    {
        $title = $article->title;
        $content = $article->content;

        if ($article->age !== null && $article->age < 18) {
            $title = $this->censor->censor($article->title);
            $content = $this->censor->censor($article->content);
        }
        if ($article->img) {
            $this->send($title, $content, 'instagram');
        }
        $this->send($title, $content, 'интернет блог');
    }
}

$publish = new Publisher(new CensorService());

$article_1 = new Article('Статья № 1', 'Статья о жизни райских птиц', null, true);
$article_2 = new Article('Статья о творчестве Пушкина', 'Сказки Пушкина в современной интерпретации Нецензурное слово - издание 2', 12);
$article_3 = new Article('Статья для любителей автомобилей Нецензурное слово - история завода "Лада"', 'Статья на тему развития автотранспорта в России', null);

$publish->publishe($article_1);
$publish->publishe($article_2);
$publish->publishe($article_3);
