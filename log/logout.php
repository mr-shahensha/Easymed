<?php
include("../value/connection.php");

session_Start();
session_unset();
session_destroy();
setcookie('cunm',"",(time()+604800));

setcookie('cups',"",(time()+604800));
?>
<script language="javascript">
document.location="../index.php";
</script>
<?php

?>