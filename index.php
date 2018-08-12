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
    <div id=bodyDiv></div>
    <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
    <script src='index.js'></script>
    </body>
</html>
_END;

//TODO: determine which page to show on homepage