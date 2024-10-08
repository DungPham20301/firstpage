/*! Swipebox v1.5.2 | Constantin Saguin csag.co | MIT License | github.com/brutaldesign/swipebox */

;( function ( window, document, $, undefined ) {

    $.swipebox = function( elem, options ) {

        $( elem ).addClass( 'swipebox' ); // fugly but yea, swipebox class all the things

        // Default options
        var ui,
            defaults = {
                useCSS : true,
                useSVG : true,
                initialIndexOnArray : 0,
                removeBarsOnMobile : true,
                hideCloseButtonOnMobile : false,
                hideBarsDelay : 3000,
                videoMaxWidth : 1140,
                vimeoColor : 'cccccc',
                beforeOpen: null,
                afterOpen: null,
                afterClose: null,
                afterMedia: null,
                nextSlide: null,
                prevSlide: null,
                loopAtEnd: false,
                autoplayVideos: false,
                queryStringData: {},
                toggleClassOnLoad: ''
            },

            plugin = this,
            elements = [], // slides array [ { href:'...', title:'...' }, ...],
            $elem,
            selector = '.swipebox',
            isMobile = navigator.userAgent.match( /(iPad)|(iPhone)|(iPod)|(Android)|(PlayBook)|(BB10)|(BlackBerry)|(Opera Mini)|(IEMobile)|(webOS)|(MeeGo)/i ),
            isTouch = isMobile !== null || document.createTouch !== undefined || ( 'ontouchstart' in window ) || ( 'onmsgesturechange' in window ) || navigator.msMaxTouchPoints,
            supportSVG = !! document.createElementNS && !! document.createElementNS( 'http://www.w3.org/2000/svg', 'svg').createSVGRect,
            winWidth = window.innerWidth ? window.innerWidth : $( window ).width(),
            winHeight = window.innerHeight ? window.innerHeight : $( window ).height(),
            currentX = 0,
            /* jshint multistr: true */
            html = '<div id="wcpr-swipebox-overlay">\
					<div id="wcpr-swipebox-container">\
						<div id="wcpr-swipebox-slider"></div>\
						<div id="wcpr-swipebox-top-bar">\
							<div id="wcpr-swipebox-title"></div>\
						</div>\
						<div id="wcpr-swipebox-bottom-bar">\
							<div id="wcpr-swipebox-arrows">\
								<a id="wcpr-swipebox-prev"></a>\
								<a id="wcpr-swipebox-next"></a>\
							</div>\
						</div>\
						<a id="wcpr-swipebox-close"></a>\
					</div>\
			</div>';

        plugin.settings = {};

        $.swipebox.close = function () {
            ui.closeSlide();
        };

        $.swipebox.extend = function () {
            return ui;
        };

        plugin.init = function() {

            plugin.settings = $.extend( {}, defaults, options );

            if ( Array.isArray( elem ) ) {

                elements = elem;
                ui.target = $( window );
                ui.init( plugin.settings.initialIndexOnArray );

            } else {

                $( document ).on( 'click', selector, function( event ) {

                    // console.log( isTouch );

                    if ( event.target.parentNode.className === 'slide current' ) {

                        return false;
                    }

                    if ( ! Array.isArray( elem ) ) {
                        ui.destroy();
                        $elem = $( selector );
                        ui.actions();
                    }

                    elements = [];
                    var index, relType, relVal;

                    // Allow for HTML5 compliant attribute before legacy use of rel
                    if ( ! relVal ) {
                        relType = 'data-rel';
                        relVal = $( this ).attr( relType );
                    }

                    if ( ! relVal ) {
                        relType = 'rel';
                        relVal = $( this ).attr( relType );
                    }

                    if ( relVal && relVal !== '' && relVal !== 'nofollow' ) {
                        $elem = $( selector ).filter( '[' + relType + '="' + relVal + '"]' );
                    } else {
                        $elem = $( selector );
                    }

                    $elem.each( function() {

                        var title = null,
                            href = null;

                        if ( $( this ).attr( 'title' ) ) {
                            title = $( this ).attr( 'title' );
                        }

                        if ( $( this ).attr( 'href' ) ) {
                            href = $( this ).attr( 'href' );
                        }

                        elements.push( {
                            href: href,
                            title: title
                        } );
                    } );

                    index = $elem.index( $( this ) );
                    event.preventDefault();
                    event.stopPropagation();
                    ui.target = $( event.target );
                    ui.init( index );
                } );
            }
        };

        ui = {

            /**
             * Initiate Swipebox
             */
            init : function( index ) {
                if ( plugin.settings.beforeOpen ) {
                    plugin.settings.beforeOpen();
                }
                this.target.trigger( 'wcpr-swipebox-start' );
                $.swipebox.isOpen = true;
                this.build();
                this.openSlide( index );
                this.openMedia( index );
                this.preloadMedia( index+1 );
                this.preloadMedia( index-1 );
                if ( plugin.settings.afterOpen ) {
                    plugin.settings.afterOpen(index);
                }
            },

            /**
             * Built HTML containers and fire main functions
             */
            build : function () {
                var $this = this, bg;

                $( 'body' ).append( html );

                if ( supportSVG && plugin.settings.useSVG === true ) {
                    bg = $( '#wcpr-swipebox-close' ).css( 'background-image' );
                    bg = bg.replace( 'png', 'svg' );
                    $( '#wcpr-swipebox-prev, #wcpr-swipebox-next, #wcpr-swipebox-close' ).css( {
                        'background-image' : bg
                    } );
                }

                if ( isMobile && plugin.settings.removeBarsOnMobile ) {
                    $( '#wcpr-swipebox-bottom-bar, #wcpr-swipebox-top-bar' ).remove();
                }

                $.each( elements,  function() {
                    $( '#wcpr-swipebox-slider' ).append( '<div class="slide"></div>' );
                } );

                $this.setDim();
                $this.actions();

                if ( isTouch ) {
                    $this.gesture();
                }

                // Devices can have both touch and keyboard input so always allow key events
                $this.keyboard();

                $this.animBars();
                $this.resize();

            },

            /**
             * Set dimensions depending on windows width and height
             */
            setDim : function () {

                var width, height, sliderCss = {};

                // Reset dimensions on mobile orientation change
                if ( 'onorientationchange' in window ) {

                    window.addEventListener( 'orientationchange', function() {
                        if ( window.orientation === 0 ) {
                            width = winWidth;
                            height = winHeight;
                        } else if ( window.orientation === 90 || window.orientation === -90 ) {
                            width = winHeight;
                            height = winWidth;
                        }
                    }, false );


                } else {

                    width = window.innerWidth ? window.innerWidth : $( window ).width();
                    height = window.innerHeight ? window.innerHeight : $( window ).height();
                }

                sliderCss = {
                    width : width,
                    height : height
                };

                $( '#wcpr-swipebox-overlay' ).css( sliderCss );

            },

            /**
             * Reset dimensions on window resize envent
             */
            resize : function () {
                var $this = this;

                $( window ).resize( function() {
                    $this.setDim();
                } ).resize();
            },

            /**
             * Check if device supports CSS transitions
             */
            supportTransition : function () {

                var prefixes = 'transition WebkitTransition MozTransition OTransition msTransition KhtmlTransition'.split( ' ' ),
                    i;

                for ( i = 0; i < prefixes.length; i++ ) {
                    if ( document.createElement( 'div' ).style[ prefixes[i] ] !== undefined ) {
                        return prefixes[i];
                    }
                }
                return false;
            },

            /**
             * Check if CSS transitions are allowed (options + devicesupport)
             */
            doCssTrans : function () {
                if ( plugin.settings.useCSS && this.supportTransition() ) {
                    return true;
                }
            },

            /**
             * Touch navigation
             */
            gesture : function () {

                var $this = this,
                    index,
                    hDistance,
                    vDistance,
                    hDistanceLast,
                    vDistanceLast,
                    hDistancePercent,
                    vSwipe = false,
                    hSwipe = false,
                    hSwipMinDistance = 10,
                    vSwipMinDistance = 50,
                    startCoords = {},
                    endCoords = {},
                    bars = $( '#wcpr-swipebox-top-bar, #wcpr-swipebox-bottom-bar' ),
                    slider = $( '#wcpr-swipebox-slider' );

                bars.addClass( 'visible-bars' );
                $this.setTimeout();

                $( 'body' ).bind( 'touchstart', function( event ) {

                    $( this ).addClass( 'wcpr-touching' );
                    index = $( '#wcpr-swipebox-slider .slide' ).index( $( '#wcpr-swipebox-slider .slide.current' ) );
                    endCoords = event.originalEvent.targetTouches[0];
                    startCoords.pageX = event.originalEvent.targetTouches[0].pageX;
                    startCoords.pageY = event.originalEvent.targetTouches[0].pageY;

                    $( '#wcpr-swipebox-slider' ).css( {
                        '-webkit-transform' : 'translate3d(' + currentX +'%, 0, 0)',
                        'transform' : 'translate3d(' + currentX + '%, 0, 0)'
                    } );

                    $( '.wcpr-touching' ).bind( 'touchmove',function( event ) {
                        event.preventDefault();
                        event.stopPropagation();
                        endCoords = event.originalEvent.targetTouches[0];

                        if ( ! hSwipe ) {
                            vDistanceLast = vDistance;
                            vDistance = endCoords.pageY - startCoords.pageY;
                            if ( Math.abs( vDistance ) >= vSwipMinDistance || vSwipe ) {
                                var opacity = 0.75 - Math.abs(vDistance) / slider.height();

                                slider.css( { 'top': vDistance + 'px' } );
                                slider.css( { 'opacity': opacity } );

                                vSwipe = true;
                            }
                        }

                        hDistanceLast = hDistance;
                        hDistance = endCoords.pageX - startCoords.pageX;
                        hDistancePercent = hDistance * 100 / winWidth;

                        if ( ! hSwipe && ! vSwipe && Math.abs( hDistance ) >= hSwipMinDistance ) {
                            $( '#wcpr-swipebox-slider' ).css( {
                                '-webkit-transition' : '',
                                'transition' : ''
                            } );
                            hSwipe = true;
                        }

                        if ( hSwipe ) {

                            // swipe left
                            if ( 0 < hDistance ) {

                                // first slide
                                if ( 0 === index ) {
                                    // console.log( 'first' );
                                    $( '#wcpr-swipebox-overlay' ).addClass( 'leftSpringTouch' );
                                } else {
                                    // Follow gesture
                                    $( '#wcpr-swipebox-overlay' ).removeClass( 'leftSpringTouch' ).removeClass( 'rightSpringTouch' );
                                    $( '#wcpr-swipebox-slider' ).css( {
                                        '-webkit-transform' : 'translate3d(' + ( currentX + hDistancePercent ) +'%, 0, 0)',
                                        'transform' : 'translate3d(' + ( currentX + hDistancePercent ) + '%, 0, 0)'
                                    } );
                                }

                                // swipe right
                            } else if ( 0 > hDistance ) {

                                // last Slide
                                if ( elements.length === index +1 ) {
                                    // console.log( 'last' );
                                    $( '#wcpr-swipebox-overlay' ).addClass( 'rightSpringTouch' );
                                } else {
                                    $( '#wcpr-swipebox-overlay' ).removeClass( 'leftSpringTouch' ).removeClass( 'rightSpringTouch' );
                                    $( '#wcpr-swipebox-slider' ).css( {
                                        '-webkit-transform' : 'translate3d(' + ( currentX + hDistancePercent ) +'%, 0, 0)',
                                        'transform' : 'translate3d(' + ( currentX + hDistancePercent ) + '%, 0, 0)'
                                    } );
                                }

                            }
                        }
                    } );

                    return false;

                } ).bind( 'touchend',function( event ) {
                    event.preventDefault();
                    event.stopPropagation();

                    $( '#wcpr-swipebox-slider' ).css( {
                        '-webkit-transition' : '-webkit-transform 0.4s ease',
                        'transition' : 'transform 0.4s ease'
                    } );

                    vDistance = endCoords.pageY - startCoords.pageY;
                    hDistance = endCoords.pageX - startCoords.pageX;
                    hDistancePercent = hDistance*100/winWidth;

                    // Swipe to bottom to close
                    if ( vSwipe ) {
                        vSwipe = false;
                        if ( Math.abs( vDistance ) >= 2 * vSwipMinDistance && Math.abs( vDistance ) > Math.abs( vDistanceLast ) ) {
                            var vOffset = vDistance > 0 ? slider.height() : - slider.height();
                            slider.animate( { top: vOffset + 'px', 'opacity': 0 },
                                300,
                                function () {
                                    $this.closeSlide();
                                } );
                        } else {
                            slider.animate( { top: 0, 'opacity': 1 }, 300 );
                        }

                    } else if ( hSwipe ) {

                        hSwipe = false;

                        // swipeLeft
                        if( hDistance >= hSwipMinDistance && hDistance >= hDistanceLast) {

                            $this.getPrev();

                            // swipeRight
                        } else if ( hDistance <= -hSwipMinDistance && hDistance <= hDistanceLast) {

                            $this.getNext();
                        }

                    } else { // Top and bottom bars have been removed on touchable devices
                        // tap
                        if ( ! bars.hasClass( 'visible-bars' ) ) {
                            $this.showBars();
                            $this.setTimeout();
                        } else {
                            $this.clearTimeout();
                            $this.hideBars();
                        }
                    }

                    $( '#wcpr-swipebox-slider' ).css( {
                        '-webkit-transform' : 'translate3d(' + currentX + '%, 0, 0)',
                        'transform' : 'translate3d(' + currentX + '%, 0, 0)'
                    } );

                    $( '#wcpr-swipebox-overlay' ).removeClass( 'leftSpringTouch' ).removeClass( 'rightSpringTouch' );
                    $( '.wcpr-touching' ).off( 'touchmove' ).removeClass( 'wcpr-touching' );

                } );
            },

            /**
             * Set timer to hide the action bars
             */
            setTimeout: function () {
                if ( plugin.settings.hideBarsDelay > 0 ) {
                    var $this = this;
                    $this.clearTimeout();
                    $this.timeout = window.setTimeout( function() {
                            $this.hideBars();
                        },

                        plugin.settings.hideBarsDelay
                    );
                }
            },

            /**
             * Clear timer
             */
            clearTimeout: function () {
                window.clearTimeout( this.timeout );
                this.timeout = null;
            },

            /**
             * Show navigation and title bars
             */
            showBars : function () {
                var bars = $( '#wcpr-swipebox-top-bar, #wcpr-swipebox-bottom-bar' );
                if ( this.doCssTrans() ) {
                    bars.addClass( 'visible-bars' );
                } else {
                    $( '#wcpr-swipebox-top-bar' ).animate( { top : 0 }, 500 );
                    $( '#wcpr-swipebox-bottom-bar' ).animate( { bottom : 0 }, 500 );
                    setTimeout( function() {
                        bars.addClass( 'visible-bars' );
                    }, 1000 );
                }
            },

            /**
             * Hide navigation and title bars
             */
            hideBars : function () {
                var bars = $( '#wcpr-swipebox-top-bar, #wcpr-swipebox-bottom-bar' );
                if ( this.doCssTrans() ) {
                    bars.removeClass( 'visible-bars' );
                } else {
                    $( '#wcpr-swipebox-top-bar' ).animate( { top : '-50px' }, 500 );
                    $( '#wcpr-swipebox-bottom-bar' ).animate( { bottom : '-50px' }, 500 );
                    setTimeout( function() {
                        bars.removeClass( 'visible-bars' );
                    }, 1000 );
                }
            },

            /**
             * Animate navigation and top bars
             */
            animBars : function () {
                var $this = this,
                    bars = $( '#wcpr-swipebox-top-bar, #wcpr-swipebox-bottom-bar' );

                bars.addClass( 'visible-bars' );
                $this.setTimeout();

                $( '#wcpr-swipebox-slider' ).click( function() {
                    if ( ! bars.hasClass( 'visible-bars' ) ) {
                        $this.showBars();
                        $this.setTimeout();
                    }
                } );

                $( '#wcpr-swipebox-bottom-bar' ).hover( function() {
                    $this.showBars();
                    bars.addClass( 'visible-bars' );
                    $this.clearTimeout();

                }, function() {
                    if ( plugin.settings.hideBarsDelay > 0 ) {
                        bars.removeClass( 'visible-bars' );
                        $this.setTimeout();
                    }

                } );
            },

            /**
             * Keyboard navigation
             */
            keyboard : function () {
                var $this = this;
                $( window ).bind( 'keyup', function( event ) {
                    event.preventDefault();
                    event.stopPropagation();

                    if ( event.keyCode === 37 ) {

                        $this.getPrev();

                    } else if ( event.keyCode === 39 ) {

                        $this.getNext();

                    } else if ( event.keyCode === 27 ) {

                        $this.closeSlide();
                    }
                } );
            },

            /**
             * Navigation events : go to next slide, go to prevous slide and close
             */
            actions : function () {
                var $this = this,
                    action = 'touchend click'; // Just detect for both event types to allow for multi-input

                if ( elements.length < 2 ) {

                    $( '#wcpr-swipebox-bottom-bar' ).hide();

                    if ( undefined === elements[ 1 ] ) {
                        $( '#wcpr-swipebox-top-bar' ).hide();
                    }

                } else {
                    $( '#wcpr-swipebox-prev' ).bind( action, function( event ) {
                        event.preventDefault();
                        event.stopPropagation();
                        $this.getPrev();
                        $this.setTimeout();
                    } );

                    $( '#wcpr-swipebox-next' ).bind( action, function( event ) {
                        event.preventDefault();
                        event.stopPropagation();
                        $this.getNext();
                        $this.setTimeout();
                    } );
                }

                $( '#wcpr-swipebox-close' ).bind( action, function( event ) {
                    event.preventDefault();
                    event.stopPropagation();
                    $this.closeSlide();
                } );
            },

            /**
             * Set current slide
             */
            setSlide : function ( index, isFirst ) {

                isFirst = isFirst || false;

                var slider = $( '#wcpr-swipebox-slider' );

                currentX = -index*100;

                if ( this.doCssTrans() ) {
                    slider.css( {
                        '-webkit-transform' : 'translate3d(' + (-index*100)+'%, 0, 0)',
                        'transform' : 'translate3d(' + (-index*100)+'%, 0, 0)'
                    } );
                } else {
                    slider.animate( { left : ( -index*100 )+'%' } );
                }

                $( '#wcpr-swipebox-slider .slide' ).removeClass( 'current' );
                $( '#wcpr-swipebox-slider .slide' ).eq( index ).addClass( 'current' );
                this.setTitle( index );

                if ( isFirst ) {
                    slider.fadeIn();
                }

                $( '#wcpr-swipebox-prev, #wcpr-swipebox-next' ).removeClass( 'disabled' );

                if ( index === 0 ) {
                    $( '#wcpr-swipebox-prev' ).addClass( 'disabled' );
                } else if ( index === elements.length - 1 && plugin.settings.loopAtEnd !== true ) {
                    $( '#wcpr-swipebox-next' ).addClass( 'disabled' );
                }
            },

            /**
             * Open slide
             */
            openSlide : function ( index ) {
                $( 'html' ).addClass( 'wcpr-swipebox-html' );
                if ( isTouch ) {
                    $( 'html' ).addClass( 'wcpr-swipebox-touch' );

                    if ( plugin.settings.hideCloseButtonOnMobile ) {
                        $( 'html' ).addClass( 'wcpr-swipebox-no-close-button' );
                    }
                } else {
                    $( 'html' ).addClass( 'wcpr-swipebox-no-touch' );
                }
                $( window ).trigger( 'resize' ); // fix scroll bar visibility on desktop
                this.setSlide( index, true );
            },

            /**
             * Set a time out if the media is a video
             */
            preloadMedia : function ( index ) {
                var $this = this,
                    src = null;

                if ( elements[ index ] !== undefined ) {
                    src = elements[ index ].href;
                }

                if ( ! $this.isVideo( src ) ) {
                    setTimeout( function() {
                        $this.openMedia( index );
                    }, 1000);
                } else {
                    $this.openMedia( index );
                }
            },

            /**
             * Open
             */
            openMedia : function ( index ) {
                var $this = this,
                    src,
                    slide;

                if ( elements[ index ] !== undefined ) {
                    src = elements[ index ].href;
                }

                if ( index < 0 || index >= elements.length ) {
                    return false;
                }

                slide = $( '#wcpr-swipebox-slider .slide' ).eq( index );

                if ( ! $this.isVideo( src ) ) {
                    slide.addClass( 'slide-loading' );
                    $this.loadMedia( src, function() {
                        slide.removeClass( 'slide-loading' );
                        slide.html( this );

                        if ( plugin.settings.afterMedia ) {
                            plugin.settings.afterMedia( index );
                        }
                    } );
                } else {
                    slide.html( $this.getVideo( src ) );

                    if ( plugin.settings.afterMedia ) {
                        plugin.settings.afterMedia( index );
                    }
                }

            },

            /**
             * Set link title attribute as caption
             */
            setTitle : function ( index ) {
                var title = null;

                $( '#wcpr-swipebox-title' ).empty();

                if ( elements[ index ] !== undefined ) {
                    title = elements[ index ].title;
                }

                if ( title ) {
                    $( '#wcpr-swipebox-top-bar' ).show();
                    $( '#wcpr-swipebox-title' ).append( title );
                } else {
                    $( '#wcpr-swipebox-top-bar' ).hide();
                }
            },

            /**
             * Check if the URL is a video
             */
            isVideo : function ( src ) {

                if ( src ) {
                    if ( src.match( /(youtube\.com|youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/) || src.match( /vimeo\.com\/([0-9]*)/ ) || src.match( /youtu\.be\/([a-zA-Z0-9\-_]+)/ ) ) {
                        return true;
                    }

                    if ( src.toLowerCase().indexOf( 'swipeboxvideo=1' ) >= 0 ) {
                        return true;
                    }
                    src= src.toLowerCase().split('.');
                    if ( ['mp4','webm'].indexOf( src[src.length - 1]) > -1 ) {
                        return true;
                    }
                }
            },

            /**
             * Parse URI querystring and:
             * - overrides value provided via dictionary
             * - rebuild it again returning a string
             */
            parseUri : function (uri, customData) {
                var a = document.createElement('a'),
                    qs = {};

                // Decode the URI
                a.href = decodeURIComponent( uri );

                // QueryString to Object
                if ( a.search ) {
                    qs = JSON.parse( '{"' + a.search.toLowerCase().replace('?','').replace(/&/g,'","').replace(/=/g,'":"') + '"}' );
                }

                // Extend with custom data
                if ( $.isPlainObject( customData ) ) {
                    qs = $.extend( qs, customData, plugin.settings.queryStringData ); // The dev has always the final word
                }

                // Return querystring as a string
                return $
                    .map( qs, function (val, key) {
                        if ( val && val > '' ) {
                            return encodeURIComponent( key ) + '=' + encodeURIComponent( val );
                        }
                    })
                    .join('&');
            },

            /**
             * Get video iframe code from URL
             */
            getVideo : function( url ) {
                var iframe = '',
                    youtubeUrl = url.match( /((?:www\.)?youtube\.com|(?:www\.)?youtube-nocookie\.com)\/watch\?v=([a-zA-Z0-9\-_]+)/ ),
                    youtubeShortUrl = url.match(/(?:www\.)?youtu\.be\/([a-zA-Z0-9\-_]+)/),
                    vimeoUrl = url.match( /(?:www\.)?vimeo\.com\/([0-9]*)/ ),
                    qs = '';

                if ( youtubeUrl || youtubeShortUrl) {
                    if ( youtubeShortUrl ) {
                        youtubeUrl = youtubeShortUrl;
                    }

                    console.log( youtubeUrl );

                    qs = ui.parseUri( url, {
                        'autoplay' : ( plugin.settings.autoplayVideos ? '1' : '0' ),
                        'v' : ''
                    });
                    iframe = '<iframe width="560" height="315" src="https://' + youtubeUrl[1] + '/embed/' + youtubeUrl[2] + '?' + qs + '" frameborder="0" allowfullscreen></iframe>';

                } else if ( vimeoUrl ) {
                    qs = ui.parseUri( url, {
                        'autoplay' : ( plugin.settings.autoplayVideos ? '1' : '0' ),
                        'byline' : '0',
                        'portrait' : '0',
                        'color': plugin.settings.vimeoColor
                    });
                    iframe = '<iframe width="560" height="315"  src="//player.vimeo.com/video/' + vimeoUrl[1] + '?' + qs + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';

                } else {
                    iframe = '<video src="' + url + '" width="100%" controls></video>';
                    // iframe = '<iframe width="560" height="315" src="' + url + '" frameborder="0" allowfullscreen></iframe>';
                }

                return '<div class="wcpr-swipebox-video-container" style="max-width:' + plugin.settings.videoMaxWidth + 'px"><div class="wcpr-swipebox-video">' + iframe + '</div></div>';
            },

            /**
             * Load image
             */
            loadMedia : function ( src, callback ) {
                // Inline content
                if ( src.trim().indexOf('#') === 0 ) {
                    callback.call(
                        $('<div>', {
                            'class' : 'wcpr-swipebox-inline-container'
                        })
                            .append(
                                $(src)
                                    .clone()
                                    .toggleClass( plugin.settings.toggleClassOnLoad )
                            )
                    );
                }
                // Everything else
                else {
                    if ( ! this.isVideo( src ) ) {
                        var img = $( '<img>' ).on( 'load', function() {
                            callback.call( img );
                        } );

                        img.attr( 'src', src );
                    }
                }
            },

            /**
             * Get next slide
             */
            getNext : function () {
                var $this = this,
                    src,
                    index = $( '#wcpr-swipebox-slider .slide' ).index( $( '#wcpr-swipebox-slider .slide.current' ) );
                if ( index + 1 < elements.length ) {

                    src = $( '#wcpr-swipebox-slider .slide' ).eq( index ).contents().find( 'iframe' ).attr( 'src' );
                    $( '#wcpr-swipebox-slider .slide' ).eq( index ).contents().find( 'iframe' ).attr( 'src', src );
                    index++;
                    $this.setSlide( index );
                    $this.preloadMedia( index+1 );
                    if ( plugin.settings.nextSlide ) {
                        plugin.settings.nextSlide(index);
                    }
                } else {

                    if ( plugin.settings.loopAtEnd === true ) {
                        src = $( '#wcpr-swipebox-slider .slide' ).eq( index ).contents().find( 'iframe' ).attr( 'src' );
                        $( '#wcpr-swipebox-slider .slide' ).eq( index ).contents().find( 'iframe' ).attr( 'src', src );
                        index = 0;
                        $this.preloadMedia( index );
                        $this.setSlide( index );
                        $this.preloadMedia( index + 1 );
                        if ( plugin.settings.nextSlide ) {
                            plugin.settings.nextSlide(index);
                        }
                    } else {
                        $( '#wcpr-swipebox-overlay' ).addClass( 'rightSpring' );
                        setTimeout( function() {
                            $( '#wcpr-swipebox-overlay' ).removeClass( 'rightSpring' );
                        }, 500 );
                    }
                }
            },

            /**
             * Get previous slide
             */
            getPrev : function () {
                var index = $( '#wcpr-swipebox-slider .slide' ).index( $( '#wcpr-swipebox-slider .slide.current' ) ),
                    src;
                if ( index > 0 ) {
                    src = $( '#wcpr-swipebox-slider .slide' ).eq( index ).contents().find( 'iframe').attr( 'src' );
                    $( '#wcpr-swipebox-slider .slide' ).eq( index ).contents().find( 'iframe' ).attr( 'src', src );
                    index--;
                    this.setSlide( index );
                    this.preloadMedia( index-1 );
                    if ( plugin.settings.prevSlide ) {
                        plugin.settings.prevSlide(index);
                    }
                } else {
                    $( '#wcpr-swipebox-overlay' ).addClass( 'leftSpring' );
                    setTimeout( function() {
                        $( '#wcpr-swipebox-overlay' ).removeClass( 'leftSpring' );
                    }, 500 );
                }
            },
            /* jshint unused:false */
            nextSlide : function ( index ) {
                // Callback for next slide
            },

            prevSlide : function ( index ) {
                // Callback for prev slide
            },

            /**
             * Close
             */
            closeSlide : function () {
                $( 'html' ).removeClass( 'wcpr-swipebox-html' );
                $( 'html' ).removeClass( 'wcpr-swipebox-touch' );
                $( window ).trigger( 'resize' );
                this.destroy();
            },

            /**
             * Destroy the whole thing
             */
            destroy : function () {
                $( window ).unbind( 'keyup' );
                $( 'body' ).unbind( 'touchstart' );
                $( 'body' ).unbind( 'touchmove' );
                $( 'body' ).unbind( 'touchend' );
                $( '#wcpr-swipebox-slider' ).unbind();
                $( '#wcpr-swipebox-overlay' ).remove();

                if ( ! Array.isArray( elem ) ) {
                    elem.removeData( '_swipebox' );
                }

                if ( this.target ) {
                    this.target.trigger( 'wcpr-swipebox-destroy' );
                }

                $.swipebox.isOpen = false;

                if ( plugin.settings.afterClose ) {
                    plugin.settings.afterClose();
                }
            }
        };

        plugin.init();
    };

    $.fn.swipebox = function( options ) {

        if ( ! $.data( this, '_swipebox' ) ) {
            var swipebox = new $.swipebox( this, options );
            this.data( '_swipebox', swipebox );
        }
        return this.data( '_swipebox' );

    };

}( window, document, jQuery ) );