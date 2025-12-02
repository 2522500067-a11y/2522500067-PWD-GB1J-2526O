<?php
function bersihkan($str)
{
return htmlspecialchars(trim($str));
}
function tidakKosong($str)
{
return strlen(trim($str)) > 0;
}
function formatTanggal($tgl)
{
return date("d M Y", strtotime($tgl));
}