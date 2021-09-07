<?php
session_start();
session_destroy();{
    print "
                    <script language='javascript'>
                        window.location = 'login.php';
                    </script>
                    ";
}
?>