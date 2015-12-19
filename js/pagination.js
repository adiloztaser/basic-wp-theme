$(document).ready(function(){
     $.ajaxSetup({cache:false});
     var pagenumber = 2;
      $(".pagination").click(function(){
        jQuery('.spinner').css("display","block");
        jQuery('.lazyload').append(jQuery('<ul class="page post-list" id="p' + pagenumber + '">').load('/wp/?paged='+pagenumber+ '/ .page > *', function(responseText, textStatus, XMLHttpReques) {

           if($("#p"+pagenumber).html().length == 0)
           {
             $('.pagination').css('display', 'none');
             $('#p'+pagenumber).remove();
           }
           else {

                    pagenumber++;
           }
                  }));
        jQuery('.spinner').css('display', 'none');
      });
});
