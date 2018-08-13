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

$("#voter").on("change", function () {
    var data = {"id": this.value};
    $.post("/postUser.php", data);
});

$("#submit").click(function (e) {
    e.preventDefault();
    if (validateBallot()) {

    } else {
        alert("Something is wrong with your ballot. Please ensure that (1) \n\
you have voted on every restaurant and (2) you did not give two different \n\
restaurants the same rank.");
    }
})

var validateBallot = function () {
    var selects;
    $("#ballot").each(function () {
        selects = $(this).find(':input'); //<-- Should return all input elements in that specific form.
    });
    var rankings = [];
    for (var a = 0; a < selects.length; a++) {
        rankings[a] = selects[a].selectedIndex;
        if(rankings[a] === 0){
            return false;
        }
    }
    if (containsDuplicates(rankings)) {
        return false;
    } else {
        return true;
    }
}

var containsDuplicates = function (a) {
    var counts = [];
    for (var i = 0; i <= a.length; i++) {
        if (counts[a[i]] === undefined) {
            counts[a[i]] = 1;
        } else {
            return true;
        }
    }
    return false;
}