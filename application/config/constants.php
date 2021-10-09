<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

//module----------------------------------------------------

define('MO_USER_CREATE', 'USER_CREATE');
define('MO_USER_LIST', 'USER_LIST');
define('MO_USER_VIEW', 'USER_VIEW');
define('MO_USER_EDIT', 'USER_EDIT');

define('MO_CUSTOMER_CREATE', 'CUSTOMER_CREATE');
define('MO_CUSTOMER_LIST', 'CUSTOMER_LIST');
define('MO_CUSTOMER_VIEW', 'CUSTOMER_VIEW');
define('MO_CUSTOMER_EDIT', 'CUSTOMER_EDIT');

define('MO_ITEM_CREATE', 'ITEM_CREATE');
define('MO_ITEM_LIST', 'ITEM_LIST');
define('MO_ITEM_VIEW', 'ITEM_VIEW');
define('MO_ITEM_EDIT', 'ITEM_EDIT');

define('MO_SUPPLIER_CREATE', 'SUPPLIER_CREATE');
define('MO_SUPPLIER_LIST', 'SUPPLIER_LIST');
define('MO_SUPPLIER_VIEW', 'SUPPLIER_VIEW');
define('MO_SUPPLIER_EDIT', 'SUPPLIER_EDIT');

define('MO_CATEGORY_CREATE', 'CATEGORY_CREATE');
define('MO_CATEGORY_LIST', 'CATEGORY_LIST');
define('MO_CATEGORY_VIEW', 'CATEGORY_VIEW');
define('MO_CATEGORY_EDIT', 'CATEGORY_EDIT');

define('MO_COMPANY_CREATE', 'COMPANY_CREATE');
define('MO_COMPANY_LIST', 'COMPANY_LIST');
define('MO_COMPANY_VIEW', 'COMPANY_VIEW');
define('MO_COMPANY_EDIT', 'COMPANY_EDIT');

define('MO_MODEL_CREATE', 'MODEL_CREATE');
define('MO_MODEL_LIST', 'MODEL_LIST');
define('MO_MODEL_VIEW', 'MODEL_VIEW');
define('MO_MODEL_EDIT', 'MODEL_EDIT');

define('MO_VEHICLE_CREATE', 'VEHICLE_CREATE');
define('MO_VEHICLE_LIST', 'VEHICLE_LIST');
define('MO_VEHICLE_VIEW', 'VEHICLE_VIEW');
define('MO_VEHICLE_EDIT', 'VEHICLE_EDIT');

define('MO_SERVICE_CREATE', 'SERVICE_CREATE');
define('MO_SERVICE_LIST', 'SERVICE_LIST');
define('MO_SERVICE_VIEW', 'SERVICE_VIEW');
define('MO_SERVICE_EDIT', 'SERVICE_EDIT');

define('MO_TIME_CREATE', 'TIME_CREATE');
define('MO_TIME_LIST', 'TIME_LIST');
define('MO_TIME_VIEW', 'TIME_VIEW');
define('MO_TIME_EDIT', 'TIME_EDIT');

define('MO_MODULE_CREATE', 'MODULE_CREATE');
define('MO_MODULE_LIST', 'MODULE_LIST');
define('MO_MODULE_VIEW', 'MODULE_VIEW');
define('MO_MODULE_EDIT', 'MODULE_EDIT');

define('MO_ROLE_CREATE', 'ROLE_CREATE');
define('MO_ROLE_LIST', 'ROLE_LIST');
define('MO_ROLE_VIEW', 'ROLE_VIEW');
define('MO_ROLE_EDIT', 'ROLE_EDIT');

define('MO_PERMISSION_LIST', 'PERMISSION_LIST');
define('MO_PERMISSION_ASSIGN', 'PERMISSION_ASSIGN');

define('MO_DASHBOARD', 'DASHBOARD');

define('MO_INVOICE_CREATE', 'INVOICE_CREATE');
define('MO_INVOICE_LIST', 'INVOICE_LIST');
define('MO_INVOICE_VIEW', 'INVOICE_VIEW');

define('MO_RECEIPT_CREATE', 'RECEIPT_CREATE');
define('MO_RECEIPT_LIST', 'RECEIPT_LIST');
define('MO_RECEIPT_VIEW', 'RECEIPT_VIEW');

define('MO_GRN_CREATE', 'GRN_CREATE');
define('MO_GRN_LIST', 'GRN_LIST');
define('MO_GRN_VIEW', 'GRN_VIEW');

define('MO_BOOKING_CREATE', 'BOOKING_CREATE');
define('MO_BOOKING_LIST', 'BOOKING_LIST');
define('MO_BOOKING_VIEW', 'BOOKING_VIEW');

define('MO_HOLIDAY_CREATE', 'HOLIDAY_CREATE');
define('MO_HOLIDAY_LIST', 'HOLIDAY_LIST');
define('MO_HOLIDAY_EDIT', 'HOLIDAY_EDIT');

define('MO_GRN_SUMMERY', 'GRN_SUMMERY');
define('MO_GRN_DETAIL', 'GRN_DETAIL');

define('MO_GRN_SEARCH_SUMMERY', 'GRN_SEARCH_SUMMERY');
define('MO_GRN_SEARCH_DETAIL', 'GRN_SEARCH_DETAIL');

define('MO_BOOKING_SUMMERY', 'BOOKING_SUMMERY');
define('MO_BOOKING_DETAIL', 'BOOKING_DETAIL');

define('MO_BOOKING_SEARCH_SUMMERY', 'BOOKING_SEARCH_SUMMERY');
define('MO_BOOKING_SEARCH_DETAIL', 'BOOKING_SEARCH_DETAIL');

define('MO_INVOICE_SUMMERY', 'INVOICE_SUMMERY');
define('MO_INVOICE_DETAIL', 'INVOICE_DETAIL');

define('MO_INVOICE_SEARCH_SUMMERY', 'INVOICE_SEARCH_SUMMERY');
define('MO_INVOICE_SEARCH_DETAIL', 'INVOICE_SEARCH_DETAIL');

define('MO_RECEIPT_SUMMERY', 'RECEIPT_SUMMERY');
define('MO_RECEIPT_DETAIL', 'RECEIPT_DETAIL');

define('MO_CONTACT_LIST', 'CONTACT_LIST');
define('MO_CONTACT_REPLY', 'CONTACT_REPLY');
//module----------------------------------------------------------------


//user status
define('USER_ACTIVE', 1);
define('USER_INACTIVE', 0);

//gender type
define('GENDER_MALE', 1);
define('GENDER_FEMALE', 2);

//role status
define('ROLE_ACTIVE', 1);
define('ROLE_INACTIVE', 0);

//modlule status
define('MODULE_ACTIVE', 1);
define('MODULE_INACTIVE', 0);

//leave type (leave_type)
define('LEAVE_CASUAL', 1);
define('LEAVE_VACATION', 2);

//common active status
define('ACTIVE', 1);
define('INACTIVE', 0);
