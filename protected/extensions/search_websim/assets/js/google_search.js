$(document).ready(function() {
    console.log('url: ' + document.URL);
    var config = {
        siteURL: document.URL, // Change this to your site
        searchSite: true,
        type: 'web',
        append: true,
        perPage: 8, // A maximum of 8 is allowed by Google
        page: 0				// The start page
    }

    // The small arrow that marks the active search icon:
    var arrow = $('<span>', {className: 'arrow'}).appendTo('ul.icons');

    $('ul.icons li').click(function() {
        var el = $(this);

        if (el.hasClass('active')) {
            // The icon is already active, exit
            return false;
        }

        el.siblings().removeClass('active');
        el.addClass('active');

        // Move the arrow below this icon
        arrow.stop().animate({
            left: el.position().left,
            marginLeft: (el.width() / 2) - 4
        });

        // Set the search type
        config.type = el.attr('data-searchType');
        $('#more').fadeOut();
    });

    // Adding the site domain as a label for the first radio button:
    $('#siteNameLabel').append(' ' + config.siteURL);

    // Marking the Search tutorialzine.com radio as active:
    $('#searchSite').click();

    // Marking the web search icon as active:
    $('li.web').click();

    // Focusing the input text box:
    $('#txtSearch').focus();

    $('#search-form').submit(function() {
        googleSearch();
        return false;
    });

    $('#searchSite,#searchWeb').change(function() {
        // Listening for a click on one of the radio buttons.
        // config.searchSite is either true or false.

        config.searchSite = this.id == 'searchSite';
    });


    function googleSearch(settings) {

        // If no parameters are supplied to the function,
        // it takes its defaults from the config object above:

        settings = $.extend({}, config, settings);
        settings.term = settings.term || $('#txtSearch').val();

        if (settings.searchSite) {
            // Using the Google site:example.com to limit the search to a
            // specific domain:
            settings.term = 'site:' + settings.siteURL + ' ' + settings.term;
        }

        // URL of Google's AJAX search API
        var apiURL = 'http://ajax.googleapis.com/ajax/services/search/' + settings.type + '?v=1.0&callback=?';
//		var resultsDiv = $('#resultsDiv');
        var resultsDiv = $('#col_main');

        $.getJSON(apiURL, {q: settings.term, rsz: settings.perPage, start: settings.page * settings.perPage}, function(r) {

            var results = r.responseData.results;
            $('#more').remove();
            resultsDiv.empty();// clear div>id(container)
            console.log('3: ' + results.length);
            if (results.length) {

                // If results were returned, add them to a pageContainer div,
                // after which append them to the #resultsDiv:

                var pageContainer = $('<div>', {className: 'pageContainer', class: 'page pageborder white clearfix'});
                var cursor = r.responseData.cursor;
                console.log('4: estimatedResultCount=' + cursor.estimatedResultCount);
                var txt_total = '<p class="total-search"><b>พบจำนวนทั้งหมด:</b> ' + cursor.estimatedResultCount + ' <b>รายการ</b></p>';
                pageContainer.append(txt_total);
                for (var i = 0; i < results.length; i++) {
                    // Creating a new result object and firing its toString method:
                    pageContainer.append(new result(results[i]) + '');
                }

                if (!settings.append) {
                    // This is executed when running a new search, 
                    // instead of clicking on the More button:
                    resultsDiv.empty();
                }

                pageContainer.append('<div class="clear"></div>')
                        .hide().appendTo(resultsDiv)
                        .fadeIn('slow');


                // Checking if there are more pages with results, 
                // and deciding whether to show the More button:

                if (+cursor.estimatedResultCount > (settings.page + 1) * settings.perPage) {
                    $('<div>', {id: 'more'}).appendTo(resultsDiv).click(function() {
                        googleSearch({append: true, page: settings.page + 1});
                        $(this).fadeOut();
                    });
                }
            }
            else {
                // No results were found for this search.
//                resultsDiv.empty();//ย้ายไปไว้ก่อนหน้า
                $('<div>', {
                    className: 'notFound',
                    class: 'notFound page pageborder white clearfix',
                    html: '<div class="error">ไม่พบข้อมูล!!</div>'
                }).hide().appendTo(resultsDiv).fadeIn();
            }
        });
    }

    function result(r) {

        // This is class definition. Object of this class are created for
        // each result. The markup is generated by the .toString() method.

        var arr = [];

        // GsearchResultClass is passed by the google API
        switch (r.GsearchResultClass) {

            case 'GwebSearch':
                arr = [
                    '<div class="webResult web">',
                    '<h2><a href="', r.unescapedUrl, '" target="_blank">', r.title, '</a></h2>',
                    '<p>', r.content, '</p>',
                    '<a href="', r.unescapedUrl, '" target="_blank">', r.url, '</a>',
                    '</div>'
                ];
                break;
            case 'GimageSearch':
                arr = [
                    '<div class="imageResult">',
                    '<a target="_blank" href="', r.unescapedUrl, '" title="', r.titleNoFormatting, '" class="pic" style="width:', r.tbWidth, 'px;height:', r.tbHeight, 'px;">',
                    '<img src="', r.tbUrl, '" width="', r.tbWidth, '" height="', r.tbHeight, '" /></a>',
                    '<div class="clear"></div>', '<a href="', r.originalContextUrl, '" target="_blank">', r.visibleUrl, '</a>',
                    '</div>'
                ];
                break;
            case 'GvideoSearch':
                arr = [
                    '<div class="imageResult">',
                    '<a target="_blank" href="', r.url, '" title="', r.titleNoFormatting, '" class="pic" style="width:150px;height:auto;">',
                    '<img src="', r.tbUrl, '" width="100%" /></a>',
                    '<div class="clear"></div>', '<a href="', r.originalContextUrl, '" target="_blank">', r.publisher, '</a>',
                    '</div>'
                ];
                break;
            case 'GnewsSearch':
                arr = [
                    '<div class="webResult news">',
                    '<h2><a href="', r.unescapedUrl, '" target="_blank">', r.title, '</a></h2>',
                    '<p>', r.content, '</p>',
                    '<a href="', r.unescapedUrl, '" target="_blank">', r.publisher, '</a>',
                    '</div>'
                ];
                break;
        }

        // The toString method.
        this.toString = function() {
            return arr.join('');
        }
    }


});
