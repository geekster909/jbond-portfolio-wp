!function(r){function t(t){return Math.floor(Math.random()*Math.floor(t))}r.fn.goTo=function(t){var n=void 0!==t?0:r(this).offset().top-50;return r("html, body").animate({scrollTop:n+"px"},"slow"),this},r(".js-bp-deployment-type").on("click",function(t){r(this).attr("disabled")&&t.preventDefault()});var n=r(".netlify-staging-badge"),e=r(".netlify-production-badge");if(0!==n.length){var o=n.attr("src");setInterval(function(){n.attr("src",o+"?v="+t(999999))},5e3)}if(0!==e.length){var a=e.attr("src");setInterval(function(){e.attr("src",a+"?v="+t(999999))},5e3)}}(jQuery);