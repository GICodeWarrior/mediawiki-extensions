(function($) {
    var PATH = "../wp-content/plugins/wp-photocommons";

    function addButtons() {
        $("#media-buttons").append(''.concat(
            '<a id="photocommons-add" title="Add a free image" style="padding-left:4px;">',
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
                	title : 'Photocommons - Insert images from Wikimedia Commons',
                    width : 800,
                    height : 500
                });

                $("#wp-photocommons-images img").live('click', function() {
                    var file = $(this).attr('data-filename'),
                        cnt = $("#content").val();

                    $("#content").val('[photocommons file="' + file + '" size="300"]' + cnt);
                    $self.dialog('close');
                });
            });
        });
    }

    $(document).ready(function() {
        addButtons();
    });

})(jQuery);