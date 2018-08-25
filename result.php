<?php
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

echo "<div id='resultDiv'></div>\n";

//get vote data
$voteQuery = "SELECT * FROM votes ORDER BY restaurant";
$connection = new mysqli(dbhost, dbuser, dbpass, dbname);
$voteResult = $connection->query($voteQuery);
$connection->close();

//create array of vote data
$votes = [];
for($a = 0;$a<$voteResult->num_rows;$a++){
    $voteResult->data_seek($a);
    $votes[$a] = $voteResult->fetch_array(MYSQLI_ASSOC);
}

//echo vote data as json
echo "<script>";
echo "var votes=".json_encode($votes).";";
echo "</script>";

//echo controling script
echo "<script src='result.js'></script>";