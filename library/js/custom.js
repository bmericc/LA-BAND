jQuery(document).ready(function() {
    // hide the copyright text
    if (jQuery(window).height() < 700) {
        jQuery('#copyrights').css('display', 'none');
        jQuery('#social-icons').css('marginBottom', '0');
    }

    jQuery(window).resize(function() {
        if (jQuery(window).height() < 700) {
            jQuery('#copyrights').css('display', 'none');
            jQuery('#social-icons').css('marginBottom', '0');
        }
    });

    jQuery(window).resize(function() {
        if (jQuery(window).height() >= 700) {
            jQuery('#copyrights').css('display', 'block');
            jQuery('#social-icons').css('marginBottom', '0');
        }
    });

    // resize the flickr images
    if (jQuery(window).width() > 1352) {
        jQuery('.flickr').children('div').each(function(i) {
            if ((i+1)%3 == 0) {
                jQuery(this).css({margin: '0'});
            }
        });
    }
    else if (jQuery(window).width() <= 1352 && jQuery(window).width() > 755) {
        jQuery('.flickr').children('div').each(function(i) {
            if ((i+1)%2 == 0) {
                jQuery(this).css({margin: '0'});
            }
        });
    }
    else if (jQuery(window).width() <= 755 && jQuery(window).width() > 467) {
        jQuery('.flickr').children('div').css({margin: '0 15px 15px 0'});
        jQuery('.flickr').children('div').each(function(i) {
            jQuery('.flickr').children('div').each(function(i) {
                if ((i + 1) % 5 == 0) {
                    jQuery(this).css({margin: '0 0 15px 0'});
                }
            });
        });
    }
    else if (jQuery(window).width() <= 467) {
        jQuery('.flickr').children('div').css({margin: '0 15px 15px 0'});
        jQuery('.flickr').children('div').each(function(i) {
            jQuery('.flickr').children('div').each(function(i) {
                if ((i + 1) % 3 == 0) {
                    jQuery(this).css({margin: '0 0 15px 0'});
                }
            });
        });
    }

    jQuery(window).resize(function() {
        if (jQuery(window).width() > 1352) {
            jQuery('.flickr').children('div').css({margin: '0 12.5px 12.5px 0'});
            jQuery('.flickr').children('div').each(function(i) {
                if ((i + 1)%3 == 0) {
                    jQuery(this).css({margin: '0 0 12.5px 0'});
                }

                if ((i + 1) % 2 === 0 && (i + 1) % 3 !== 0) {
                    jQuery(this).css({margin: '0 12.5px 12.5px 0'});
                }
            });
        }
        else if (jQuery(window).width() <= 1352 && jQuery(window).width() > 755) {
            jQuery('.flickr').children('div').css({margin: '0 15px 15px 0'});
            jQuery('.flickr').children('div').each(function(i) {
                if ((i + 1) % 2 == 0) {
                    jQuery(this).css({margin: '0 0 15px 0'});
                }

                if ((i + 1) % 3 === 0 && (i + 1) % 2 !== 0) {
                    jQuery(this).css({margin: '0 15px 15px 0'});
                }
            });
        }
        else if (jQuery(window).width() <= 755 && jQuery(window).width() > 467) {
            jQuery('.flickr').children('div').css({margin: '0 15px 15px 0'});
            jQuery('.flickr').children('div').each(function(i) {
                jQuery('.flickr').children('div').each(function(i) {
                    if ((i + 1) % 5 == 0) {
                        jQuery(this).css({margin: '0 0 15px 0'});
                    }
                });
            });
        }
        else if (jQuery(window).width() <= 467) {
            jQuery('.flickr').children('div').css({margin: '0 15px 15px 0'});
            jQuery('.flickr').children('div').each(function(i) {
                jQuery('.flickr').children('div').each(function(i) {
                    if ((i + 1) % 3 == 0) {
                        jQuery(this).css({margin: '0 0 15px 0'});
                    }
                });
            });
        }
    });
});
