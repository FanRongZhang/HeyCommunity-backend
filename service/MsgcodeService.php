<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/12
 * Time: 12:54
 */

namespace Service;
//引用自我的 https://git.oschina.net/_-_-_-/oncarry
class MsgcodeService{
    // 公共信息
    const OP_SUCCESS = 0;	// 操作成功
    const OP_FAILRE = 1;	// 操作失败

    const ERROR_SIGN = 2;   //签名错误
    const ERROR_PARAM = 3; // 参数错误

    const HAD_MODIFY_7DAYS =4;
    const NOT_A_CARRIER = 5;
    const HAVE_CARRIER = 6;

    const NOT_LOGIN = 7;
    const ATLEAST_ONE_GOODS_IN_CART= 8;

    const HAD_ONE_PIN_DAN_WAIT_TO_PAY = 9;
    const CANOT_QUITOUT_PINDAN_CREATED_BY_SELF_BEFORE_EXPIRE_TIME = 10;
    const CANOT_JOIN_THIS_PINDAN = 11;
    const CANOT_FIND_ABLE_JOIN_PINDAN=12;
    const NOT_IN_THIS_PINDAN = 13;
    const HE_HAD_PAID_FOR_THIS_PINDAN=14;
    const NO_GOODS_IN_CART= 15;
    const CANOT_QUIT_THIS_PINDAN=16;

    const TOO_MANY_ADDRESS = 17;

    const HAD_FOLLOWED = 18;

    const MMBI_NOT_ENOUGH = 19;

    const HAD_PRAISED = 20;

    const NOTE_NOT_EXISTS = 21;

    private static $COMMON_RET = [
        self::OP_SUCCESS => '操作成功',
        self::OP_FAILRE => '操作失败',

        self::ERROR_SIGN => '签名不对',
        self::ERROR_PARAM => '参数不对',

        self::HAD_MODIFY_7DAYS=>'7天内已经修改过了',
        self::NOT_A_CARRIER=>'你还不是一个运送人，请去“我”进行设置',
        self::HAVE_CARRIER=>'已经有运送人了',

        self::NOT_LOGIN =>'还未登录',

        self::ATLEAST_ONE_GOODS_IN_CART=>'购物车里面至少需要一件商品才可以发起拼单',
        self::HAD_ONE_PIN_DAN_WAIT_TO_PAY =>'还存在待支付的未过期拼单',
        self::CANOT_QUITOUT_PINDAN_CREATED_BY_SELF_BEFORE_EXPIRE_TIME =>'在未过期前不能退出自己创建的拼单',
        self::CANOT_JOIN_THIS_PINDAN =>'不能加入不对外开放或者即将或者已经过期的拼单',
        self::CANOT_FIND_ABLE_JOIN_PINDAN=>'未发现可加入的拼单',
        self::NOT_IN_THIS_PINDAN=>'TA已经不在该拼单里面了',
        self::HE_HAD_PAID_FOR_THIS_PINDAN=>'TA已经完成支付了，你无法查看了',
        self::NO_GOODS_IN_CART=>'购物车里面无商品',
        self::CANOT_QUIT_THIS_PINDAN=>'拼单结束30分钟前才能退出',

        self::TOO_MANY_ADDRESS=>'设置太多收件地址了',

        self::HAD_FOLLOWED=>'我已经关注了TA',

        self::MMBI_NOT_ENOUGH=>'MM币不够',

        self::HAD_PRAISED=>'已经赞过了',

        self::NOTE_NOT_EXISTS=>'该日记已经不存在',
    ];

    /**
     * 获取消息提示信息
     *
     * @param int $ret
     * @return string
     */
    public static function getRetMsg($ret){
        $msg = !empty(self::$COMMON_RET[$ret]) ? self::$COMMON_RET[$ret] : '';
        return $msg;
    }

}
