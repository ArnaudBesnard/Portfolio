var textarray = [
    "a",
    "b",
    "c"
];

function RndText()
{
    var rannum = Math.floor(Math.random() * textarray.length);

    $('#ml3').fadeOut('fast', function() {
        $(this).text(textarray[rannum]).fadeIn('fast');
    });
}

$(function() {
    // Call the random function when the DOM is ready: 
    RndText();
});

var inter = setInterval(function() { RndText(); }, 5000);
