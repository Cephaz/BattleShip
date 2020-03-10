<?php

    function seeGrid($grid)
    {
        for($i = 0; $i < sizeof($grid); $i++)
        {
            for($j = 0; $j < sizeof($grid[$i]); $j++)
                print($grid[$i][$j]);
            print("\n");
        }
    }

    function checkShipinGrid($grid)
    {
        for($i = 0; $i < sizeof($grid); $i++)
            for($j = 0; $j < sizeof($grid[$i]); $j++)
                if($grid[$i][$j] == 1)
                    return true;
        print(seeGrid($grid));
        print("Tu as fini la partie\n");
        return false;
    }

    function checkit($x, $y, $grid)
    {
        if ($grid[$x][$y] == 1)
        {
            print("TOUCHER !!!\n");
            return true;
        }
        if ($grid[$x][$y] == 2)
        {
            print("deja detruit !!!\n");
            return false;
        }
        print("rater\n");
        return false;
    }

    function printGame($grid)
    {
        print("**************************************\n");
        print("*            Debut du jeu            *\n");
        print("* Vous devez couler toute les cases 1*\n");
        print("* 0 = eau | 1 = bateau | 2 = detruit *\n");
        print("**************************************\n");
        print("*  option = autre => continue        *\n");
        print("*  option = 1 => detruit les bateaux *\n");
        print("*  option = 2 => voir la carte       *\n");
        print("**************************************\n");
    }

    function posx()
    {
        $x = false;

        while (!$x)
        {
            $linex = readline("Votre cible x: ");
            if ($linex > 10 || $linex < 1)
                print("un nombre entre 1 et 10 :) \n");
            else
                $x = true;
        }
        return($linex);
    }

    function posy()
    {
        $y = false;

        while (!$y)
        {
            $liney = readline("Votre cible y: ");
            if ($liney > 10 || $liney < 1)
                print("un nombre entre 1 et 10 :) \n");
            else
                $y = true;
        }
        return($liney);
    }

    function changeGrid($grid)
    {
        for($i = 0; $i < sizeof($grid); $i++)
            for($j = 0; $j < sizeof($grid[$i]); $j++)
                if ($grid[$i][$j] == 1)
                    $grid[$i][$j] = 2;
        return($grid);
    }

    function shoot($grid)
    {
        $flag = false;
        print(printGame($grid));

        while (!$flag)
        {
            $x = posx();
            $y = posy();

            $flagi = true;
            while ($flagi)
            {
                $opt = readline("Votre option: ");
                if ($opt == 2)
                    seeGrid($grid);
                if ($opt == 1){
                    $grid = changeGrid($grid);
                }
                $flagi = false;
            }
            
            if (!checkShipinGrid($grid))
                $flag = true;
            if (!$flag)
                if (checkit($y-1, $x-1, $grid))
                    $grid[$y-1][$x-1] = 2;
        }
    }
?>