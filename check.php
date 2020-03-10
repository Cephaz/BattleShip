<?php

    function checkGrid($grid, $ship, $pos, $axis)
    {
        for ($i = 0; $i < (int) $ship; $i++)
        {
            if ($pos[0] > 9)
                return(false);
            if ($pos[1] > 9)
                return(false);
            if ($grid[$pos[0]][$pos[1]] != 0)
                return(false);
            else
                if ($axis == 0)
                    $pos[0] = $pos[0]+1;
                else
                    $pos[1] = $pos[1]+1;
        }
        return(true);
    }

?>