<?php
/**
 * Created by PhpStorm.
 * User: vaseninm
 * Date: 26.07.17
 * Time: 0:01
 */

namespace App\Services;


use App\Entities\Footballer;
use Thujohn\Twitter\Facades\Twitter;

class Poster
{
    const TARGET = 35;

    /**
     * @param Footballer[] $footballers
     * @return bool
     */
    public function postSummary(array $footballers) : bool
    {
        $sum = 0;

        foreach ($footballers as $footballer) {
            $sum += $footballer->getGoals();
        }

        $text = sprintf('Мы забили уже %d из %d голов.', $sum, Poster::TARGET);
        $this->post($text);
        return true;
    }

    public function postDifference(Footballer $new, Footballer $old = null) : bool {

        $diff = $new->getGoals() - ($old ? $old->getGoals() : 0);

        if ($diff === 0) return false;

        $text = sprintf('%s забибивает гол!!!', $new->getName()->getRandomName());
        $this->post($text);
        
        return true;
    }


    protected function post(string $text) : string
    {

        $response = Twitter::postTweet([
            'status' => $text,
            'format' => 'json'
        ]);

        echo $text . PHP_EOL;

        return true;
    }

}