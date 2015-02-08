/* 
 * ChiyoFramework
 * _notifications.js
 * Author: Raphael
 * 
 * Licensed under The MIT License (MIT) (=> see README.md for more information)
 * Copyright (C) 2015 rGunti
 */

function closeMessage(target) {
    $(target).animate({
        height: "0px",
        opacity: 0
    }, {
        duration: 500,
        complete: function() {
            $(target).remove();
        }        
    });
}
