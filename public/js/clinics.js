(function($){
    $(document).ready(function(){
        // maxLength also needs to be changed in the description view file
        var maxLength = 600;

        $(".currentChars").text($(".description").val().length);

        if($(".description").val().length > maxLength){
            $(".text-muted").addClass('danger');
            $(".multi-submit").attr("disabled", true);

        }else{
            $(".text-muted").removeClass('danger');
            $(".multi-submit").prop("disabled", false);
        }

        $(".description").keyup(function(){
            var length = $(this).val().length;

            $(".currentChars").text(length);

            if(length > maxLength){
                $(".text-muted").addClass('danger');
                $(".multi-submit").attr("disabled", true);

            }else{
                $(".text-muted").removeClass('danger');
                $(".multi-submit").prop("disabled", false);
            }
        })

        // Sort Select boxes alphabetically
        var options = $("[name='category_id'] option");
        var arr = options.map(function (_, o) {
            return {t: $(o).text(), v: o.value};
        }).get();
        arr.sort(function (o1, o2) {
            return o1.t > o2.t ? 1 : o1.t < o2.t ? -1 : 0;
        });
        options.each(function (i, o) {
            o.value = arr[i].v;
            $(o).text(arr[i].t);
        });
    })
})(jQuery);