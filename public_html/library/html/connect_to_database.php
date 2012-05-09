<?php

  // Connect to the database server
  $dbcnx = @mysql_connect("localhost",
           "osukpoma", "tempPass");
  if (!$dbcnx) {
    echo( "<P>Unable to connect to the " .
          "database server at this time.</P>" );
    exit();
  }

  // Select the osukpoma database
  if (! @mysql_select_db("osukpoma") ) {
    echo( "<P>Unable to locate the osukpoma " .
          "database at this time.</P>" );
    exit();
  }

?>