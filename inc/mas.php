<?php


    /*
    *  this page for all massegs in systems
    *  @access array
	*  @return massegs by key arrey
	*
    */


$errors =  array(

        0  =>'', // no errors
        1  => '<div class="text-center alert btn-success nore">  Done  </div>',
        3  => '<div class="text-center alert btn-success nore">  user is active  </div>',
        2  => '<div class="text-center alert btn-danger  nore">  please enter all fields  </div>',
        4  => '<div class="text-center alert btn-success nore">  user is deleted  </div>',

        // errors orders  page
        8  => '<div class="text-center alert btn-warning nore"> your order be accepted in 24 hours  </div>',
        9  => '<div class="text-center alert btn-success nore"> order is accepted  </div>',
        10  => '<div class="text-center alert btn-success nore"> order is Delivered  </div>',

        // errors login page
        100  => '<div class="text-center alert btn-danger  nore">  Incorrect username or password </div>',
        // hide form in login
        101  => '
        <script>
        window.setTimeout(function() {
        $("#m").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove();});}, 900);
        </script><div class="text-center alert btn-success nore">  please wait...
        <i class="fa fa-spinner fa-pulse text-left"></i></div>',
        102  => '<div class="text-center alert btn-warning nore">  You are not active yet ! </div>',

    );

?>