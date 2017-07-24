<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ChampionatParser;
use Thujohn\Twitter\Facades\Twitter;

class Process extends Command
{
    protected $footballers = [14550, 35]; // kokoba
//    protected $footballers = [41607, 112932]; // super
    protected $target = 35;

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
        $sum = 0;

        foreach ($this->footballers as $footballerId) {
            $parser = new ChampionatParser($footballerId);
            $player = $parser->parse();
            $sum += $player->getGoals();
        }

        echo Twitter::postTweet([
            'status' => sprintf('Мы забили уже %d из %d голов.', $sum, $this->target),
            'format' => 'json'
        ]);
    }
}
