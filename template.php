<?
 /*************************************************************************
 * 
 * Global Technology Restoration Services Corp. 
 * __________________
 * 
 *  [2013]-[2014] Global Technology Restoration Services Corp.
 *  All Rights Reserved.
 * 
 * NOTICE:  All information contained herein is, and remains
 * the property of Global Technology Restoration Services Corp. and its suppliers,
 * if any.  The intellectual and technical concepts contained
 * herein are proprietary to Global Technology Restoration Services Corp.
 * and its suppliers and may be covered by U.S. and Foreign Patents,
 * patents in process, and are protected by trade secret or copyright law.
 * Dissemination of this information or reproduction of this material
 * is strictly forbidden unless prior written permission is obtained
 * from Global Technology Restoration Services Corp.
 *
 *Code Writen by: Corey "David" Herrera for Global Technology Restoration Services Corp.
 *
 *
 */

include$_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();if(login_check($mysqli)==true){?>


<p>This Template works!!!</p>
<?}else{echo ("You are not authorized to access this page, please <a href=\"http://$_SERVER[HTTP_HOST]/AUTH/login.html\">login</a>. <br/>");}?>
