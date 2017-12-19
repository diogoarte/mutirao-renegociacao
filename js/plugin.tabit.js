/**
 * TabIt jQuery Plugin
 * 
 * Application Type: Content-Tansformer
 * Author: Julian Burr
 * Version: 1.0
 * Date: 27/05/2015
 *
 * Description:
 * 		Transforms selected elements into nice tab slider
 *		Lets you configure animations and more
 **/

(function ( $ ) {
 
    $.fn.tabIt = function( options ) {
 
 		// General settings
        var settings = $.extend({
			get_tab_label : getTabLabel,
			tab_label_attr : "data-tab-title",
			open_tab_animation : null,
			animation_duration : 300,
			auto_open_tab : null
        }, options );
		
		var id = null,
			first_element = this.first(),
			wrap_all = null,
			wrap_tabs = null,
			wrap_contents = null,
			tab_cnt = 0,
			tab_active = null,
			tab_slides = false,
			marginleft = 0;
			
		function getTabLabel(element){
			// Default function to get the label for tab section
			// Can be overwritten in setting get_tab_label
			var label = element.attr(settings.tab_label_attr);
			return label;
		}
		
		function init(){
			// Initializes tab group
			
			// Create unique group id by counting existing groups and increasing by one
			id = $(".wrap-tabgroup").length + 1;
			
			// Add new groups wrap elements before first element that should be tabbed
			first_element.before("<div class='wrap-tabgroup' id='tabgroup-" + id + "'><div class='wrap-tabs'><div class='wrap-tabs-overlay-left'></div><div class='wrap-tabs-overlay-right'></div><div class='tabs'></div></div><div class='wrap-tab-contents'><div class='tab-contents'></div></div></div>");
			
			// Set up global selectors for this tabgroup
			wrap_all = $("#tabgroup-" + id);
			wrap_tabs = $("#tabgroup-" + id + " .tabs");
			wrap_contents = $("#tabgroup-" + id + " .tab-contents");
			
			// Add event listener
			var slide_interval,
				touchstart,
				touchmove,
				touchmargin;
			wrap_all.find(".wrap-tabs").on("mouseover", function(){
				// Show only valid slide navigators
				showTabSliders();
			}).on("mouseout", function(){
				// Hide slide navigators when mouse leaves tabs
				$(this).find(".wrap-tabs-overlay-left, .wrap-tabs-overlay-right").hide();
			}).on("touchstart", function(e){
				// Touch event fired
				// => mobile device, disable mouseover events
				$(this).unbind('mouseover');
				$(this).find(".wrap-tabs-overlay-left, .wrap-tabs-overlay-right").hide();
				// Save touchposition
				touchstart = e.originalEvent.touches[0].pageX;
				touchmargin = marginleft
			}).on("touchmove", function(e){
				// Calculate touch movement and scroll tabs acordingly
				touchmove = e.originalEvent.touches[0].pageX;
				marginleft = touchmargin + (touchmove - touchstart);
				getValidMargin();
				// Remove transitions to make tabs stick to finger
				wrap_tabs.css({
					"transition":"none",
					"left":marginleft
				});
			}).on("touchend", function(){
				// Reset tab transitions
				wrap_tabs.css({ "transition":"" })
			});
			// Show / Hide tab sliders
			showTabSliders()
			// Init sliding events
			wrap_all.find(".wrap-tabs-overlay-left, .wrap-tabs-overlay-right").mousedown(function(){
				// Handle click on slide navigators
				if(tab_slides){
					var clicked = $(this);
					var speed = 25;	
					// Reverse speed for right slider
					if(clicked.hasClass("wrap-tabs-overlay-right")){
						speed = speed * -1;
					}
					// Slide in interval to enable click hold
					slide_interval = setInterval(function(){
						marginleft += speed;
						var changed = getValidMargin()
						// Use transitions for animation (faster than jQuery!)
						wrap_tabs.css({
							"left":marginleft,
							"transition":"left 0.2s linear"
						});
						// Reset CSS settings
						wrap_tabs.css({ "transitions":"" });
						showTabSliders()
						if(changed){
							clearInterval(slide_interval);
						}
					}, 200);
				}
			}).mouseup(function(){
				// Clear sliding interval
				clearInterval(slide_interval);
			});
		}
		
		function getValidMargin(){
			// Check if set margin is valid or not
			// Return if margin got changed
			if(marginleft >= 0){
				marginleft = 0;
				return true;
			} else if(marginleft <= (wrap_tabs.width() - wrap_all.find(".wrap-tabs").width()) * -1){
				marginleft = (wrap_tabs.width() - wrap_all.find(".wrap-tabs").width()) * -1;
				return true;
			}
			return false;
		}
		
		function showTabSliders(){
			// Hide sliders
			wrap_all.find(".wrap-tabs-overlay-left, .wrap-tabs-overlay-right").hide();
			console.log('showTabSliders', tab_slides, marginleft);
			if(tab_slides){
				// If tabs slide and conditions are right, show slider
				if(marginleft < 0){
					wrap_all.find(".wrap-tabs-overlay-left").show();
				}
				if(marginleft > (wrap_tabs.width() - wrap_all.find(".wrap-tabs").width()) * -1){
					wrap_all.find(".wrap-tabs-overlay-right").show();
				}
			}
		}
		
		function initTabs(){
			// Initialize tabs slider structure
			var total_width = 0;
			wrap_tabs.find(".tab").each(function(){
				total_width += $(this).outerWidth(true);
			});
			wrap_tabs.width(total_width);
			// FIX mobile browser bug with width offset
			while(wrap_tabs.outerHeight(true) > wrap_tabs.find(".tab:first").outerHeight(true)){
				total_width++;
				wrap_tabs.width(total_width);
			}
			wrap_all.find(".wrap-tabs").css({ "overflow":"hidden" });
			// Check if tabs are wider than their container and must therefore be slideable
			tab_slides = false;
			if(total_width > wrap_all.find(".wrap-tabs").width()){
				tab_slides = true;
			}
			// Initialize tabs for the currently set type of animation
			wrap_all.find(".wrap-tab-contents").css({ "width":"" }).width(wrap_all.find(".wrap-tab-contents").width()).css({ "overflow":"hidden" });
			switch(settings.open_tab_animation){
				case "slide" :
					// Create slide show container
					wrap_all.find(".tab-content").each(function(){ $(this).width($(this).width()).css({ "float":"left" }); });
					wrap_all.find(".tab-contents").width(wrap_all.find(".tab-content").width() * wrap_all.find(".tab-content").length);
					break;
				case "fly" : // use default structure
				case "fade" : // use default structure
				case "none" : // use default structure
				default :
					// Default setup
					wrap_all.find(".tab-content").each(function(){
						$(this).css({ "width":"" }).width($(this).width()).css({ "float":"left" }).hide(); 
					});
					break;
			}
			
			// Bind click event to tabs
			wrap_all.on("click", ".tab", function(){
				if($(this).hasClass("tab-active")){
					// Tab already active
					// => do nothing (to avoid unneccessary animations)
					return;
				}
				openTab($(this).attr("rel"));
			});
			
			if(settings.auto_open_tab){
				// If tab to be opened is defined in the settings, open this tab
				openTab(settings.auto_open_tab);
			} else {
				// Otherwise open first tab
				openTab(wrap_all.find(".tab").first().attr("rel"));
			}
		}
		
		function openTab(id){
			// Open tab
			tab_active = id;
			console.log('set tab_active', tab_active)
			// => just a handler that refers to the animation from the settings
			switch(settings.open_tab_animation){
				case "slide" : openTabSlide(id); break;
				case "fly" : openTabFly(id); break;
				case "fade" : openTabFade(id); break;
				default : openTabPlain(id); break;
			}
			// If tabs are sliding, center activated tab
			if(tab_slides){
				var tabobj = $(".tab[rel=" + id + "]");
				var tableft = tabobj.position().left;
				var tabwidth = tabobj.width();
				var tabswidth = wrap_all.find(".wrap-tabs").width();
				marginleft = (tableft - ( ( tabswidth-tabwidth ) / 2 )) * -1;
				getValidMargin();
				wrap_tabs.css({ "left":marginleft + "px" });
			} else {
				marginleft = 0;
				wrap_tabs.css({ "left":marginleft + "px" });
			}
		}
		
		function openTabSlide(id){
			// Open tab as a slideshow
			// Determine objects
			var tabobj = $(".tab[rel=" + id + "]");
			var contentobj = $("#" + id);
			// If no content object found, return without doing anything
			if(contentobj.length < 1) return;
			// Remove active class from currently active tab
			wrap_all.find(".tab").removeClass("tab-active");
			// Add to destination tab
			tabobj.addClass("tab-active");
			// Animate content wrapper to destinate position to show requested tab
			wrap_all.find(".tab-contents").animate({ "margin-left":"-" + contentobj.position().left + "px" });
		}
		
		function openTabFly(id){
			// Open tab flying in from the side
			// Determine objects
			var tabobj = $(".tab[rel=" + id + "]");
			var contentobj = $("#" + id);
			var activeobj = getCurrentTabContent();
			// Remove active class from currently active tab
			wrap_all.find(".tab").removeClass("tab-active");
			// Add to destination tab
			tabobj.addClass("tab-active");
			// Slide active content out of sight
			if(activeobj.length > 0){
				activeobj.animate({ "margin-left":"-" + activeobj.width() + "px" }, settings.animation_duration, function(){
					// And fly requested content in afterwards
					activeobj.hide().css({ "margin-left":"" });
					contentobj.css({ "margin-left":contentobj.width() + "px" }).show().animate({ "margin-left":0 }, settings.animation_duration);
					
				});
			} else {
				contentobj.css({ "margin-left":contentobj.width() + "px" }).show().animate({ "margin-left":0 }, settings.animation_duration);
			}
		}
		
		function openTabFade(id){
			// Open tab through fadeOut/fadeIn animation
			// Determine objects
			var tabobj = $(".tab[rel=" + id + "]");
			var contentobj = $("#" + id);
			var activeobj = getCurrentTabContent();
			// Remove active class from currently active tab
			wrap_all.find(".tab").removeClass("tab-active");
			// Add to destination tab
			tabobj.addClass("tab-active");
			// Fade currently active tab out
			activeobj.fadeOut(settings.animation_duration);
			// And fade requested tab in at the same time
			contentobj.css({ "position":"absolute", "top":0, "left":0 }).fadeIn(settings.animation_duration, function(){
				// Set position to relative afterwards to get back to origin setup
				contentobj.css({ "position":"relative", "top":"", "left":"" });
			});
		}
		
		function openTabPlain(id){
			// Open tab by plainly show the requested tab and hide all the others => no animation
			// Determine objects
			var tabobj = $(".tab[rel=" + id + "]");
			var contentobj = $("#" + id);
			var activeobj = getCurrentTabContent();
			// Remove active class from currently active tab
			wrap_all.find(".tab").removeClass("tab-active");
			// Add to destination tab
			tabobj.addClass("tab-active");
			// Hide active tab
			activeobj.hide();
			// Show requested tab
			contentobj.show();
		}
		
		function getCurrentTabContent(){
			// Returns currently active tabs content object
			var id = wrap_all.find(".tab-active").attr("rel");
			return $("#" + id);
		}
		
		// Initiate Tabgroup
		init();
		
		this.each(function(){
			
			// Increase tab counter and create unique tab id
			tab_cnt++;
			var tab_id = "tab-" + id + "-" + tab_cnt;
			
			// Add tab to tabgroup container
			wrap_tabs.append("<div class='new-tab' rel='" + tab_id + "'></div>");
			$(".new-tab").append("<span class='label'>" + settings.get_tab_label($(this)) + "</span>").removeClass("new-tab").addClass("tab"); 
			
			// Add tab content by cloning selected element
			wrap_contents.append("<div class='new-tab-content' id='" + tab_id + "'></div>");
			$(".new-tab-content").append($(this).children().clone(true)).removeClass("new-tab-content").addClass("tab-content");
			
			// Remove original selected element from DOM after cloning
			$(this).remove();
			
		});
		
		// Initiate Tabs after creating them
		initTabs();
		
		$(window).resize( function(){
			var active = tab_active;
			initTabs();
			openTab(active);
		});
		
	};
 
}( jQuery ));