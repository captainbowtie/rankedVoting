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
    //TODO: List restaurants that have already been submitted
    $query = "SELECT * FROM restaurants";
    $connection = new mysqli(dbhost, dbuser, dbpass, dbname);
    $result = $connection->query($query);
    $connection->close();
    for ($a = 0; $a < $result->num_rows; $a++) {
        if($a == 0){
            echo "Already submitted restaurants for this week:\n<ul>";
        }
        $result->data_seek($a);
        $restaurant = $result->fetch_array(MYSQLI_NUM);
        echo "<li>".$restaurant[1].": ".$restaurant[2]."</li>\n";
        if($a == ($teamResult->num_rows)-1){
            echo "</ul>\n";
        }
    }

echo<<<_END
        <form>
            Restaurant Name: <input id="name">
            <br>
            Description (140 characters): <textarea id="description">Put your description here</textarea>
            <br>
            <input type="submit" id="submit" value="Submit">
        </form>
        <script src='submit.js'></script>
_END;

