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
 
 $("#submit").click(function(e){
     e.preventDefault();
     if($("#name").val().length==0 || $("#name").val().length>64){
      alert("Error: restaurant name must be between 1 and 64 characters long");
     }else if($("#description").val().length>140){
      alert("Error: description must be less than 140 characters long");
     }else{
      //AJAX to submit
     }
 })