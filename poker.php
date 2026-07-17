<?php

class Poker_Hand
{
    // 属性
    private $card = [];
    private $judge = null;

    // コンストラクタ
    public function __construct(
        $suit1, $number1,
        $suit2, $number2,
        $suit3, $number3,
        $suit4, $number4,
        $suit5, $number5
    ) {
        $this->card = [
            ['suit' => $suit1, 'number' => (int)$number1],
            ['suit' => $suit2, 'number' => (int)$number2],
            ['suit' => $suit3, 'number' => (int)$number3],
            ['suit' => $suit4, 'number' => (int)$number4],
            ['suit' => $suit5, 'number' => (int)$number5],
        ];

        $this->setPokerHandJudge();
    }

    // 判定結果を取得
    public function getPokerHandJudge()
    {
        return $this->judge;
    }

    // カードを取得
    public function getCard()
    {
        return $this->card;
    }

    // 判定してjudgeへ保存
    public function setPokerHandJudge()
    {
        if ($this->fraudJudge()) {
            $this->judge = "Illegal hand";
            return;
        }

        $numbers = array_column($this->card, 'number');
        $suits = array_column($this->card, 'suit');

        $numbers = $this->cardSort($numbers);

        $numberCount = array_count_values($numbers);

        $isFlush = count(array_unique($suits)) === 1;
        $isStraight = $this->isStraight($numbers);
        $pairCount = $this->getPairCount($numberCount);

        if ($isFlush && $isStraight) {

            if ($numbers == [1,10,11,12,13]) {
                $this->judge = "Royal Straight Flush";
                return;
            }

            $this->judge = "Straight Flush";
            return;
        }

        if (in_array(4, $numberCount, true)) {
            $this->judge = "Four Card";
            return;
        }

        if (in_array(3, $numberCount, true) &&
            in_array(2, $numberCount, true)) {
            $this->judge = "Full House";
            return;
        }

        if ($isFlush) {
            $this->judge = "Flush";
            return;
        }

        if ($isStraight) {
            $this->judge = "Straight";
            return;
        }

        if (in_array(3, $numberCount, true)) {
            $this->judge = "Three Card";
            return;
        }

        if ($pairCount == 2) {
            $this->judge = "Two Pair";
            return;
        }

        if ($pairCount == 1) {
            $this->judge = "One Pair";
            return;
        }

        $this->judge = "None";
    }

    // ソート
    private function cardSort($hand)
    {
        sort($hand);
        return $hand;
    }

    // 不正チェック
    private function fraudJudge()
    {
        foreach ($this->card as $card) {
            if ($card['suit'] === '' || $card['number'] === 0) {
                return true;
            }
        }

        $check = [];

        foreach ($this->card as $card) {

            $key = $card['suit'] . "-" . $card['number'];

            if (isset($check[$key])) {
                return true;
            }

            $check[$key] = true;
        }

        return false;
    }

    private function isStraight($numbers)
    {
        sort($numbers);

        if ($numbers == [1,2,3,4,5]) {
            return true;
        }

        $temp = $numbers;

        foreach ($temp as &$num) {
            if ($num == 1) {
                $num = 14;
            }
        }

        sort($temp);

        return ($temp[4] - $temp[0] == 4 &&
                count(array_unique($temp)) == 5);
    }

    private function getPairCount($numberCount)
    {
        $count = 0;

        foreach ($numberCount as $value) {
            if ($value == 2) {
                $count++;
            }
        }

        return $count;
    }
}