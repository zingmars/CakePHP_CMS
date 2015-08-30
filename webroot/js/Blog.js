/* --Their API blocks requests. Has to be done server side.
$.ajax({
    url: "http://api.theysaidso.com/qod.json",
    jsonp: "parseResponse",
    dataType: "json",
    error: function (response) {
        console.log(response);
    },
    success: function( response ) {
        console.log(response);
    }
});
*/
