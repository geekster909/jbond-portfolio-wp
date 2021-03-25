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

    function parameterSeparator(string) {
        if (string.includes('?')) {
            return '&';
        }

        return '?';
    }

    // Update Badge every 5 seconds
    var stagingBadgeElement = $('.staging-badge');
    var productionBadgeElement = $('.production-badge');

    if (stagingBadgeElement.length !== 0) {
        var stagingBadgeImage = stagingBadgeElement.attr('src');
        setInterval(function(){
            stagingBadgeElement.attr('src', stagingBadgeImage + parameterSeparator(stagingBadgeImage) + 'v=' + getRandomInt(999999));
        }, 5000);
    }

    if (productionBadgeElement.length !== 0) {
        var productionBadgeImage = productionBadgeElement.attr('src');
        setInterval(function(){
            productionBadgeElement.attr('src', productionBadgeImage + parameterSeparator(productionBadgeImage) + 'v=' + getRandomInt(999999));
        }, 5000);
    }
    
})(jQuery);