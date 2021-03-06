<?php
 #############################################################################
 # phpVideoPro                              (c) 2001-2009 by Itzchak Rehberg #
 # written by Itzchak Rehberg <izzysoft AT qumran DOT org>                   #
 # http://www.izzysoft.de/                                                   #
 # ------------------------------------------------------------------------- #
 # This program is free software; you can redistribute and/or modify it      #
 # under the terms of the GNU General Public License (see doc/LICENSE)       #
 # ------------------------------------------------------------------------- #
 # Find (possible) dupes by movie title                                      #
 #############################################################################

 /* $Id$ */

$page_id = "user_backup";
include("inc/includes.inc");
require_once("inc/class.xfer.inc");

#==================================================[ Check vulnerability ]===
$modes = array('save','download','restore');
$mode = $_REQUEST['mode'];
if (!in_array($mode,$modes)) vul_kick("mode");

#==================================================[ Check authorization ]===
if (!$pvp->auth->browse) kickoff();
if ($mode=="restore" && !($pvp->auth->add && $pvp->auth->delete)) kickoff();

#=======================================================[ Little Helpers ]===
#----------------------------------------------------[ Purge old backups ]---
function purge() {
  GLOBAL $pvp;
  $files = $pvp->xfer->listUserBackups($pvp->auth->user);
  sort($files);
  if (count($files)>=$pvp->config->max_user_backups) unlink("${backup_path}/".$files[0]);
}

#==================================================[ Process the Request ]===
switch($mode) {
  case "save"    : $pvp->xfer = new xfer("export");
                   $pvp->xfer->compressionOn();
                   if ($pvp->xfer->backupStore()) {
                     $size = $pvp->xfer->fileExport("Movie","",$pvp->auth->user_id);
		     if ($size===FALSE)
		       $save_result = $pvp->xfer->errorMsg(lang("backup_failed"));
		     else {
                       $size = $pvp->common->formatFsize($size);
		       $save_result = $pvp->xfer->okMsg(lang("backup_store_success",$size));
                     }
		   } else $save_result = $pvp->xfer->errorMsg(lang("backup_failed"));
                   break;
  case "download": $pvp->xfer = new xfer("export");
                   $pvp->xfer->compressionOn();
                   $pvp->xfer->backupSend();
                   $pvp->xfer->fileExport("Movie","",$pvp->auth->user_id);
                   exit; break;
  case "restore" : $pvp->xfer = new xfer("import");
                   $files = $pvp->xfer->listUserBackups($pvp->auth->user->login); rsort($files);
#if ( ( bool ) ini_get('magic_quotes_gpc') ) echo "Magic Quotes active<br>"; else echo "Magic Quotes disabled!<br>";
#echo "[fileImport(movies_guest_090219.pvp,/home/web/www.qumran.org/local/phpvideo/testdata,0,3,3)]<br>";
#echo "&lt;fileImport($files[0],".$pvp->backup_dir.",0,".$pvp->auth->user_id.",".$pvp->auth->user_id.")&gt;<br>";
                   $save_result = $pvp->xfer->fileImport($files[0],$pvp->backup_dir,FALSE,$pvp->auth->user_id,$pvp->auth->user_id);
#echo "I'm here ($save_result)<br>";
                   break;
  default        : kickoff(); break;
}

#===================================================[ Output Information ]===
include("inc/header.inc");
$t = new Template($pvp->tpl_dir);
$t->set_file(array("template"=>"info.tpl"));
$t->set_var("listtitle",lang("backup_db"));
$t->set_var("details",$save_result);
$t->pparse("out","template");

include("inc/footer.inc");
?>