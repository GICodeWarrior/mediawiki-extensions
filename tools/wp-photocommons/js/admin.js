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
            $("#photocommons-dialog").load(PATH + "/search.php", function(html) {
                var $self = $("#photocommons-dialog");
                $self.dialog();
                $self.find("button").click(function() {
                    var cnt = $("#content").val();
                    $("#content").val('<marquee>hoi</marquee>' + cnt);
                    $self.dialog('close');
                });
            });
        });
    }

    $(document).ready(function() {
        addButtons();
    });

})(jQuery);