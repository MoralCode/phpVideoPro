<BR>
<TABLE ALIGN="center" CELLPADDING="0" CELLSPACING="0" BORDER="0" Style="table-layout:fixed" id="appWin"><TR><TD>
<DIV STYLE="display:inline">
<TABLE CELLPADDING="0" CELLSPACING="0" CLASS="window" BORDER="0" ALIGN="center"><TR><TD>
<TABLE WIDTH="100%" CELLPADDING="0" CELLSPACING="0" BORDER="0">
 <TR><TD NOWRAP WIDTH="100%" CLASS="wintitle"><DIV STYLE="margin:2">{listtitle}</DIV></TD>
     <TD ALIGN="right" CLASS="wintitle" STYLE="vertical-align:middle;">
      <INPUT TYPE="image" NAME="button_home" CLASS="imgbut" SRC="{tpl_dir}images/win_home.gif" STYLE="width:14;height:13;" onClick="window.location.href='index.php'" TITLE="{btn_index}"></TD>
     <TD ALIGN="right" CLASS="wintitle" STYLE="vertical-align:middle;">
      <INPUT TYPE="image" NAME="button_back" CLASS="imgbut" SRC="{tpl_dir}images/win_back.gif" STYLE="width:14;height:13;" onClick="history.back()" TITLE="{btn_back}"></TD>
     <TD CLASS="wintitle" STYLE="vertical-align:middle;margin-right:3;"><DIV STYLE="width:18;">
      <INPUT TYPE="image" NAME="button_close" CLASS="imgbut" SRC="{tpl_dir}images/win_close.gif" STYLE="width:14;height:13;" onClick="window.close()" TITLE="{btn_close}"></DIV></TD></TR>
</TABLE></TD></TR>
<TR><TD BGCOLOR="#AAAAAA"><IMG SRC="{tpl_dir}images/0.gif" WIDTH="1" HEIGHT="1" BORDER="0" ALT=""></TD></TR>
<TR><TD BGCOLOR="#FFFFFF"><IMG SRC="{tpl_dir}images/0.gif" WIDTH="1" HEIGHT="1" BORDER="0" ALT=""></TD></TR>
<TR><TD>

<DIV STYLE="margin:5;text-align:center">
<TABLE ALIGN="center" BORDER="0" CELLSPACING="0" CELLPADDING="2">
<TR CLASS="content"><TD>

<!-- BEGIN resultblock -->
<TABLE ALIGN="center" BORDER="0" CELLSPACING="0" CELLPADDING="2" WIDTH="100%">
 <!-- BEGIN resitemblock -->
 <TR><TD><DIV ALIGN="center">{movie}</DIV></TD>
     <TD><DIV ALIGN="justify">{links}</DIV></TD></TR>
 <!-- END resitemblock -->
</TABLE>
<!-- END resultblock -->

<!-- BEGIN movieblock -->
<TABLE ALIGN="center" BORDER="0" CELLSPACING="0" CELLPADDING="2" WIDTH="100%">
 <TR><TH COLSPAN="2"><DIV ALIGN="center">{mtitle}</DIV></TH></TR>
 <TR><TD><B>Also known as:</B></TD><TD>{maka}</TD></TR>
 <TR><TD><B>{ncountry}</B></TD><TD>{mcountry}</TD></TR>
 <TR><TD><B>{nyear}:</B></TD><TD>{myear}</TD></TR>
 <TR><TD><B>{nruntime}:</B></TD><TD>{mruntime} min</TD></TR>
 <TR><TD><B>{ngenre}:</B></TD><TD>{mgenre}</TD></TR>
 <TR><TD><B>{ndir_name}:</B></TD><TD>{dir_name}</TD></TR>
 <TR><TD><B>{actors}:</B></TD>
   <TD><SELECT NAME="actors" SIZE="7" MULTIPLE CLASS="multiselect">
 <!-- BEGIN actblock -->
    <OPTION VALUE="{aname}"{asel}>{aname}</OPTION>
 <!-- END actblock -->
  </SELECT>
 </TD></TR>
 <TR><TD COLSPAN="2"><P ALIGN="justify">{mfoto_pic}{mcomment}</P></TD></TR>
 <TR><TD><B>Foto:</B></TD><TD>'{mfoto}'</TD></TR>
</TABLE>
<!-- END movieblock -->

</TD></TR></TABLE>
</DIV>

</TD></TR>
</TABLE>
</DIV>
</TD></TR></TABLE>