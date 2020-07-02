(function($){
    $(".cat-search").change(function(){
        var cat_id = $(this).val();
        var select = this;
        $.ajax({
                type:"POST",
                url: the_ajax_script.ajaxurl,
                data: {"action":"search_cat", "cat_id":cat_id},
                dataType : 'json',
                  success: function (response) {
                  console.log(response);
                      var error = response.error;
                      if(error){
                          console.log("nothing"); 
                          $("select[name=sub_cat]").addClass("hide");
                          $("select[name=sub_sub_cat]").addClass("hide");
                          $(".hide").html('');
                      }
                      else{
                        
                           $(select).next().removeClass("hide");
                           $(select).next().html("");
                            $.each(response, function (i, item) {
                                $(select).next().append($('<option>', { 
                                    value: item.value,
                                    text : item.name 
                                }));
                            });
                        
                      }
                },
                    error: function (errorThrown) {
                       alert('error');
                        console.log(errorThrown);
                    },
            });
    })
  
})(jQuery)