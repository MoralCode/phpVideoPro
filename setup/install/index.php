<?php
##############################################################################
# phpVideoPro                               (c) 2001-2020 by Itzchak Rehberg #
# written by Itzchak Rehberg <izzysoft AT qumran DOT org>                    #
# https://www.izzysoft.de/                                                   #
# -------------------------------------------------------------------------- #
# This program is free software; you can redistribute and/or modify it       #
# under the terms of the GNU General Public License (see doc/LICENSE)        #
# -------------------------------------------------------------------------- #
# Search IMDB for movie information                                          #
##############################################################################

/* $Id$ */

$pvpinstall = 1;
$nomenue    = 1;
include("../../inc/config.inc");
include("../../inc/config_internal.inc");
require($base_path."inc/class.template.inc");
include($base_path."inc/common_funcs.inc");
$pvp->tpl_dir = $base_path."templates/default";
$pvp->tpl_url = $base_url."templates/default";
if (!isset($_POST["failure"]) && !isset($_POST["success"]))
  include("../../inc/header.inc");

#========================================================[ Template setup ]===
$t = new Template($pvp->tpl_dir);
$t->set_file(array("template"=>"install.tpl"));
$t->set_block("template","formblock","formlist");
$t->set_block("formblock","formitemblock","formitem");

$t->set_block("template","infoblock","infolist");
$t->set_block("template","skipblock","skiplist");

$t->set_var("form_target",$_SERVER["PHP_SELF"]);
$t->set_var("submit_button",$pvp->tpl_url."/images/button-next.gif");
$t->set_var("skip_button",$pvp->tpl_url."/images/button-skip.gif");

if (isset($_POST["config"])) {
#=================================================[ Write new config file ]===
  $infile  = file($base_path."inc/config.inc");
  $inlines = count($infile);
  $changed = FALSE;
  $t->set_var("beamspan","2");
  $t->set_var("nobeamspan","3");
  $dbtype = strtolower($_POST["db_type"]);
  for ($i=0;$i<$inlines;++$i) {
    if ( strpos(trim($infile[$i]),"\$backup_path")===0 ) {
      $old = trim(preg_replace('/([^"]*)\"([^"]*)\"(.*)/','\\2',$infile[$i]));
      if ($old!=trim($_POST["backup_path"])) {
        $infile[$i] = preg_replace('/([^"]*)\"([^"])*\"(.*)/','\\1"'.$_POST["backup_path"].'"\\3',$infile[$i]);
        $changed = TRUE;
      }
    }
    if ( strpos(trim($infile[$i]),"\$imdb_api_path")===0 ) {
      $old = trim(preg_replace('/([^"]*)\"([^"]*)\"(.*)/','\\2',$infile[$i]));
      if ($old!=trim($_POST["imdb_api_path"])) {
        $infile[$i] = preg_replace('/([^"]*)\"([^"])*\"(.*)/','\\1"'.$_POST["imdb_api_path"].'"\\3',$infile[$i]);
        $changed = TRUE;
      }
    }
    if ( strpos(trim($infile[$i]),"\$database[\"type\"]")===0 ) {
      $old = trim(preg_replace('/([^=]*=\s*)\"([^"]*)\"(.*)/','\\2',$infile[$i]));
      if ($old!=trim($_POST["db_type"])) {
        $infile[$i] = preg_replace('/([^=]*=\s*)\"([^"])*\"(.*)/','\\1"'.$dbtype.'"\\3',$infile[$i]);
        $changed = TRUE;
      }
    }
    if ( strpos(trim($infile[$i]),"\$database[\"host\"]")===0 ) {
      $old = trim(preg_replace('/([^=]*=\s*)\"([^"]*)\"(.*)/','\\2',$infile[$i]));
      if ($old!=trim($_POST["db_host"])) {
        $infile[$i] = preg_replace('/([^=]*=\s*)\"([^"])*\"(.*)/','\\1"'.$_POST["db_host"].'"\\3',$infile[$i]);
        $changed = TRUE;
      }
    }
    if ( strpos(trim($infile[$i]),"\$database[\"database\"]")===0 ) {
      $old = trim(preg_replace('/([^=]*=\s*)\"([^"]*)\"(.*)/','\\2',$infile[$i]));
      if ($old!=trim($_POST["db_name"])) {
        $infile[$i] = preg_replace('/([^=]*=\s*)\"([^"])*\"(.*)/','\\1"'.$_POST["db_name"].'"\\3',$infile[$i]);
        $changed = TRUE;
      }
    }
    if ( strpos(trim($infile[$i]),"\$database[\"user\"]")===0 ) {
      $old = trim(preg_replace('/([^=]*=\s*)\"([^"]*)\"(.*)/','\\2',$infile[$i]));
      if ($old!=trim($_POST["db_user"])) {
        $infile[$i] = preg_replace('/([^=]*=\s*)\"([^"])*\"(.*)/','\\1"'.$_POST["db_user"].'"\\3',$infile[$i]);
        $changed = TRUE;
      }
    }
    if ( strpos(trim($infile[$i]),"\$database[\"password\"]")===0 ) {
      $old = trim(preg_replace('/([^=]*=\s*)\"([^"]*)\"(.*)/','\\2',$infile[$i]));
      if ( !empty($_POST["db_pass"]) || isset($_POST["no_pass"]) ) {
        if (isset($_POST["no_pass"])) $_POST["db_pass"] = "";
        if ($old!=trim($_POST["db_pass"])) {
          $infile[$i] = preg_replace('/([^=]*=\s*)\"([^"])*\"(.*)/','\\1"'.$_POST["db_pass"].'"\\3',$infile[$i]);
          $changed = TRUE;
        }
      }
    }
  }
  $t->set_var("submit_name","config_done");
  $t->set_var("listtitle","phpVideoPro Installation: Config file set up");
  if ($changed) {
    $tempname = tempnam("/tmp","config");
    $failed   = FALSE;
    if ($tempname) {
      $fp = @fopen($tempname,"w");
      if ($fp) {
        fputs($fp,implode("",$infile));
        fclose($fp);
        $t->set_var("info_head","Configuration saved");
        $info = "Your updated configuration has been saved to the file "
              . "<CODE>$tempname</CODE>. Before you can continue, you need "
              . "to move it to your phpVideoPro directory. For this task, "
              . "as privileged user (on *nix systems usually <CODE>root</CODE>), "
              . "issue the command<BR><BR><DIV ALIGN='left' STYLE='margin-left:20px'><CODE>mv $tempname ${base_path}inc/config.inc"
              . "</CODE></DIV><BR><B><I>Afterwards</I></B>, please hit the "
              . "button to continue with the next step.";
      } else { // failed to save file
        $failed = TRUE;
      }
    }
    if (!$tempname || $failed) {
      $t->set_var("info_head","New configuration created");
      $info = "A new configuration with the values you entered has been "
            . "created. Unfortunately, the system failed to create the "
            . "file - so you need to do some handwork: Please, open the "
            . "<CODE>$base_path"."inc/config.inc</CODE> file with your "
            . "favorite ASCII editor, delete all lines, and copy the "
            . "text below into it (alternatively, you may just start a new "
            . "file and rename it later):<BR><CODE><PRE>"
            . implode("",$infile)."</PRE></CODE><BR>"
            . "After you have done that, please hit the button to continue "
            . "with the next step.";
    }
    $t->set_var("info_body",$info);
  } else {
    $t->set_var("info_head","Base configuration finished");
    $t->set_var("info_body","No changes have been done to the configuration file. Please hit the button to go to the next step!");
  }
  $t->parse("infolist","infoblock");
  $t->pparse("out","template");
} elseif (isset($_POST["config_done"])) {
#================================================[ Get privileged DB user ]===
  $t->set_var("beamspan","3");
  $t->set_var("nobeamspan","2");
  $t->set_var("listtitle","phpVideoPro Installation: Create the DB");
  $t->set_var("submit_name","dbcreate");
  if ($database["type"]!="sqlite") {
    $t->set_var("info_head","Superuser");
    $info = "Now we go to create the database. For this, we need special "
          . "privileges - so below, please specify a privileged user with all "
          . "administrative rights (i.e. CREATE DATABASE, CREATE TABLE, etc.). "
          . "If in doubt: for MySQL, this usually is the <code>root</code> user. "
          . "In case the database already exists, use the <I>Skip</I> button to "
          . "submit this form (this will only skip the DB creation; all tables "
          . "will of course be created and filled <I>in the existing DB</I>, though).";
    $t->set_var("info_body",$info);
    $t->parse("infolist","infoblock");
    $t->set_var("field","User");
    $t->set_var("content","<INPUT NAME='db_user'>");
    $t->set_var("descript","");
    $t->parse("formitem","formitemblock");
    $t->set_var("field","Password");
    $t->set_var("content","<INPUT TYPE='password' NAME='db_pass'>");
    $t->set_var("descript","");
    $t->parse("formitem","formitemblock",TRUE);
    $parse_append = 1;
  } else {
    $parse_append = 0;
  }
  $t->set_var("field","Mode");
  $t->set_var("content","<SELECT NAME='dbmode'><OPTION VALUE='create'>Create Fresh DB</OPTION><OPTION VALUE='restore'>Restore from a Backup</OPTION></SELECT>");
  $t->set_var("descript","Please chose if you want to create a fresh (blank) database, or want to restore from a previous backup. In the latter case, you should have placed your <code>restore.sql</code> file in the <code>setup/</code> directory, as described on the Backup page.");
  $t->parse("formitem","formitemblock",$parse_append);
  $t->parse("formlist","formblock");
  $t->parse("skiplist","skipblock");
  $t->pparse("out","template");
} elseif (isset($_POST["dbcreate"])) {
#===================================================[ Set up the database ]===
  $t->set_var("beamspan","4");
  $t->set_var("nobeamspan","1");
  $t->set_var("listtitle","phpVideoPro Installation: Setting up the DB");
  $t->set_var("submit_name","tables_done");
  $failed = FALSE;
  if (!$_POST["dbcreate_skip"]) {
    $dbc = new sql();
    $dbc->User = $_POST["db_user"];
    $dbc->Password = $_POST["db_pass"];
    $dbc->Host     = $database["host"];
    switch ($database["type"]) {
      case "mysql": $dbc->Database = "mysql";
                    $dbcrea = "CREATE DATABASE ".$database["database"]." CHARACTER SET utf8mb4 COLLATE=utf8mb4_unicode_ci";
                    $dbgra  = "GRANT ALL ON ".$database["database"].".* TO ".$database["user"]."@".$database["host"];
                    if (!empty($database["password"])) $dbgra .= " IDENTIFIED BY '".$database["password"]."'";
                    break;
      case "pgsql": $dbc->Database = "template1";
                    $dbcrea = "CREATE DATABASE ".$database["database"]." WITH ENCODING 'UNICODE'";
                    $dbgra  = "GRANT ALL ON DATABASE ".$database["database"]." TO ".$database["user"];
                    $dbc->query("SELECT usename FROM pg_user WHERE usename='".$database["user"]."'");
                    $dbc->next_record();
                    if ($dbc->f('usename')!=$database["user"]) {
                      $query = "CREATE USER ".$database["user"];
                      if (!empty($database["password"])) $query .= " WITH PASSWORD '".$database["password"]."'";
                      $dbc->query($query);
                    }
                    break;
      case "sqlite" : $dbc->Database = $_POST["db_name"];
                      $dbcrea = "";
                      $dbgra  = "";
                      break;
      default     : break;
    }
    $info   = "<UL>";
    if ($database["type"]=="sqlite") {
      // no CREATE DATABASE required
    } elseif (@$dbc->query($dbcrea)) {
      $info .= " <LI><SPAN CLASS='ok'>Database successfully created.</SPAN></LI>\n";
      if (@$dbc->query($dbgra)) {
        $info .= " <LI><SPAN CLASS='ok'>Granted rights to final user.</SPAN></LI>\n";
      } else {
        $info .= " <LI><SPAN CLASS='error'>Could not grant privileges to final user! Process stopped.</SPAN></LI>\n";
        $failed = TRUE;
      }
    } else { // db not created
      $info .= " <LI><SPAN CLASS='error'>Database could not be created! Process stopped.</SPAN></LI>\n";
      $failed = TRUE;
    }
    unset($dbc);
  }
  if (!$failed) { #-=[ Create Tables ]=-
    $create_script = "create_tables." . $database["type"];
    $sql[] = array ( "script"=>$create_script, "comment"=>"Creation of Tables" );
    switch ($_POST["dbmode"]) {
      case "create":
        $sql[] = array ( "script"=>"pslabel." . $database["type"],"comment"=>"Setup of PSLabel data" );
        $sql[] = array ( "script"=>"tech_data.sql","comment"=>"Insertion of technical data" );
        $sql[] = array ( "script"=>"categories.sql","comment"=>"Setup of Categories" );
        $sql[] = array ( "script"=>"languages.sql","comment"=>"Setup of Language data" );
        $sql[] = array ( "script"=>"../lang_en.sql","comment"=>"Insertion of default translations" );
        break;
      case "restore":
        $sql[] = array ( "script"=>"../restore.sql","comment"=>"Restoring BackUp" );
        break;
      default: break;
    }
    $sqlc = count($sql);
    if ($database["type"]=="sqlite") $sep = 0; else $sep = 1;
    for ($i=0;$i<$sqlc;++$i) {
      if ($i<2) $res = $db->queryf($sql[$i]["script"],$sql[$i]["comment"],1,$sep);
      else $res = $db->queryf($sql[$i]["script"],$sql[$i]["comment"],1);
      if ( strlen($res)>1 ) {
        $info .= $res;
        $failed = TRUE;
        break;
      } else {
        $info .= "<LI><SPAN CLASS='ok'>".$sql[$i]["comment"]." successful.</SPAN></LI>";
      }
    }
    if ($_POST["dbmode"]=="create") $db->query("UPDATE pvp_users SET id=0 WHERE login='PUBLIC'");
  }
  $info .= "</UL>";
  $t->set_var("info_head","Database setup process:");
  $t->set_var("info_body",$info);
  $t->parse("infolist","infoblock");
  if ($failed) {
    $t->set_var("submit_name","failure");
    $t->set_var("info_head","Installation failed!");
    $info = "Sorry to tell you the bad news - but the configuration failed! "
          . "Where it broke you can see above at the last statement, which "
          . "should be marked red. Some hints what could be the reason:<UL>\n"
          . "<LI>If the creation of the database failed, you probably "
          . "did not specify a user with sufficient privileges on the last "
          . "page. In this case, just use your browsers 'Back' button and "
          . "correct this. Another reason for this could be, that the "
          . "specified database does already exist - so either chose a "
          . "different database name, or drop the specified one (oh, be "
          . "very careful with the last mentioned option!).</LI>\n"
          . "<LI>If the table creation failed, the user specified in the "
          . "first form of this wizzard lacks some permissions. This should "
          . "normally never happen, since we grant this user everything needed. "
          . "Contact the author in this case - hopefully he knows something "
          . "to do.</LI>\n"
          . "<LI>Everything else will probably be caused by some SQL syntax "
          . "errors in the scripts used - same procedure as with the last item: "
          . "Contact the author and tell him what to fix.</LI></UL>";
  } else {
    $t->set_var("submit_name","success");
    $t->set_var("info_head","Installation finished!");
    $info = "Congratulations! You successfully finished the installation of "
          . "phpVideoPro! When you now hit the button a last time, this will "
          . "bring you to the applications login screen. First thing you should "
          . "do there is to login as <code>admin</code>, password "
          . "<code>video</code>, open the 'Admin' menu and select the item "
          . "named 'Manage user accounts'. Change the password for "
          . "<code>admin</code>, so nobody else reconfigures your installation. "
          . "Additionally, you may want to set up at least one user account to "
          . "work with - and maybe some more for your friends. "
          . "After this, again open the 'Admin' menu, and select 'Configuration' "
          . "to finish your setup.<BR><BR>Since you are done with the installation "
          . "now, you may want to protect the wizzard against abuse (so that "
          . "nobody can just play with it and with your machine). There are "
          . "multiple options how to do this:<UL><LI>You can simply remove "
          . "the <code>setup/install/</code> directory</LI><LI>You can let "
          . "Apache do the work for you, by placing an appropriate "
          . "<code>.htaccess</code> file or add the directive(s) directly to "
          . "the Apache configuration</LI><LI>If the directory is not owned "
          . "by the user the web server runs under, you can simply change the "
          . "directorys permission by issuing the following command (you may "
          . "need to be root for this): <code>chmod 0700 setup/install</code>"
          . "</LI></UL><BR>Finally: Enjoy phpVideoPro!";
  }
  $t->set_var("info_body",$info);
  $t->parse("infolist","infoblock",TRUE);
  $t->pparse("out","template");
} elseif (isset($_POST["success"])) {
#======================================================[ Done! Goto Login ]===
  header("Location: $base_url"."login.php");
  exit;
} elseif (isset($_POST["failure"])) {
#===================================================[ Setup failed - info ]===
  header("Location: ".$pvp->projectpage);
  exit;
} else {
#===================================================[ Default: First step ]===
  include("../../inc/config.inc");
  $t->set_var("beamspan","1");
  $t->set_var("nobeamspan","4");
  $t->set_var("listtitle","phpVideoPro Installation: Setting up the config file");
  $t->set_var("submit_name","config");
  #-=[ Backup Path ]=-
  $t->set_var("field","Backup Path");
  $t->set_var("content","<INPUT NAME='backup_path' VALUE='$backup_path' SIZE='50'>");
  $desc = "Where to look for backup files. These files are used to restore "
        . "the database from a previous backup. You may either specify an "
        . "absolute path (i.e. starting with a slash / symbol), or a path "
        . "relative to your phpVideoPro installation.";
  $t->set_var("descript",$desc);
  $t->parse("formitem","formitemblock");

  #-=[ IMDBPHP Path ]=-
  $t->set_var("field","IMDBPHP Location");
  $t->set_var("content","<INPUT NAME='imdb_api_path' VALUE='$imdb_api_path'>");
  $t->set_var("descript","Where to find the IMDBPHP classes. This should point to the directory holding IMDBPHP's <code>bootstrap.php</code>.");
  $t->parse("formitem","formitemblock",TRUE);

  #-=[ Database Type ]=-
  $t->set_var("field","Database Type");
  switch ($database["type"]) {
    case "mysql"   : $mysql = " SELECTED"; $pgsql = ""; $sqlite=""; break;
    case "pgsql"   : $pgsql = " SELECTED"; $mysql = ""; $sqlite=""; break;
    case "sqlite" : $sqlite = " SELECTED"; $mysql = ""; $pgsql=""; break;
  }
  $t->set_var("content","<SELECT NAME='db_type'><OPTION VALUE='mysql'$mysql>MySQL</OPTION><OPTION VALUE='pgsql'$pgsql>PostgreSQL</OPTION><OPTION VALUE='sqlite'$sqlite>SQLite</OPTION></SELECT>");
  $t->set_var("descript","What kind of database you are using?");
  $t->parse("formitem","formitemblock",TRUE);

  #-=[ Database Host ]=-
  $t->set_var("field","Database Host");
  $t->set_var("content","<INPUT NAME='db_host' VALUE='".$database["host"]."'>");
  $desc = "Machine the database is running on. This can either be 'localhost' "
        . "(if it runs on the same machine as the webserver), or any host "
        . "name the webserver is able to resolve. For SQLite, this value is ignored.";
  $t->set_var("descript",$desc);
  $t->parse("formitem","formitemblock",TRUE);

  #-=[ Database name ]=-
  $t->set_var("field","Database Name");
  $t->set_var("content","<INPUT NAME='db_name' VALUE='".$database["database"]."'>");
  $t->set_var("descript","The name of the database to create/use. If possible, you should give phpVideoPro its own database. For SQLite, this is the name of the database file.");
  $t->parse("formitem","formitemblock",TRUE);

  #-=[ Database user ]=-
  $t->set_var("field","Database User");
  $t->set_var("content","<INPUT NAME='db_user' VALUE='".$database["user"]."'>");
  $t->set_var("descript","Which user is operating this database? This user should at least have the SELECT, UPDATE, INSERT and DELETE privileges.<BR>For SQLite, this is ignored.");
  $t->parse("formitem","formitemblock",TRUE);

  #-=[ Database Password ]=-
  $t->set_var("field","Database Password");
  $desc = "&nbsp;<INPUT TYPE='checkbox' CLASS='checkbox' NAME='no_pass'";
  if (empty($database["password"])) $desc .= " CHECKED";
  $desc .= ">No password";
  $t->set_var("content","<INPUT TYPE='password' NAME='db_pass'>$desc");
  $t->set_var("descript","The password needed for the specified user to access the specified database.<BR>For SQLite, this is ignored.");
  $t->parse("formitem","formitemblock",TRUE);

  $t->parse("formlist","formblock");
  $t->pparse("out","template");
}

include("../../inc/footer.inc");
?>
