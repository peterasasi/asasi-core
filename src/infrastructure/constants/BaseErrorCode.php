<?php


namespace by\infrastructure\constants;

/**
 * Class BaseErrorCode
 * @package App\Common\constants
 */
class BaseErrorCode
{
    const Success = 0;

    /**
     */
    const Undefined = -1;

    /**
     */
    const Lack_Parameter = 1000;

    /**
     * 404
     */
    const Not_Found_Resource = 1002;

    const Invalid_Parameter = 1003;

    const Business_Error = 1004;

    /**
     * Need Upgrade
     */
    const Api_Need_Update = 1005;

    const Api_EXCEPTION = 1006;

    const Retry = -2;


    const Api_No_Auth = 1007;

    const Api_Under_Maintenance = 1008;


    const User_Not_Verify_Email = 1112;

    const Api_Need_Login = 1111;


    const Api_Service_Is_Deprecated = 9666;

    const Api_Not_Support_For_Your_App = 9667;

    const Api_Request_Rate_Limit = 429;

}
