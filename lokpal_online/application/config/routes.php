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
$route['public-servant-additionalparty/add'] = 'respondent/additionalparty';
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
$route['public-servant/add-additonal-party'] = 'respondent/addsave';
$route['public-servant/add-witness-detail'] = 'respondent/witnessdetail';




$route['office-add-more'] = 'applet/officebeared';
$route['office-add-more-party'] = 'applet/additionalparty';

$route['additional-public-servant/add-more-party'] = 'respondent/ad_public_servant';
$route['public-servant/add-more-party'] = 'respondent/additionalparty';












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


//chairperson



$route['complaints/allocation-to-bench'] = 'bench/dashboard_main';
$route['bench/list-of-new-complaints'] = 'bench/get_complaints/F';
$route['bench/composition'] = 'bench/benchcomposition';
$route['bench/creation-of-bench'] = 'bench/benchcreation';
$route['bench/bench-composition-seprate'] = 'bench/benchcomposition_separate';

$route['bench/list-of-inquiry-report'] = 'bench/get_complaints/I';
$route['bench/list-of-investigaion-report'] = 'bench/get_complaints/V';
$route['bench/ops-report-after-pi'] = 'bench/get_complaints_ops/PIR';
$route['bench/ops-report-after-in'] = 'bench/get_complaints_ops/IR';
$route['bench/list-of-aoa-report'] = 'bench/get_complaints_ops/AOA';
$route['search-case'] = 'bench/search_case';
$route['list-of-bench'] = 'bench/benches_all';
$route['complaints-status'] = 'report/status_of_complaints';
$route['complaints/list-of-complaints-considration-lokpal'] = 'report/status_of_complaints_under_loi';



$route['complaints/under-pre-inquiry'] = 'report/list_of_complaints/I';
$route['complaints/under-investigation'] = 'report/list_of_complaints/V';
$route['complaints/under-considration-lokpal'] = 'report/list_of_complaints/U';
$route['complaints/closed'] = 'report/list_of_complaints/D';

//$route['e-filing/form/(:num)'] = 'filing/filing/$1';

/*
$route['complaints/fresh-complaint-considration'] = 'report/list_of_complaints_2/F';
$route['complaints/complaint-preliminay-inq'] = 'report/list_of_complaints_2/I';
$route['complaints/complaint-preliminay-investigation'] = 'report/list_of_complaints_2/V';
$route['complaints/complaint-any-other-purpose'] = 'report/list_of_complaints_2/O';
*/

$route['category/report'] = 'report/category_of_complaints';

$route['category/member-of-parliament'] = 'report/list_of_categories/M';

$route['category/group-a_and_b'] = 'report/list_of_categories/A';

$route['category/group-c_and_d'] = 'report/list_of_categories/E';

$route['category/list-of-other-cate'] = 'report/list_of_categories/C';
$route['category/others'] = 'report/list_of_categories/O';

$route['order-report/list-of-order-report'] = 'order_report/list_of_case';

$route['show-order-report'] = 'order_report/search_case_action';

















































































/*
$route['e-filing/upd-pass'] = 'user/update_user_pass';

$route['e-filing/(:num)'] = 'filing/filing/$1';
*/

#scrut