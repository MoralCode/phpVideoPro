<BR STYLE="margin-top:50;">
<TABLE ALIGN="center" CELLPADDING="0" CELLSPACING="0" BORDER="0" id="appWin"><TR><TD>
<DIV STYLE="display:inline;">
<TABLE WIDTH="*" ALIGN="center" CELLPADDING="0" CELLSPACING="0" CLASS="window" BORDER=0"><TR><TD>
<TABLE WIDTH="100%" CELLPADDING="0" CELLSPACING="0" BORDER="0">
 <TR><TD NOWRAP WIDTH="100%" CLASS="wintitle"><DIV STYLE="margin:2">{goto_entry}</DIV></TD>
     <TD ALIGN="right" CLASS="wintitle" STYLE="vertical-align:middle;">
      <INPUT TYPE="image" NAME="button_search" CLASS="imgbut" SRC="{tpl_dir}images/win_search.gif" WIDTH="14" HEIGHT="13" onClick="window.location.href='{search_link}'"></TD>
     <TD ALIGN="right" CLASS="wintitle" STYLE="vertical-align:middle;">
      <INPUT TYPE="image" NAME="button_help" CLASS="imgbut" SRC="{tpl_dir}images/win_help.gif" WIDTH="14" HEIGHT="13" onClick="{help_link}"></TD>
     <TD CLASS="wintitle" STYLE="vertical-align:middle;margin-right:3;"><DIV STYLE="width:18;">
      <INPUT TYPE="image" NAME="button_close" CLASS="imgbut" SRC="{tpl_dir}images/win_close.gif" WIDTH="14" HEIGHT="13" onClick="window.location.href='{logoff_link}'"></DIV></TD></TR>
</TABLE></TD></TR>
<TR><TD BGCOLOR="#AAAAAA"><IMG SRC="{tpl_dir}images/0.gif" WIDTH="1" HEIGHT="1" BORDER="0"></TD></TR>
<TR><TD BGCOLOR="#FFFFFF"><IMG SRC="{tpl_dir}images/0.gif" WIDTH="1" HEIGHT="1" BORDER="0"></TD></TR>
<TR><TD>

 <FORM NAME="space" METHOD="post" ACTION="{form_target}">
  <DIV STYLE="margin:3;text-align:center">
  <TABLE BORDER="0" ALIGN="center">
    <TR><TD><DIV ALIGN="center" STYLE="margin-right:5">{mtype}</DIV></TD>
        <TD><DIV ALIGN="center" STYLE="margin-left:5">{cass_id}</DIV></TD>
    <TR><TD><DIV ALIGN="center">{sel_mtype}</DIV></TD>
        <TD><DIV ALIGN="center"><INPUT NAME="cass_id" {add_cass}>-<INPUT NAME="part" {add_part}></DIV></TD></TR>
  </TABLE>
  </DIV>

<TR><TD BGCOLOR="#AAAAAA"><IMG SRC="{tpl_dir}images/0.gif" WIDTH="1" HEIGHT="1" BORDER="0"></TD></TR>
<TR><TD BGCOLOR="#FFFFFF"><IMG SRC="{tpl_dir}images/0.gif" WIDTH="1" HEIGHT="1" BORDER="0"></TD></TR>
<TR><TD><DIV STYLE="margin:3;text-align:center"><INPUT CLASS="submit" TYPE="submit" NAME="sel_entry" VALUE="{display}"></DIV></TR>
 </FORM>

</TD></TR></TABLE>
</DIV>
</TD></TR></TABLE>