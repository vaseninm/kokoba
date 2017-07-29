<?php

namespace App\Repositories;

use App\Entities\Footballer;
use App\Entities\Name;
use Sunra\PhpSimple\HtmlDomParser;

/**
* 
*/
class FootballerParser extends AbstractFootballerRepository
{
    const PROFILE_URL = 'https://www.championat.com/football/%s/%d/player/%d.html';

    private $tournamentsMapping = [
        2200 => '_russiapl',
        2220 => '_europeleague',
    ];
    private $el = null;

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
        $url = sprintf(self::PROFILE_URL, $this->tournamentsMapping[$this->tournamentId], $this->tournamentId, $this->playerId);
        $page = file_get_contents($url);
        $this->el = HtmlDomParser::str_get_html($page);

        return $this;
    }

}