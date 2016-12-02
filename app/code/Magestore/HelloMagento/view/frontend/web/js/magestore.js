/**
 * Created by NamAnh on 02-Dec-16.
 */
define([
    "jquery",
    "logger",
    "jquery/ui"
], function($, logger) {
    "use strict";
    logger.log('magestore.js is loaded!!');
    logger.log(logger);

    //creating jquery widget
    $.widget('magestore.js', {
        _create: function() {

            //options which you can pass from js.phtml file in json format
            logger.log(this.options);

            //access to element p#test
            logger.log(this.element);

            //for exmple, you can create some click event or something else
            this.element.on('click', function(e){
                logger.log("You click on element: " + e.target);
            });
        }

    });

    return $.magestore.js;
});