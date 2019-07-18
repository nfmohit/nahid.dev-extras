/**
 * Netlify webhook trigger JS
 */

jQuery(document).ready(function($) {  

    if ( triggerPost.Message == 6 || triggerPost.Message == 1 ){
        jQuery.ajax ( {
            type: 'POST',
            url: 'https://api.netlify.com/build_hooks/5d2eed2befbb8d01823be70e', 
            success: function( d ) { 
                    console.log( d )
            }
        } )
    }

});
