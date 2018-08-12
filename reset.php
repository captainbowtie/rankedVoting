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
echo<<<_END
<!DOCTYPE html>
    <html>
        <head>
            <title>Database Setup</title>
        </head>
    <body>
        <form>
            <input id="resetPassword">
            <input type="submit" id="submit" value="Reset">
        </form>
    </body>
</html>
_END;

    
            
    $userTable = "CREATE TABLE users(id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT KEY, " //User Table
            . "name VARCHAR(20) NOT NULL) ENGINE InnoDB";
            
