<?php
/**
 * 网站公用服务封装类
 * @author liu
 * 2014-05-24
 */
class Service {
    /**
     * 获得一个城市的天气
     *
     * @param int $cityId 城市ID
     */
    public static function weather($cityId) {
        $key = 'GLOBLE_WEATHER_'.$cityId;
        return cache::get($key);
    }

    /**
     * 通用发送短信
     * @param $mobile 短信接收手机号码
     * @param $params 短信中需要的参数
     * @param $template 短信使用模板
     * @param $channel 强制通道发送
     */
    public static function sendSms($mobile, $params, $template, $ext="【百动网】", $channel = 'default') {
        $sms = array(
            'mobile' => $mobile,
            'mark_param' => $params,
            'mark' => $template,
            'channel' => $channel,
        	'ext' => $ext
        );
        return queue::push('queue:GLOBLE_SMS_QUEUE', $sms);
    }

    /**
     * 通用发送邮件
     * @param $email 邮件接收地址
     * @param $params 邮件参数
     * @param $template 邮件模板
     * @param string $channel 邮件发送通道
     */
    public static function sendEmail($email, $params, $template, $channel = 'default') {
        //@todo
    }

    public static function sendSimpleEmail($email, $content, $channel = 'default') {
        //@todo
    }
}

?>