<?php

    for($i =  0; $i < 5; $i++){
        echo '
        <svg height="100" width="100">
            <circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="rgb('.rand(0,255).','.rand(0,255).','.rand(0,255).')"/>
        </svg>    
        ';     
    }
?>