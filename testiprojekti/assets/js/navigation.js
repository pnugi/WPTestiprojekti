/*
* Main navigation js
* ----------------------
* Add support for 2 & 3 level accessible menus for the wordpress default menu walker.
*/

(( $ ) => {

  /*
  * Level 2
  */

  // Add submenu toggle buttons for lvl 2 items
  $('#main-navigation > ul > .menu-item-has-children > a').after('<button aria-expanded="false" aria-label="Laajenna" class="toggle-sub second"><i class="open close" aria-hidden="true"></i></button>');

  // when mouse enters lvl 2 toggle item -> show menu
  $('#main-navigation > ul > .menu-item-has-children').on('mouseenter', function () {
    if(!$(this).children('.toggle-sub').hasClass('expanded')) {
      hideAllSubMenus();
      showSubSubMenu($(this));
    }
  });

  // when mouse leaves lvl 2 toggle item -> hide menu
  $('#main-navigation > ul > .menu-item-has-children').on('mouseleave', function () {
    if($(this).children('.toggle-sub').hasClass('expanded')) {
      hideAllSubMenus();
    }
  });

  // When clicked lvl 2 toggle button
  $('.toggle-sub.second').click(function() {
		// If clicked submenu is not open -> Close others submenus & show submenu
		if(!$(this).hasClass('expanded')) {
			hideAllSubMenus();
			showSubMenu($(this));
		} else { // If clicked submenu is already open -> hide it
			hideAllSubMenus();
		}
	});

  /*
  * Level 3
  */

  // Add submenu toggle buttons for lvl 3 items
  $('#main-navigation .sub-menu .menu-item-has-children > a').after('<button aria-expanded="false" aria-label="Laajenna" class="toggle-sub third"><i class="open close" aria-hidden="true"></i></button>');

  // when mouse enters lvl 3 toggle item -> show menu
  $('#main-navigation .sub-menu .menu-item-has-children').on('mouseenter', function () {
    if(!$(this).children('.toggle-sub').hasClass('expanded')) {
      hideAllSubSubMenus();
      showSubSubMenu($(this));
    }
  });

  // when mouse leaves lvl 3 toggle item -> hide menu
  $('#main-navigation .sub-menu .menu-item-has-children').on('mouseleave', function () {
    if($(this).children('.toggle-sub').hasClass('expanded')) {
      hideAllSubSubMenus();
    }
  });

  // When clicked lvl 3 toggle button
	$('.toggle-sub.third').click(function() {
		// If clicked submenu is not open -> Close other 3 lvl submenus & show submenu
		if(!$(this).hasClass('expanded')) {
			hideAllSubSubMenus();
			showSubMenu($(this));
		} else { // If clicked submenu is already open -> hide it
			hideAllSubSubMenus();
		}
	});

  /*
  * Helper functions for menu toggling
  */

  function showSubMenu(object) {
    $(object).siblings('.sub-menu').toggleClass('active');
    $(object).children('i').toggleClass('open');
    $(object).attr("aria-expanded", "true");
    $(object).attr("aria-label", "Piilota");
    $(object).addClass("expanded");
  }

  function showSubSubMenu(object) {
    $(object).children('.sub-menu').toggleClass('active');
    $(object).children().children('i').toggleClass('open');
    $(object).children('.toggle-sub').attr("aria-expanded", "true");
    $(object).children('.toggle-sub').attr("aria-label", "Piilota");
    $(object).children('.toggle-sub').addClass("expanded");
  }

  function hideAllSubMenus() {
    $('#main-navigation .sub-menu').removeClass('active');
    $('#main-navigation .toggle-sub i').addClass('open');
    $('#main-navigation .toggle-sub').removeClass("expanded");
    $('#main-navigation .toggle-sub').attr("aria-expanded", "false");
    $('#main-navigation .toggle-sub').attr("aria-label", "Laajenna");
  }
  
  function hideAllSubSubMenus() {
    $('#main-navigation .sub-menu .sub-menu').removeClass('active');
    $('#main-navigation .sub-menu .toggle-sub i').addClass('open');
    $('#main-navigation .sub-menu .toggle-sub').removeClass("expanded");
    $('#main-navigation .sub-menu .toggle-sub').attr("aria-expanded", "false");
    $('#main-navigation .sub-menu .toggle-sub').attr("aria-label", "Laajenna");
  }

  // Hide all submenus if users click anything outside of the menubar
	const target = document.querySelector('#main-navigation');
	document.addEventListener('click', (event) => {
	  const withinBoundaries = event.composedPath().includes(target)
	  if (!withinBoundaries) {
	   	hideAllSubMenus();
	  }
	});

  // Mobile menu toggle. On click -> show menu
	$('.menu-toggle').click(function() {
		$('#main-navigation').slideToggle(200);
	});

} )( jQuery );
