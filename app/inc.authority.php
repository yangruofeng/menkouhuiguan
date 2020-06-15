<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2016/8/30
 * Time: 17:09
 */
class authEnum extends Enum
{
    /* back office权限设置开始*/
    const AUTH_HOME_MONITOR = "monitor_monitor";

    const AUTH_USER_BRANCH = "user_branch";
    const AUTH_USER_ROLE = "user_role";
    const AUTH_USER_USER = "user_user";
    const AUTH_USER_STAFF = "user_staff";
    const AUTH_USER_COMMITTEE = "user_committee";
    const AUTH_USER_BIND_CARD = "user_bindCard";
    const AUTH_SETTING_COMPANY_INFO = "setting_companyInfo";
    const AUTH_REGION_LIST = "region_list";
    const AUTH_USER_LOG = "user_log";

    const AUTH_CLIENT_CLIENT = "client_client";
    const AUTH_CLIENT_CERIFICATION = "client_cerification";
    const AUTH_CLIENT_BLACK_LIST = "client_blackList";
    const AUTH_CLIENT_GRADE = "client_grade";

    const AUTH_LOAN_COMMITTEE_APPROVE_CREDIT_APPLICATION = "loan_committee_approveCreditApplication";
    const AUTH_LOAN_COMMITTEE_USER_VOTE = "loan_committee_userVote";
//    const AUTH_LOAN_COMMITTEE_FAST_GRANT_CREDIT = "loan_committee_fastGrantCredit";
//    const AUTH_LOAN_COMMITTEE_CUT_CREDIT = "loan_committee_cutCredit";
    const AUTH_LOAN_COMMITTEE_GRANT_CREDIT_HISTORY = "loan_committee_grantCreditHistory";
    const AUTH_LOAN_COMMITTEE_APPROVE_PREPAYMENT_REQUEST = "loan_committee_approvePrepaymentRequest";
    const AUTH_LOAN_COMMITTEE_APPROVE_PENALTY_REQUEST = "loan_committee_approvePenaltyRequest";
    const AUTH_LOAN_COMMITTEE_APPROVE_WRITTEN_OFF_REQUEST = "loan_committee_approveWrittenOffRequest";
    const AUTH_LOAN_COMMITTEE_APPROVE_WITHDRAW_MORTGAGE_REQUEST = "loan_committee_approveWithdrawMortgageRequest";
    const AUTH_LOAN_COMMITTEE_APPROVE_EXCEPTION_PROCESS = "loan_committee_approveExceptionProcessRequest";


    const AUTH_LOAN_PRODUCT = "loan_product";
    const AUTH_LOAN_INTEREST_PACKAGE = "loan_productPackagePage";
    const AUTH_LOAN_SETTING_CREDIT_CATEGORY = "loan_category";
    const AUTH_LOAN_SETTING_FEE = "loan_loanFeeSetting";
    const AUTH_LOAN_PREPAYMENT_LIMIT = "loan_prepaymentLimit";
    const AUTH_SETTING_CREDIT_LEVEL = 'setting_creditLevel';
    const AUTH_SETTING_INDUSTRY = "setting_industry";
    const AUTH_SETTING_INDUSTRY_PLACE = "setting_industry_place";
    const AUTH_SETTING_ASSET_SURVEY = "setting_assetSurvey";

    const AUTH_SAVINGS_CATEGORY = "savings_category";
    const AUTH_SAVINGS_PRODUCT = "savings_product";
    const AUTH_SAVINGS_PACKAGE = "savings_package";

    const AUTH_FINANCIAL_HQ_VAULT = "financial_hqVault";
    const AUTH_PARTNER_BANK = "partner_bank";
    const AUTH_FINANCIAL_HQ_BANK = "financial_hqBank";
    const AUTH_FINANCIAL_BRANCH_BANK = "financial_branchBank";
    const AUTH_FINANCIAL_EXCHANGE_RATE = "financial_exchangeRate";
    const AUTH_FINANCIAL_CHECK_BILLPAY = "financial_checkBillPay";
    const AUTH_TREASURE_BRANCH_LIST = "treasure_branchList";
    const AUTH_TREASURE_SETTING_CIV_EXTRA_TYPE = "treasure_settingCIVExtraType";

    const AUTH_GL_TREE_INDEX = "gl_tree_index";
    const AUTH_GL_TREE_BATCH = "gl_tree_batch";
    const AUTH_GL_TREE_VOUCHER_INDEX = "gl_tree_voucherIndex";

    const AUTH_DATA_CENTER_BRANCH_INDEX = "data_center_branch_index";
    const AUTH_DATA_CENTER_STAFF_INDEX = "data_center_staff_index";
    const AUTH_DATA_CENTER_PARTNER_INDEX = "data_center_partner_index";
    const AUTH_DATA_CENTER_BANK_INDEX = "data_center_bank_index";
    const AUTH_DATA_CENTER_MEMBER_INDEX = "data_center_member_index";
    const AUTH_DATA_CENTER_CERTIFICATION_INDEX = "data_center_certification_index";
    const AUTH_DATA_CENTER_BUSINESS_INDEX = "data_center_business_index";
    const AUTH_DATA_CENTER_DAILY_INDEX = "data_center_daily_index";

    const AUTH_REPORT_LOAN = "report_loan_loan";
    const AUTH_REPORT_LOAN_ANALYSIS = "report_loan_analysis_index";
    const AUTH_REPORT_LOAN_SUPER = "report_super_loan_index";

    const AUTH_REPORT_REPAYMENT = "report_repayment_repayment";
    const AUTH_REPORT_DISBURSEMENT = "report_disbursement_disbursement";
    const AUTH_REPORT_OUTSTANDING = "report_outstanding";
    const AUTH_REPORT_CUSTOMER = "report_customer_customer";
//    const AUTH_REPORT_CROSS_APPLICATION = "report_cross_application_crossApplication";
    const AUTH_REPORT_BALANCE_SHEET = "report_passbook_balanceSheet";
    const AUTH_REPORT_INCOME_STATEMENT = "report_passbook_incomeStatement";
    const AUTH_REPORT_JOURNAL_VOUCHER = "report_passbook_journalVoucher";
    const AUTH_REPORT_RECEIVABLE_INTEREST = "report_passbook_receivableInterest";
    const AUTH_REPORT_ACCOUNT_BALANCE = "report_passbook_accountBalance";


    const AUTH_CHARTS_REPORT_LOAN_TOTAL = "charts_report_loanTotal";

    const AUTH_POINT_EVENT = "point_event";
    const AUTH_POINT_POINT_RECORD = "point_pointRecord";
    const AUTH_POINT_USER_POINT = "point_userPoint";

    const AUTH_TOOLS_CALCULATOR = "tools_calculator";

    const AUTH_WORKHANDOVER_CO_CLIENT = 'work_handover_coWorkHandoverPage';

    /* back office权限设置结束*/

    /*counter权限设置开始*/
    const AUTH_MEMBER_REGISTER = "member_register";
    const AUTH_MEMBER_MY_CLIENT = "member_my_client";
    const AUTH_MEMBER_DOCUMENT_COLLECTION = "member_documentCollection";
    const AUTH_MEMBER_FINGERPRINT_COLLECTION = "member_fingerprintCollection";
    const AUTH_MEMBER_AUTHORIZED_CONTRACT = "member_authorizedContract";
    const AUTH_MEMBER_LOAN = "member_loan";
    const AUTH_MEMBER_REPAYMENT = "member_repayment";
    const AUTH_MEMBER_DEPOSIT = "member_deposit";
    const AUTH_MEMBER_WITHDRAWAL = "member_withdrawal";
    const AUTH_MEMBER_PENALTY = "member_penalty";
    const AUTH_MEMBER_PROFILE = "member_profile";

    const AUTH_COMPANY_INDEX = "company_index";

    const AUTH_SERVICE_LOAN_CONSULT = "service_loanConsult";
    const AUTH_SERVICE_MY_CONSULTATION = "service_my_consultation";
    const AUTH_SERVICE_CURRENCY_EXCHANGE = "service_currencyExchange";

    const AUTH_MORTGAGE_INDEX = "mortgage_index";
    const AUTH_COUNTER_MORTGAGE_MY_STORAGE = "mortgage_myStoragePage";
    const AUTH_COUNTER_MORTGAGE_RECEIVE_TRANSFER = "mortgage_pendingReceiveFromTransfer";
    const AUTH_COUNTER_MORTGAGE_RECEIVE_CLIENT = "mortgage_pendingReceiveFromClient";
    const AUTH_COUNTER_MORTGAGE_REQUEST_WITHDRAW = "mortgage_pendingWithdrawByRequest";


    const AUTH_CASH_ON_HAND_TRANSACTIONS = "cash_on_hand_transactions";
    const AUTH_CASH_ON_HAND_PENDING_RECEIVE = "cash_on_hand_pendingReceive";
    const AUTH_CASH_ON_HAND_TRANSFER_TO_VAULT = "cash_on_hand_transferToVault";
    const AUTH_CASH_ON_HAND_CASH_IN = "cash_on_hand_cashIn";
    const AUTH_CASH_ON_HAND_CASH_OUT = "cash_on_hand_cashOut";

    const AUTH_CASH_IN_VAULT_TRANSACTIONS = "cash_in_vault_transactions";
    const AUTH_CASH_IN_VAULT_BANK = "cash_in_vault_bank";
    const AUTH_CASH_IN_VAULT_PENDINGRECEIVE = "cash_in_vault_pendingReceive";
    const AUTH_CASH_IN_VAULT_TRANSFERTOCASHIER = "cash_in_vault_transferToCashier";
    const AUTH_CASH_IN_VAULT_CASHIER = "cash_in_vault_cashier";
    const AUTH_CASH_IN_VAULT_CASH_IN = "cash_in_vault_cashIn";
    const AUTH_CASH_IN_VAULT_CASH_OUT = "cash_in_vault_cashOut";
    /*counter权限设置结束*/
}

interface IauthGroup
{
    function getGroupKey();

    function getGroupName();

    function getAuthList();
}
class authGroupBase Implements IauthGroup{
    private $auth_list=array();
    private $group_key;
    private $group_title;

    public function __construct($group_key,$entry_key){
        $this->group_key=$group_key;
        $sql="select * from um_auth where group_key=".qstr($group_key)." and entry_key=".qstr($entry_key);
        $rows=(new ormReader())->getRows($sql);
        if(count($rows)){
            $first=current($rows);
            $this->group_title=$first['group_title'];
            $this->auth_list=$rows;
        }
    }
    function getGroupKey()
    {
        return $this->group_key;
    }

    function getGroupName()
    {
        return $this->group_title;
    }

    function getAuthList()
    {
        $arr=array();
         foreach($this->auth_list as $item){
             $arr[]=$item['uid'];
         }
        return $arr;
    }
    function getAuthFullList(){
        $arr=array();
        foreach($this->auth_list as $item){
            $arr[$item['uid']]=$item['auth_title'];
        }
        return $arr;
    }
}
