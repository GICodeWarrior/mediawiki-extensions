(function($) {
    var PATH = "../wp-content/plugins/wp-photocommons";

    function addButtons() {
        $("#media-buttons").append(''.concat(
            '<a id="photocommons-add" title="Afbeeldingen invoegen van Wikimedia Commons" style="padding-left:4px;">',
            '<img src="' + PATH + '/img/button.png"/>',
            '</a>'
        ));

        $("#photocommons-add").live('click', function(e) {
            e.preventDefault();

            $("body").prepend('<div id="photocommons-dialog"></div>');
            $("#photocommons-dialog").load(PATH + "/search.php?standalone=1", function() {
                Photocommons.init();

                var $self = $("#photocommons-dialog");

                $self.dialog({
                	title : 'Photocommons - Afbeelingen invoegen van Wikimedia Commons',
                    width : 800,
                    height : 500
                });

                $("#wp-photocommons-images img").live('click', function() {
                    var file = $(this).attr('data-filename'),
                        shortcode = '[photocommons file="' + file + '" size="300"]' + "\n";

                    // Depending on whether we are in Wysiwyg or HTML mode we
                    // do a different insert
                    if ($("#edButtonHTML").hasClass('active')) {
                        // HTML editor
                        cnt = $("#content").val();
                        $("#content").val( + cnt);
                    } else {
                        // Wysiwyg
                        tinyMCE.execCommand('mceInsertContent', false, shortcode);
                    }

                    $self.dialog('close');
                });
            });
        });
    }

    $(document).ready(function() {
        addButtons();
    });

})(jQuery);