<script type="text/javascript" src="<?php echo base_url('assets/js/lib/masonry.pkgd.min.js', get_protocol()); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/lib/jquery.owl.carousel.js', get_protocol()); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/lib/theia-sticky-sidebar.js', get_protocol()); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/lib/jquery.magnific-popup.min.js', get_protocol()); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/lib/jquery-ui.js', get_protocol()); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/scripts.js', get_protocol()); ?>"></script>
   
   
   <!--Search History-->
   
<script>
  jQuery(document).ready(function (e) {
        function t(t) {
            e(t).bind("click", function (t) {
                t.preventDefault();
                e(this).parent().fadeOut()
            })
        }
        e(".dropdown-toggle").click(function () {
            var t = e(this).parents(".button-dropdown").children(".dropdown-menu").is(":hidden");
            e(".button-dropdown .dropdown-menu").hide();
            e(".button-dropdown .dropdown-toggle").removeClass("active");
            if (t) {
                e(this).parents(".button-dropdown").children(".dropdown-menu").toggle().parents(".button-dropdown").children(".dropdown-toggle").addClass("active")
            }
        });
        e(document).bind("click", function (t) {
            var n = e(t.target);
            if (!n.parents().hasClass("button-dropdown")) e(".button-dropdown .dropdown-menu").hide();
        });
        e(document).bind("click", function (t) {
            var n = e(t.target);
            if (!n.parents().hasClass("button-dropdown")) e(".button-dropdown .dropdown-toggle").removeClass("active");
        })
    });
</script>

 <link rel="stylesheet" href="<?php echo base_url('assets/colorbox/colorbox.css', get_protocol()); ?>" />
        <script src="<?php echo base_url('assets/colorbox/jquery.colorbox.js', get_protocol()); ?>"></script>
        <script src="<?php echo base_url('assets/colorbox/jquery.colorbox-min.js', get_protocol()); ?>"></script>
<script>
  $(document).ready(function(){
      
      $(".iframe").colorbox();

      
      
      //Example of preserving a JavaScript event for inline calls.
      $("#click").click(function(){ 
          $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
          return false;
      });
  });
</script>

    
<script type="text/javascript" src="<?php echo base_url('assets/autofillairports/airports.js', get_protocol()); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/autofillairports/jquery.autocomplete.js', get_protocol()); ?>"></script>

    <!-- Dependencies -->

    
    <!-- Core files -->

<script>

$( document ).ready(function() {
        $("input").click(function() {
			this.select();
			id=$(this).attr("id");
			$(this).parent(".form-item").find("."+id).text("");
			$(this).parent(".form-group").find("span.error").text("");
			$(this).css("border", "");
		});
		$("select").click(function(){		
			id=$(this).attr("id");
			$(this).parent(".form-item").find("."+id).text("");
			$(this).parent(".form-group").find("span.error").text("");
			$(this).css("border", "");
		});
   

    $("body").append("<input type='hidden' id='searchvalue' value='<?php echo json_encode($this->session->userdata("search_history_id")); ?>'><input type='hidden' id='uid' value='<?php echo $this->session->userdata("auth.user_id"); ?>'>");
    search_history = 'somevalue';
    user_id = 'somevalue';
});

  setInterval(function () {
     $.ajax({
        url: '<?php echo base_url("Auth/getSessionsSearch", get_protocol()); ?>',
        success: function(data) {
        //called when successful
        search_history = data;
        }
      });
     $.ajax({
        url: '<?php echo base_url("Auth/getSessionsUser", get_protocol()); ?>',
        success: function(data) {
        //called when successful
        user_id = data;
        }
      });
    if($('#searchvalue').val() != 'null' || $('#uid').val() != '') {
      if((search_history.trim() == '' || search_history.trim() == '[]' )&& user_id.trim() == '') {
         alert('session has been expired. You will redirected to the home page');
         window.location.href='<?php echo base_url('', get_protocol()); ?>';
      }
    }
  }, 120000)

</script>


<script type='text/javascript' src="<?php echo base_url('assets/js/bootstrap-formhelpers.min.js', get_protocol()); ?>"></script>
<link href="<?php echo base_url('assets/css/bootstrap-formhelpers.min.css', get_protocol()); ?>" type="text/css" rel="stylesheet">


