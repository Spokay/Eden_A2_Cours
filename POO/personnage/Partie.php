<?php
class Partie{
    public $nbPlayers;
    public $players;
    public $mort;
    public $started = false;
    public function __construct($nbPlayers, $players){
        $this->setNbPlayers($nbPlayers);
        $this->setPlayers($players);
    }
    public function setNbPlayers($nbPlayers){
        $this->nbPlayers = $nbPlayers;
    }
    public function setPlayers($players){
        $this->players = $players;
    }
    public function start(){
        $this->started = true;
        return $this->createBoard();
    }
    public function createBoard(){
        $options = "<option>--choisir qui frapper--</option>";
        for ($playerI = 0; $playerI < $this->nbPlayers; $playerI++){
            $player = $this->players[$playerI];
            $options .= "<option value='".$player->id()."'>".$player->nom()."</option>";
        }
        $board = "";
        for ($playerI = 0; $playerI < $this->nbPlayers; $playerI++){
            $player = $this->players[$playerI];
            $board .= "<fieldset><legend>".$player->nom()."</legend><form action='' method='post'><div class='stats'>Dégats : ".$player->degats()."<br> Experience : ".$player->experience()."<br>Forces : ".$player->forces()."<br> Localisation : ".$player->localisation()."</div><input type='hidden' name='id' value='".$player->id()."'> <input type='submit' name='action' value='XP'><div class='frapper'><select name='cible' id='cible'>$options</select><input type='submit' name='action' value='frapper'></div></form></fieldset>";
        }
        $_SESSION['board'] = $board;
        return $board;
    }
    public function updateBoard($manager){
        for ($playerI = 0; $playerI < $this->nbPlayers; $playerI++) {
            $player = $this->players[$playerI];
            $manager->update('personnages', $player);
        }
    }
    public function action($type, $perso, $target){
        if ($type == 'frapper'){
            if ($perso->frappe($target) == 1){
                return false;
            }elseif($perso->frappe($target) == 2){
                return $this->mort[] = $target;
            }else{
                $perso->frappe($target);
                var_dump($target->degats());

                return "Personnage frappé";
            }
        }
    }
}