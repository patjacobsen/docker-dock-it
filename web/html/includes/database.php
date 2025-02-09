<?php
// Put @ before this to not display below information from error code
$db = @mysqli_connect('localhost', 'pjacobsen', '000415233', 'pjacobsen' )
//the OR, if no error on left^ it wont run right(below) and vise versa
or die('unable to connect to the database');