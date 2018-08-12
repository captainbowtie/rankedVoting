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
 
 if($_POST["resetPW"]=="password"){
    require_once "dblogin.php";
    $dropRestaurants = "DROP TABLE restaurants";
    $dropVotes = "DROP TABLE votes";
    $voteTable = "CREATE TABLE votes(id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT KEY, " //Vote Table
        . "user TINYINT UNSIGNED NOT NULL, restaurant UNSIGNED NOT NULL) ENGINE InnoDB";
    $restaurantTable = "CREATE TABLE restaurants(id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT KEY, " //Restaurant Table
        . "name VARCHAR(64) NOT NULL, description VARCHAR(140) NOT NULL) ENGINE InnoDB";
        //TODO: connect to database, drop tables, create new ones
 }else{
     echo "Error: Incorrect Reset Password";
 }