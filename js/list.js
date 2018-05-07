function test() {
    $.ajax({
        type: "post", dataType: "json",
        cache: false, async: true,
        url: "/php/ajax.php",
        data: {'test': 'test fucker'},
        success: function(response) {
            console.log(response);
            $.each(response, function(i, val) {
                $("body").append(val.toString());
                if (val.meso_id != null) {
                    if (!$("div.macro#" + val.macro_id).length) {
                        $("div.test").append("<div class='macro' id='" + val.macro_id + "'>Month:" + val.macro_id +"</div>");    
                    }
                    $("div.macro#" + val.macro_id).append("<div class='meso'>" + val.meso_name + "</div>");
                } else {
                    if (!$("div.macro#" + val.macro_id).length) {
                        $("div.test").append("<div class='macro' id='" + val.macro_id + "'>Month:" + val.macro_id +"</div>");    
                    }
                }
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
}