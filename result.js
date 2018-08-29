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

/* global votes, restaurants */

//determine number of restaurants
var numRestaurants = 0;
for (var a = 0; a < votes.length; a++) {
    if (votes[a].rank > numRestaurants) {
        numRestaurants = votes[a].rank;
    }
}

//Determine how many votes a restaurant needs to win
var numVoters = votes.length / numRestaurants;
var majority = Math.floor(numVoters / 2) + 1;
var winner = -1;

console.log(votes);

while (winner === -1) {

    //Initialize array to count first ranks
    var firstRanks = [];
    for (var a = 0; a < numRestaurants; a++) {
        firstRanks[restaurants[a]["id"]] = 0;
    }

    //Count the number of first rank votes each restaurant received
    for (var a = 0; a < votes.length; a++) {
        if (votes[a]["rank"] == 1) {
            firstRanks[votes[a]["restaurant"]]++;
        }
    }

    //Display results
    for (var a = 0; a < firstRanks.length; a++) {
        if (firstRanks[a] > 0) {
            console.log(getRestaurantById(a) + ": " + firstRanks[a]);
        }
    }

    //initialize variables to hold eliminated restaurant's info, if elimination is necessary
    var loser = {
        "restaurant": [],
        "votes": Number.MAX_SAFE_INTEGER
    };


    for (var a = 0; a < firstRanks.length; a++) {
        //Check if any restaurant has majority of first ranks
        if (firstRanks[a] >= majority) {
            winner = a;
        }
        //In same loop, find the lowest ones to remove if more voing is necessary
        if (firstRanks[a] <= loser.votes) {
            //if lower than previous lowest, reset the array of losers
            if (firstRanks[a] < loser.votes) {
                loser.restaurant = [];
                loser.votes = firstRanks[a];
            }
            //Regardless of reset, then push the resturant in question onto the array
            loser.restaurant.push(firstRanks[a]);
        }
    }

    //If there isn't a winner, remove the restaurant(s) with lease 1st place votes
    if (winner === -1) {
        //Get a list of all voters
        var voterIds = [];
        for (var a = 0; a < votes.length; a++) {
            if (voterIds.indexOf(votes[a]["user"]) == -1) {
                voterIds.push(votes[a]["user"]);
            }
        }

        //Remove vote for loser(s) and shift the rest upwards
        for (var a = 0; a < loser.restaurant.length; a++) {
            
            //for each person that voted, find where they ranked each loser
            for (var b = 0; b < voterIds.length; b++) {
               
                //For each vote, check if it is the correct user and for a loser
                //If so, note how that user ranked it
                var loserRank = -1;
                for (var c = votes.length - 1; c >= 0; c--) {
                    if(votes[c]["restaurant"]==loser.restaurant[a] &&
                            votes[c]["user"] == voterIds[b]){
                        loserRank = votes[c]["rank"];
                        //Remove the losing vote
                        votes.splice(c,1);
                        //Because we've found the vote in question, we can cut the loop short
                        c = 0;
                    }
                }
                
                //After having removed the losing vote, adjust all upward accordingly
                for(var c = 0;c<votes.length;c++){
                    if(votes[c]["user"]==voterIds[b] &&
                            votes[c]["rank"]>loserRank){
                        votes[c]["rank"]--;
                    }
                }
            }
        }
    }
}

console.log(getRestaurantById(winner));

function getRestaurantById(id) {
    var name;
    for (var a = 0; a < restaurants.length; a++) {
        if (id == restaurants[a]["id"]) {
            name = restaurants[a]["name"];
        }
    }
    return name;
}
