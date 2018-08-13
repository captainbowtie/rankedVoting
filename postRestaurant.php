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

require_once "dblogin.php";

if (strlen($_POST["n"]) > 0 && strlen($_POST["d"])) {
    $connection = new mysqli(dbhost, dbuser, dbpass, dbname);
    $name = $connection->real_escape_string(sanitize_string($_POST["n"]));
    $description = $connection->real_escape_string(sanitize_string($_POST["d"]));
    if ($name . length > 64 || $description . length > 140) {
        die("1");
    }
    $query = "INSERT INTO restaurants (name,description) VALUES('$name','$description')";
    $result = $connection->query($query);
    $connection->close();
    echo "0";
}

function sanitize_string($string) {
    if (get_magic_quotes_gpc()) {
        $string = stripslashes($string);
    }
    return htmlentities($string);
}
