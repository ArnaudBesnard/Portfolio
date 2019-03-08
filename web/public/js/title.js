// Wrap every letter in a span

$('.ml3').each(function(){
    $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
});

anime.timeline({loop: false})
    .add({
        targets: '.ml3 .letter',
        opacity: [0,2],
        easing: "easeInOutQuad",
    duration: 2250,
    delay: function(el, i) {
    return 200 * (i+1)
}
});
