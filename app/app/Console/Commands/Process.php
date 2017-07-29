<?php

namespace App\Console\Commands;

use App\Repositories\FootballerRepository;
use App\Services\Poster;
use Illuminate\Console\Command;
use App\Repositories\FootballerParser;

class Process extends Command
{
    protected $tournaments = [2200, 2220]; // rfpl & el
    protected $footballers = [14550, 35]; // kokoba
//    protected $footballers = [41607, 112932]; // super

    protected $signature = 'process:start';

    protected $description = 'Start process';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $poster = new Poster();
        $footballers = [];

        foreach ($this->tournaments as $tournament) {
            foreach ($this->footballers as $footballerId) {
                $repository = new FootballerRepository($footballerId, $tournament);
                $footballer = (new FootballerParser($footballerId, $tournament))->parse();

                $footballers[] = $footballer;
                $poster->postDifference($footballer, $repository->load());
                $repository->save($footballer);
            }
        }


        $poster->postSummary($footballers);
    }
}
