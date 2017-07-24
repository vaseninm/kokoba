<?php

namespace App\Services;

use App\Entities\Footballer;
use App\Entities\Name;
use Sunra\PhpSimple\HtmlDomParser;

/**
* 
*/
class ChampionatParser
{
    const PROFILE_URL = 'https://www.championat.com/football/_russiapl/%d/player/%d.html';
    
    protected $tournamentId = 2200; // РФПЛ 2017/18
    protected $playerId = null;

    private $el = null;

    function __construct(int $playerId)
    {
        $this->playerId = $playerId;
    }

    public function parse() : Footballer
    {
        $this->loadDom();
        $name = $this->getPlayerName();

        return new Footballer(
            new Name($name[2], $name[0], $name[1]),
            $this->getGoalsCount()
        );
    }

    protected function getPlayerName() : array
    {
        $goalEl = $this->el->find('.sport__info__name')[0];

        return explode(' ', trim($goalEl->text()));

    }

    protected function getGoalsCount() : int
    {
        $goalEl = $this->el->find('.sport__table')[1]->find('tr')[0]->find('td')[1];

        return (int) $goalEl->text();
    }

    protected function loadDom() : self {
        $url = sprintf(self::PROFILE_URL, $this->tournamentId, $this->playerId);
        $page = file_get_contents($url);
        $this->el = HtmlDomParser::str_get_html($page);

        return $this;
    }

}