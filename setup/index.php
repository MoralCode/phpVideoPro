<?php
 #############################################################################
 # phpVideoPro                              (c) 2001-2010 by Itzchak Rehberg #
 # written by Itzchak Rehberg <izzysoft AT qumran DOT org>                   #
 # http://www.izzysoft.de/                                                   #
 # ------------------------------------------------------------------------- #
 # This program is free software; you can redistribute and/or modify it      #
 # under the terms of the GNU General Public License (see doc/LICENSE)       #
 # ------------------------------------------------------------------------- #
 # Setup Program                                                             #
 #############################################################################

 /* $Id$ */

 include ("../inc/config.inc");
 $title = "phpVideoPro Setup";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML><HEAD>
 <TITLE><?php echo $title?></TITLE>
 <META http-equiv='Content-Type' content='text/html; charset=utf-8'>
 <LINK HREF='../templates/default/default.css' rel='stylesheet' type='text/css'>
</HEAD>
<BODY>
<H1 ALIGN=CENTER><?php echo $title?></H1>
<TABLE ALIGN="CENTER" WIDTH="90%" BORDER="0">
 <TR><TH>Welcome to the Setup Unit of phpVideoPro!</TH></TR>
 <TR><TD><DIV ALIGN="center"><P><BR>Please select what you are going to do:</P>
     <TABLE WIDTH="90%" BORDER="1">
      <COLGROUP><COL WIDTH="25%"><COL WIDTH="25%"><COL WIDTH="25%"><COL WIDTH="25%"></COLGROUP>
      <TR><TD ALIGN="center"><A HREF="install/index.php">Fresh Installation/Restore</A></TD>
          <TD ALIGN="center"><A HREF="update/index.php">Update existing installation</A></TD>
          <TD ALIGN="center"><A HREF="../admin/configure.php">Configure existing installation</A></TD>
          <TD ALIGN="center"><A HREF="../login.php">Enter the application</A></TD></TR>
     </TABLE></DIV></TD></TR>
</TABLE></BODY></HTML>