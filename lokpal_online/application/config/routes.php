<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home/index';
$route['404_override'] = 'Error_controller';
$route['translate_uri_dashes'] = FALSE;

#Counter filing
$route['c-filing'] = 'counter/counterfiling';

//public user
$route['e-filing'] = 'filing/dashboard';
$route['e-filing/form'] = 'filing/filing';
$route['e-filing/form/(:num)'] = 'filing/filing/$1';
$route['e-filing/list-of-complaints'] = 'filing/dashboard_new';
$route['e-filing/list-completed'] = 'filing/dashboard_completed_complaint';
$route['e-filing/list-of-reopen-complaints'] = 'filing/dashboard_re_entry_complaint';


$route['officebeared/filing'] = 'applet/officebeared';
$route['compnay/additionalparty-add'] = 'applet/additionalparty';
$route['additional-public-servant/add'] = 'respondent/ad_public_servant';
$route['public-servant-additionalparty/add'] = 'applet/additionalparty';
$route['public-servant-witness/add'] = 'respondent/witnessdetail';
$route['(?i)([a-z0-9_-]+)/compnay/additionalparty-add'] = 'applet/additionalparty';

$route['(?i)([a-z0-9_-]+)/officebeared/filing'] = 'applet/officebeared';










//$route['e-filing/list-of-reopen-complaints/(:num)'] = 'filing/dashboard_re_entry_complaint/$1';

//Complaint Entry
$route['internal-filing'] = 'counter/dashboard_main_registry';
$route['internal-filing/ack-rec-for-phisical-filing'] = 'counter/dashboard_registry';
$route['respondent-filing'] = 'respondent/respondentfiling';
$route['affidavit-upload'] = 'document/testafidavit';
$route['phisical-file-upload'] = 'document/phisical';
$route['complaint/preview'] = 'affidavit/affidavit_detail';
$route['company/filing'] = 'applet/appletfiling';
$route['company-save'] = 'applet/officsave';
$route['public/filing'] = 'respondent/respondentfiling';






//scrutiny

$route['scrutiny'] = 'scrutiny/dashboard_main';
$route['scrutiny/dash'] = 'scrutiny/dashboard';
$route['scrutiny/dash/def'] = 'scrutiny/dashboard_def';
$route['scrutiny/list'] = 'scrutiny/scrutiny_report';
$route['case-search'] = 'search/search_case';
$route['checklist'] = 'scrutiny/checklist';
$route['re-entry'] = 'scrutiny/openedit';

$route['report/external-agency-inquiry'] = 'scrutiny/agency_report_chk/RI';
$route['report/external-agency-investigation'] = 'scrutiny/agency_report_chk/RV';
$route['report/submission-external-agency'] = 'scrutiny/reg_proceeding_form';

$route['opportunity/list-of-public-servant-inquiry'] = 'scrutiny/ps_report_chk/OPI';

$route['opportunity/list-of-public-servant-investigation'] = 'scrutiny/ps_report_chk/OIR';

$route['any-other-action/list-of-report'] = 'scrutiny/ps_report_chk/AOA';

$route['report/submission-any-other-action'] = 'scrutiny/aoa_proceeding_form';






$route['report/opportunity-after-inquiry-investigation'] = 'scrutiny/ops_proceeding_form';




























/*
$route['e-filing/upd-pass'] = 'user/update_user_pass';

$route['e-filing/(:num)'] = 'filing/filing/$1';
*/

#scrut