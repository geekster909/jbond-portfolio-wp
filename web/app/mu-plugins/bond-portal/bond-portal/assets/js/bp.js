(function($){

    $.fn.goTo = function(location) {
        var position = (typeof location !== "undefined") ? 0 : $(this).offset().top - 50;
        $('html, body').animate({
            scrollTop: position + 'px'
        }, 'slow');
        return this;
    };

    $('.js-bp-deployment-type').on('click', function(e) {
        if ($(this).attr('disabled')) {
            e.preventDefault();
        }
    });

    function getRandomInt(max) {
        return Math.floor(Math.random() * Math.floor(max));
    }

    // Update Netlify Badge every 5 seconds
    var netlifyStagingBadgeElement = $('.netlify-staging-badge');
    var netlifyProductionBadgeElement = $('.netlify-production-badge');

    if (netlifyStagingBadgeElement.length !== 0) {
        var netlifyStagingBadgeImage = netlifyStagingBadgeElement.attr('src');
        setInterval(function(){
            netlifyStagingBadgeElement.attr('src', netlifyStagingBadgeImage + '?v=' + getRandomInt(999999));
        }, 5000);
    }

    if (netlifyProductionBadgeElement.length !== 0) {
        var netlifyProductionBadgeImage = netlifyProductionBadgeElement.attr('src');
        setInterval(function(){
            netlifyProductionBadgeElement.attr('src', netlifyProductionBadgeImage + '?v=' + getRandomInt(999999));
        }, 5000);
    }
    
})(jQuery);