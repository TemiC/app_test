<html>
<head>
<LINK rel="stylesheet" type="text/css" href="graphismes.css">
</head>
<body background="fond.jpg">
<BR><BR><BR><BR><BR>
<P ALIGN="CENTER">
<?
$reponse=$_POST['reponse'];
$reponse=strtolower($reponse);
$no=$_POST['no'];
$points=$_POST['points'];
$essai=$_POST['essai'];
$essai++;
$points--;
for($aze=1 ;$aze!=3 ;$aze++)
{

//la suite, c les question et les reponses correspondantes. elles ne doivent pas 
//contenir de guillements, ou ils doivent être precedés d'un antislash

if($no==1)
{
$qu="question1";    //votre premiere question
$rep="reponse1";    //la reponse que vous prevoyez a cette question
}
if($no==2)
{
$qu="question2";    //idem
$rep="reponse2";    //idem, et toujours idem pour la suite
}
if($no==3)
{
$qu="question3";
$rep="reponse3";
}
if($no==4)
{
$qu="question4";
$rep="reponse4";
}
if($no==5)
{
$qu="question5";
$rep="reponse5";
}
if($no==6)
{
$qu="question6";
$rep="reponse6";
}
if($no==7)
{
$qu="question7";
$rep="reponse7";
}
if($no==8)
{
$qu="question8";
$rep="reponse8";
}
if($no==9)
{
$qu="question9";
$rep="reponse9";
}
if($no==10)
{
$qu="question10";    //derniere question
$rep="reponse10";    //reponse a la derniere question
}
if($reponse==$rep or $essai==3)
{
$essai=0;
$no++;
}
if($no==11)
{
include("gagne.php");
}
}
if($no<=10)
{
print("
<FONT FACE=\"Batang\" SIZE=\"6\" COLOR=\"#6666ff\">QUESTION $no".
"<BR><BR>
<SMALL><SMALL><SMALL>
$qu"."<BR><BR>
<form method=\"POST\" action=\"test.php\">
reponse:<input type=\"text\" name=\"reponse\" size=\"8\"><br>
<input type=\"submit\" value=\"valider\">
<input type=\"hidden\" value=\"$no\" name=\"no\">
<input type=\"hidden\" value=\"$points\" name=\"points\">
<input type=\"hidden\" value=\"$essai\" name=\"essai\">
</form>
");
}
?>
