<?php
/**
 * Created by PhpStorm.
 * User: vaseninm
 * Date: 26.07.17
 * Time: 20:35
 */

namespace App\Repositories;


use App\Entities\Footballer;
use Illuminate\Support\Facades\Redis;

class FootballerRepository extends AbstractFootballerRepository
{
    public function save(Footballer $footballer) : bool {
        $data = serialize($footballer);
        Redis::set($this->getKey(), $data);
        return true;
    }

    public function load() : ?Footballer {
        $data = Redis::get($this->getKey());
        return $data ? unserialize($data) : null;
    }

    private function getKey() : string {
        return sprintf('footballer:%d:%d', $this->tournamentId, $this->playerId);
    }
}