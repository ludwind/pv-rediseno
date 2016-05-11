	/////////////////// Audio scroll persistent bar //////////////////////////	
	
var $document = $(document);

  $document.scroll(function() {
    if ($document.scrollTop() >= 800) {
      $('.reproductor').addClass('reproductor-top');
    } else {
      $('.reproductor').removeClass('reproductor-top');
    }
  });

	
 	/////////////////// reproductor //////////////////////////	
   
$(function() {
		// Setup the player to autoplay the next track
		var a = audiojs.createAll({
			trackEnded: function() {
				var next = $('ol li.playing').next();
				if (!next.length) next = $('ol li').first();
				next.addClass('playing').siblings().removeClass('playing');
				audio.load($('a', next).attr('data-src'));
				audio.play();
			}
		});

		// Load in the first track
		var audio = a[0];
				first = $('ol a').attr('data-src');
		$('ol li').first().addClass('playing');
		audio.load(first);

		// Load in a track on click
		$('ol li').click(function(e) {
			e.preventDefault();
			$(this).addClass('playing').siblings().removeClass('playing');
			audio.load($('a', this).attr('data-src'));
			audio.play();
		});
		// Keyboard shortcuts
		$(document).keydown(function(e) {
			var unicode = e.charCode ? e.charCode : e.keyCode;
				// right arrow
			if (unicode == 39) {
				var next = $('li.playing').next();
				if (!next.length) next = $('ol li').first();
				next.click();
				// back arrow
			} else if (unicode == 37) {
				var prev = $('li.playing').prev();
				if (!prev.length) prev = $('ol li').last();
				prev.click();
				// spacebar
			} else if (unicode == 32) {
				audio.playPause();
			}
		})
	});


	/////////////////// checkbox //////////////////////////

	$("#checkAll").on("change", function() {
        $(':checkbox').not(this).prop('checked', this.checked);
      });

      $(":checkbox").on("change", function(){
        var audiosEscuchados = {};
        $(":checkbox").each(function(){
          audiosEscuchados[this.id] = this.checked;
        });
        $.cookie('audiosEscuchados', audiosEscuchados, { expires: 900 })
      });

      function repopulateCheckboxes(){
        var audiosEscuchados = $.cookie('audiosEscuchados');
        if(audiosEscuchados){
          Object.keys(audiosEscuchados).forEach(function(element) {
            var checked = audiosEscuchados[element];
            $("#" + element).prop('checked', checked);
          });
        }
      }

      $.cookie.json = true;
      repopulateCheckboxes();

////////////////////////////// Tabs Script ///////////////////////////////////////


var tabLinks = new Array();
var contentDivs = new Array();

function init() {

	// Grab the tab links and content divs from the page
	var tabListItems = document.getElementById('tabs').childNodes;
	for ( var i = 0; i < tabListItems.length; i++ ) {
		if ( tabListItems[i].nodeName == "LI" ) {
			var tabLink = getFirstChildWithTagName( tabListItems[i], 'A' );
			var id = getHash( tabLink.getAttribute('href') );
			tabLinks[id] = tabLink;
			contentDivs[id] = document.getElementById( id );
		}
	}

	// Assign onclick events to the tab links, and
	// highlight the first tab
	var i = 0;

	for ( var id in tabLinks ) {
		tabLinks[id].onclick = showTab;
		tabLinks[id].onfocus = function() { this.blur() };
		if ( i == 0 ) tabLinks[id].className = 'selected';
		i++;
	}

	// Hide all content divs except the first
	var i = 0;

	for ( var id in contentDivs ) {
		if ( i != 0 ) contentDivs[id].className = 'tabContent hide';
		i++;
	}
}

function showTab() {
	var selectedId = getHash( this.getAttribute('href') );

	// Highlight the selected tab, and dim all others.
	// Also show the selected content div, and hide all others.
	for ( var id in contentDivs ) {
		if ( id == selectedId ) {
			tabLinks[id].className = 'selected';
			contentDivs[id].className = 'tabContent';
		} else {
			tabLinks[id].className = '';
			contentDivs[id].className = 'tabContent hide';
		}
	}

	// Stop the browser following the link
	return false;
}

function getFirstChildWithTagName( element, tagName ) {
	for ( var i = 0; i < element.childNodes.length; i++ ) {
		if ( element.childNodes[i].nodeName == tagName ) return element.childNodes[i];
	}
}

function getHash( url ) {
	var hashPos = url.lastIndexOf ( '#' );
	return url.substring( hashPos + 1 );
}

//]]>