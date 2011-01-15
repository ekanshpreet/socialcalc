<script type="text/javascript" src="{$site_root_path}_lib/spreadsheets/socialcalcconstants.js"></script>
<script type="text/javascript" src="{$site_root_path}_lib/spreadsheets/socialcalc-3.js"></script>
<script type="text/javascript" src="{$site_root_path}_lib/spreadsheets/socialcalctableeditor.js"></script>
<script type="text/javascript" src="{$site_root_path}_lib/spreadsheets/formatnumber2.js"></script>
<script type="text/javascript" src="{$site_root_path}_lib/spreadsheets/formula1.js"></script>
<script type="text/javascript" src="{$site_root_path}_lib/spreadsheets/socialcalcpopup.js"></script>
<script type="text/javascript" src="{$site_root_path}_lib/spreadsheets/socialcalcspreadsheetcontrol.js"></script>
<script type="text/javascript" src="{$site_root_path}_lib/spreadsheets/socialcalcworkbook.js"></script>
<script type="text/javascript" src="{$site_root_path}_lib/spreadsheets/socialcalcworkbookcontrol.js"></script>
<script type="text/javascript" src="{$site_root_path}_lib/spreadsheets/json2.js"></script>
<link rel="stylesheet" type="text/css" href="{$site_root_path}_lib/spreadsheets/socialcalc.css">
{literal}
<div id="workbookControl" style="padding:6px;background-color:#80A9F3;">
</div>

<div style="margin:8px 0px 10px 0px;">
 <div id="tableeditor" style="margin:8px 0px 10px 0px;">editor goes here</div>
</div>
 <div id="msg" onclick="this.innerHTML='&nbsp;';"></div>


<script>

var spreadsheet = new SocialCalc.SpreadsheetControl();

var workbook = new SocialCalc.WorkBook(spreadsheet);
workbook.InitializeWorkBook("sheet1");

spreadsheet.InitializeSpreadsheetControl("tableeditor");
spreadsheet.ExecuteCommand('redisplay', '');


var workbookcontrol = new SocialCalc.WorkBookControl(workbook,"workbookControl","sheet1");
workbookcontrol.InitializeWorkBookControl();

spreadsheet.DoOnResize()

</script>
{/literal}