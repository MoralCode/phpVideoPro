<?php
 #############################################################################
 # phpVideoPro                              (c) 2001-2004 by Itzchak Rehberg #
 # written by Itzchak Rehberg <izzysoft@qumran.org>                          #
 # http://www.qumran.org/homes/izzy/                                         #
 # ------------------------------------------------------------------------- #
 # This program is free software; you can redistribute and/or modify it      #
 # under the terms of the GNU General Public License (see doc/LICENSE)       #
 # ------------------------------------------------------------------------- #
 # Edit Translations                                                         #
 #############################################################################

 /* $Id$ */

 #========================================================[ initial setup ]==
 $page_id = "admin_sessions";
 include("../inc/includes.inc");

 #-------------------------------------------------[ Register global vars ]---
 $postit = array ("days","ended");
 foreach ($postit as $var) {
   $$var = $_POST[$var];
 }
 $delete = $_GET["delete"];
 unset($postit);

 #--------------------------------------------------[ Check authorization ]---
 if (!$pvp->auth->admin) kickoff();

 #--------------------------------------------------[ initialize template ]---
 if (!$start) $start = 0;
 include("../inc/class.nextmatch.inc");

 if ($delete) $db->remove_session($delete);
 if ($days)   $db->remove_session("",$days);
 if ($ended)  $db->remove_session();

 $t = new Template($pvp->tpl_dir);
 $t->set_file(array("list"=>"admin_sessions.tpl"));
 $t->set_block("list","itemblock","item");
 $t->set_var("listtitle",lang($page_id));
 $t->set_var("formtarget",$_SERVER["PHP_SELF"]);

 #=====================================[ get sessions and setup variables ]===
 $tpl_dir = str_replace($base_path,$base_url,$pvp->tpl_dir);
 $trash_img = $tpl_dir . "/images/trash.png";
 $query = "\$db->get_sessions($start)";
 $nextmatch = new nextmatch ($query,$pvp->tpl_dir,$_SERVER["PHP_SELF"],$start);

 function todate($date) {
   return date("d.m.Y H:m",$date);
 }

 include("../inc/header.inc");
?>
<SCRIPT LANGUAGE="JavaScript">
 function delconfirm(url) {
  check = confirm("<?=lang("confirm_delete")?>");
  if (check == true) window.location.href=url;
 }
</SCRIPT>
<?
 #======================================================[ create the Form ]===
 $list = $nextmatch->list;
 for ($i=0;$i<$nextmatch->listcount;$i++) {
   $t->set_var("sess_id",$list[$i][sess_id]);
   $t->set_var("sess_ip",$list[$i][ip]);
   $t->set_var("sess_user",$list[$i][user]);
   $t->set_var("sess_start",todate($list[$i][started]));
   $t->set_var("sess_dla",todate($list[$i][dla]));
   if ($list[$i][ended]) { $sEnd = todate($list[$i][ended]); } else { $sEnd = "&nbsp;"; }
   $t->set_var("sess_end",$sEnd);
   $url = $pvp->link->slink($_SERVER["PHP_SELF"]."?delete=".$list[$i][sess_id]);
   $del = "<IMG SRC='$trash_img' BORDER='0' ALT='".lang("delete")."' onClick=\"delconfirm('$url')\">";
   $t->set_var("sess_action",$del);
   $t->parse("item","itemblock",TRUE);
 }
 $t->set_var("old_sess",lang("old_sessions","days"));
 $t->set_var("ended_sess",lang("ended_sessions"));
 $t->set_var("head_sess_id",lang("sess_id"));
 $t->set_var("head_sess_ip",lang("sess_ip"));
 $t->set_var("head_sess_user",lang("user"));
 $t->set_var("head_sess_start",lang("sess_start"));
 $t->set_var("head_sess_dla",lang("sess_dla"));
 $t->set_var("head_sess_end",lang("sess_end"));
 $t->set_var("head_sess_action","");
 $t->set_var("submit",lang("delete"));
 $t->set_var("first",$nextmatch->first);
 $t->set_var("left",$nextmatch->left);
 $t->set_var("right",$nextmatch->right);
 $t->set_var("last",$nextmatch->last);
 if (!$pvp->cookie->active) $t->set_var("hidden","<INPUT TYPE='hidden' NAME='sess_id' VALUE='".$_REQUEST["sess_id"]."'>");

 $t->pparse("out","list");
 include("../inc/footer.inc");
?>