<?php

$err = "\n";
/*
 * Copyright (C) 2017 allen
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

require_once "dblogin.php";

session_start();

$selectHTML = "<select id='voter'>
    <option value='-1'>Select Your Name</option>
    <option value='0'>Rebecca</option>
    <option value='1'>Rachel</option>
    <option value='2'>John</option>
    <option value='3'>Cayla</option>
    <option value='4'>Devin</option>
    <option value='5'>Jennifer</option>
    <option value='6'>Allen</option>
    <option value='7'>Maria</option>
    <option value='8'>Jacob</option>
    <option value='9'>Mary</option>
    <option value='10'>Joseph</option>
</select>\n";

if (isset($_SESSION['id'])) {
    $selectHTML = str_replace("'" . $_SESSION['id'] . "'", "'" . $_SESSION['id'] . "' selected", $selectHTML);
}

echo $selectHTML;

echo "<form id='ballot'>\n";
echo "<ul>\n";
//TODO: procedurally generate ballot
//TODO: List restaurants that have already been submitted
$restaurantsQuery = "SELECT * FROM restaurants";
$pastVotesQuery = "SELECT * FROM votes WHERE user=" . $_SESSION['id'] . " ORDER BY restaurant";
$connection = new mysqli(dbhost, dbuser, dbpass, dbname);
$restaurantsResult = $connection->query($restaurantsQuery);
$voteResult = $connection->query($pastVotesQuery);
$connection->close();

//Create the selects for each restaurant's ranking
$rankHTML = [];
for ($a = 0; $a < $restaurantsResult->num_rows; $a++) {
    $restaurantsResult->data_seek($a);
    $restaurant = $restaurantsResult->fetch_array(MYSQLI_NUM);
    $rankHTML[$a] = "   <select id='restaurant" . $restaurant[0] . "'>
        <option value='-1'>--</option>\n";
    for ($b = 0; $b < $restaurantsResult->num_rows; $b++) {
        $bUp = $b + 1;
        $rankHTML[$a] = $rankHTML[$a] . "     <option value='$b'>$bUp</option>\n";
    }
    $rankHTML[$a] = $rankHTML[$a] . " </select>\n";
}

//make prior votes appear, if session is set
if (isset($_SESSION['id'])) {
    for ($a = 0; $a < sizeof($rankHTML); $a++) {
        $voteResult->data_seek($a);
        $vote = $voteResult->fetch_array(MYSQLI_NUM);
        $rankMinusOne = $vote[3] - 1;
        $rankHTML[$a] = str_replace("'$rankMinusOne'", "'$rankMinusOne' selected", $rankHTML[$a]);
    }
}



for ($a = 0; $a < $restaurantsResult->num_rows; $a++) {
    $restaurantsResult->data_seek($a);
    $restaurant = $restaurantsResult->fetch_array(MYSQLI_NUM);
    echo "  <li title='" . $restaurant[2] . "'>" . $restaurant[1] . ": \n" . $rankHTML[$a] . "</li>\n";
}

echo "</ul>\n";
echo "</form>\n";
echo "    <input type='submit' id='submit' value='Vote'>\n";
echo "<script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>\n<script src='ballot.js'></script>";
echo $err;
