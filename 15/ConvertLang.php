<?php

class ConvertLang
{
    private $totalLang;

    /**
     * 言語の配列を受け取りセッターとして代入
     *
     * @param array $tl
     */
    public function __construct(array $tl)
    {
        $this->totalLang = $tl;
    }

    /**
     * 2文字の言語記号(ja)によって各国の挨拶に変換
     *
     * @param string|null $lang
     * @return string|null
     */
    public function getTotalLang(?string $lang): ?string
    {
        if (empty($lang)) return null;
        for ($i = 0; $i < count($this->totalLang); $i++) {
            if ($lang === $this->totalLang[$i]['nation']) {
                return $this->totalLang[$i]['greeting'];
            }
        }
    }
}
