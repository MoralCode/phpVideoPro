<?php
 /***************************************************************************\
 * phpVideoPro                                   (c) 2001 by Itzchak Rehberg *
 * written by Itzchak Rehberg <izzysoft@qumran.org>                          *
 * http://www.qumran.org/homes/izzy/                                         *
 * --------------------------------------------------------------------------*
 * This program is free software; you can redistribute and/or modify it      *
 * under the terms of the GNU General Public License (see doc/LICENSE)       *
 \***************************************************************************/

 /* $Id$ */

 $page_id = "listgen";
 if ($outputtype) $silent = TRUE;
 include("inc/header.inc");
 if (!$pagelength) $pagelength = $pvp->preferences->page_length;

 ############################################################################
 # create the list and sent it to the browser for d/l
 if ($outputtype) {

   // disable time out - else long lists have no chance
   set_time_limit(0);

   // title line for multi-page lists
   function listtitle($page,$pages) {
     GLOBAL $listtitle;
     $add = "-= $page / $pages =-";
     $lt = substr($listtitle,0,strlen($listtitle) - strlen($add)) . $add;
     return $lt;
   }

   // obtain the list of movies and prepare some default settings
   $pagewidth  = 98;
   $movielist = $db->get_movielist($order);
   $listlength = count($movielist);
   switch ($order) {
     case "title" : $listtitle = lang("medialist_alpha"); break;
     default      : $listtitle = lang("medialist_num"); break;
   }
   $listtitle .= " (" . $pvp->common->formatDate(date('Y'),date('m'),date('d')) . ")";
   switch ($outputtype) {
     case "csv" : $sep = "\t"; $align = FALSE; $multipage = FALSE; $ext = "csv"; break;
     default    : $sep = " "; $align = TRUE; $multipage = TRUE; $ext = "txt"; break;
   }
   if ($align) $listtitle = $pvp->common->centerstr($listtitle,$pagewidth);
   if ($align) {
     $listheader = $pvp->common->centerstr(lang("medium"),12) . $sep
                 . $pvp->common->centerstr(lang("title"),55) . $sep
                 . $pvp->common->centerstr(lang("category"),17) . $sep
                 . $pvp->common->centerstr(lang("length"),5) . $sep
	         . $pvp->common->centerstr("LP",4);
   } else {
     $listheader = lang("medium") . $sep
                 . lang("title") . $sep
                 . lang("category") . $sep
                 . lang("length") . $sep
	         . "LP";
   }
   for ($i=0;$i<$pagewidth;$i++) {
     $underline .= "-";
   }
   $pagelength -= 4; // we need 4 lines for the title & header
   $pages = ceil($listlength / $pagelength); $page = 0;

   // build the list
   if (!$multipage) $out = "$listheader\n";
   for ($i=0;$i<$listlength;$i++) {
     if ($multipage && !($i % $pagelength)) { // new page
       ++$page;
       if ($i) $out .= "\x0C"; // no formfeed on the first page
       $out .= listtitle($page,$pages) . "\n";
       $out .= "\n$listheader\n$underline\n";
     }
     if (strlen($movielist[$i][lp])) { $lp = lang("yes"); } else { $lp = lang("no"); }
     if ($align) {
       $title  = $pvp->common->fillblanks($movielist[$i][title],55);
       $cat    = $pvp->common->centerstr($movielist[$i][cat1],17);
       $length = $pvp->common->padblanks($movielist[$i][length],5);
       $lp     = $pvp->common->centerstr($lp,4);
     } else {
       $title  = $movielist[$i][title];
       $cat    = $movielist[$i][cat1];
       $length = $movielist[$i][length];
     }
     $line = $movielist[$i][mtype_short] . " "
           . $pvp->common->padzeros($movielist[$i][cass_id],4) . "-"
           . $pvp->common->padzeros($movielist[$i][part],2) . $sep
	   . $title . $sep
	   . $cat . $sep
	   . $length . $sep
	   . $lp;
     $out .= "$line\n";
   }
   if ($multipage && (--$i % $pagelength)) $out .= "\x0C"; // formfeed after last page if not done

   // send it to the browser
   header("Content-Disposition: attachment; filename=medialist.$ext");
   header("Content-type: application/octet-stream"); // text/plain will be displayed inline, so we fool the browser
   echo $out;
   exit;
 }

 ############################################################################
 # form to prompt user for input
 $t = new Template($pvp->tpl_dir);
 $t->set_file(array("list"=>"listgen.tpl"));
 $t->set_block("list","definitionblock","definitionlist");
 $list   = "<SELECT NAME=\"order\">"
         . "<OPTION VALUE=\"num\">" . lang("medialist_num"). "</OPTION>"
	 . "<OPTION VALUE=\"title\">" . lang("medialist_alpha") . "</OPTION></SELECT>";
 $format = "<SELECT NAME=\"outputtype\"><OPTION VALUE=\"ascii\">ASCII</OPTION>"
         . "<OPTION VALUE=\"csv\">CSV</OPTION></SELECT>";
 $lines  = "<INPUT NAME=\"pagelength\" VALUE=\"$pagelength\" SIZE=\"3\">";
 $t->set_var("liste",$list);
 $t->set_var("format",$format);
 $t->set_var("lines",$lines);
 $t->parse("definitionlist","definitionblock");
 $t->set_var("liste",lang("list"));
 $t->set_var("format",lang("format"));
 $t->set_var("lines",lang("line_count"));
 $t->set_var("listtitle",lang("listgen"));
 $t->set_var("form_target",$PHP_SELF);
 $t->set_var("create",lang("create"));
 $t->pparse("out","list");

 include("inc/footer.inc");

?>