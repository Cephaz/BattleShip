<?php

    require_once('check.php');

    function initShips()
    {
        for ($i = 0; $i < 5; $i++)
        {
            if ($i < 2)
                $ships[$i] = $i+2;
            if ($i >= 2)
                $ships[$i] = $i+1;
        }

        return($ships);
    }

    function initGrid()
    {
        for ($i = 0; $i < 10; $i++)
            for($j = 0; $j < 10; $j++)
                $grid[$i][$j] = 0;
        return($grid);
    }

    function initAxis()
    {
        return(rand(0,1));
    }

    function initPos()
    {
        $pos[0] = rand(0,9);
        $pos[1] = rand(0,9);
        return($pos);
    }

    function insertShiptoGrid($ship, $grid)
    {
        $flag = false;
        while (!$flag)
        {
            $axis = initAxis();
            $pos = initPos();
            if (checkGrid($grid, $ship, $pos, $axis))
            {
                for ($i = 0; $i < (int) $ship; $i++)
                {
                    $grid[$pos[0]][$pos[1]] = 1;
                    if ($axis == 0)
                        $pos[0] = $pos[0]+1;
                    else
                        $pos[1] = $pos[1]+1;
                }
                $flag = true;
            }
        }
        return($grid);
    }

    function setup()
    {
        $ships = initShips();
        $grid = initGrid();
        for ($i = 0; $i < sizeof($ships); $i++){
            $grid = insertShiptoGrid($ships[$i] , $grid);
        }
        return ($grid);
    }
?>