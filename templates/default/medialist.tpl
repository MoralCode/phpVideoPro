<H2 Align=Center>{listtitle}</H2>
<TABLE ALIGN=CENTER BORDER=0>
 <TR><TD>{first}{left}</TD>
     <TD><DIV ALIGN="RIGHT">{right}{last}</DIV></TD></TR>
 <TR><TD COLSPAN=2>
  <TABLE ALIGN=Center BORDER=1>
   <TR><TH><A HREF="{scriptname}{crits}">{mtype}</A></TH>
       <TH><A HREF="{scriptname}{crits}">{nr}</A></TH>
       <TH><A HREF="{scriptname}?order=title{ocrits}">{title}</A></TH>
       <TH><A HREF="{scriptname}?order=length{ocrits}">{length}</A></TH>
       <TH><A HREF="{scriptname}?order=year{ocrits}">{year}</A></TH>
       <TH><A HREF="{scriptname}?order=date{ocrits}">{date}</A></TH>
       <TH><A HREF="{scriptname}?order=cat{ocrits}">{category}</A></TH>
   </TR>
   <!-- BEGIN mdatablock -->
   <TR><TD>{mtype}</TD>
       <TD><A HRef={url}>{nr}</A></TD>
       <TD>{title}</TD>
       <TD>{length}</TD>
       <TD>{year}</TD>
       <TD>{date}</TD>
       <TD>{category}</TD>
   </TR>
   <!-- END mdatablock -->
   <!-- BEGIN emptyblock -->
   <TR><TD COLSPAN="7"><DIV ALIGN="center">{no_data}</DIV></TD></TR>
   <!-- END emptyblock -->
  </Table>
 </TD></TR>
 <TR><TD>{first}{left}</TD>
     <TD><DIV ALIGN="RIGHT">{right}{last}</DIV></TD></TR>
</TABLE>
