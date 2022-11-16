<?php
class Poker{
    public array $bestHands;
    public array $callme;
    public static $converter = ["2","3","4","5","6","7","8","9","J","Q","K","1"] ;
// Help getting value in a good order

    public function getCallme(){
        return $this->callme;
    }

    public function __construct(array $hands)
    {
        $scores = [];
        foreach($hands as $hand){
            $number = [];
            $color = [];
            for($i=0; $i <15; $i++){
            if($i % 3 == 0){
                $number[] = substr($hand, $i, 1);
                //$number[] = array_search(substr($hand, $i, 1), $this->converter);
                }
            if($i % 3 == 1){
                $color[] = substr($hand, $i, 1);
                }
            }
            
        }
        $this->callme = $number;
        $this->bestHands = $number;
        //$this->bestHands = [array_search(max($scores), $scores)];
        throw new BadFunctionCallException("Please implement the Poker class!");
    }
}
?>