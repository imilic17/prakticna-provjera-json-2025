<?php

    $predmetString = file_get_contents(__DIR__.'/predmeti.json');
    $predmetData = json_decode($predmetString);