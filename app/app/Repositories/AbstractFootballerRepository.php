<?php

namespace App\Repositories;


abstract class AbstractFootballerRepository
{
    protected $tournamentId = null; // РФПЛ 2017/18
    protected $playerId = null;

    function __construct(int $playerId, int $tournamentId = null)
    {
        $this->playerId = $playerId;
        if ($tournamentId) $this->tournamentId = $tournamentId;
    }
}