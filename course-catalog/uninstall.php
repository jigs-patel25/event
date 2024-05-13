<?php 
 function course_catloge_uninstall() {
     // Uninstallation stuff here
     unregister_post_type( 'course' );
    }
    register_uninstall_hook( __FILE__, 'course_catloge_uninstall' );

?>