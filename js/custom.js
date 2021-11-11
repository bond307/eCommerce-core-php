$('#myModal').modal('show');
  
//add to card 
    $(document).ready(function(){
        $(".cart").click(function(e){
            e.preventDefault();
            var $form = $(this).closest(".form");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pprice = $form.find(".pprice").val();
            var pimg = $form.find(".pimg").val();
            var ppinvoice = $form.find(".ppinvoice").val();
            var user_id = $form.find(".user_id").val();
            var Qty = $form.find(".Qty").val();
            
            
            //size 
            var size = [];
            
         
            $(".size").each(function(){
                if($(this).is(":checked")){
                    size.push($(this).val() );
                   }
            });
            size = size.toString();
            
            
            //size 
            var color = [];
            $(".color").each(function(){
                if($(this).is(":checked")){
                    color.push($(this).val() );
                   }
            });
            color = color.toString();
          
       
            $.ajax({
               url: 'add-to-cart.php',
                method: 'post',
                data: {pid:pid, pname:pname, pprice:pprice, pimg:pimg, ppinvoice:ppinvoice, user_id:user_id, Qty:Qty,size:size, color:color },
                success:function(result){
                    window.scrollTo(0, 100);
                    $("#msg").html(result);
                    count_cart_item();
                }
            });
         
        });
        
                   count_cart_item();
        function count_cart_item(){
            $.ajax({
               url: 'count_cart_tem.php',
                method: 'get',
                data: {cartItem:"cart_item", unicID:"uniqID" },
                success:function(result){
                    $(".cart-total").html(result);
                }
            });
            
        }
        
    });

///##########################-----#########################////

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


//// ui



