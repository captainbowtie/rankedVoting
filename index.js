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
 
 $( document ).ready(function() {
 
    var d = new Date();
	switch (d.getDay()) {
		case 0: //Sunday
		//displaySubmit();
                displayBallot();
		break;
		case 1: //Monday
		displaySubmit();
		break;
		case 2: //Tuesday
		displaySubmit();
		break;
		case 3: //Wednesday
		displaySubmit();
		break;
		case 4: //Thursday
		if(d.getHours()<12){
		    displayBallot();
		}else{
		    displayResult();
		}
		break;
		case 5: //Friday
		if(d.getHours()<14){
		    displayResult();
		}else{
		    displaySubmit();
		}
		break;
		case 6: //Saturday
		displaySubmit();
		break;
	}
 
});

function displaySubmit(){
	$.get( "submit.php", function( r ) {
        $("#bodyDiv").append(r);
    });
	
}

function displayBallot(){
    	$.get( "ballot.php", function( r ) {
        $("#bodyDiv").append(r);
    });
}

function displayResult(){
	$.get( "result.php", function( r ) {
        $("#bodyDiv").append(r);
    });
    
}