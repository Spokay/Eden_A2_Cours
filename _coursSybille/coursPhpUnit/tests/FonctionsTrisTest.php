<?php
use PHPUnit\Framework\TestCase;
use app\FonctionsTris;
require("./vendor/autoload.php");

class FonctionsTrisTest extends TestCase{
    public function testTrierTableauAsc(){
        // Bloc arrange
        $tableau = [120, 4, -42];

        // Bloc act
        $tri = new FonctionsTris();
        $tableauAsc = $tri->trierTableauAsc($tableau);

        // Bloc assert
        $this->assertEquals([-42, 4, 120], $tableauAsc);
    }
    public function testLePlusPetit(){
        // Bloc arrange
        $tableau = [999, -9, -500, 4, 120, -42];

        // Bloc act
        $tri = new FonctionsTris();
        $plusPetitNb = $tri->lePlusPetit($tableau);

        // Bloc assert
        $this->assertEquals(-500, $plusPetitNb);
    }
}