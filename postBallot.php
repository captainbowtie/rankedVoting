<?php

/*
 * Copyright (C) 2018 allen
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

session_start();

if ($_SESSION['id'] != $_POST['u']) {
    echo 1; //Something has gone horribly, horribly wrong
} else {
    
    //connect to database
    require_once "dblogin.php";
    $connection = new mysqli(dbhost, dbuser, dbpass, dbname);

    //write votes to database
    for ($a = 0; $a < sizeOf($_POST['v']); $a++) {
        $vote = sanitize_string($_POST['v'][$a]);
        $query = "INSERT INTO votes (user,restaurant,rank) "
                . "VALUES(" . $_SESSION['id'] . ",$a,$vote)";
        $result = $connection->query($query);
    }

    //close connection and notify of success
    $connection->close();
    echo 0;
}

function sanitize_string($string) {
    if (get_magic_quotes_gpc()) {
        $string = stripslashes($string);
    }
    return htmlentities($string);
}
