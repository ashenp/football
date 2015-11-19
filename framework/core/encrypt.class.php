<?php
/**
 * base64（3des）加密
 * @author zq
 * @copyright bestdo.com
 */
class Encrypt{
    private $key = "";
    private $iv = "";

    /**
     * @param string $key 加密密钥最大长度24
     * @param string $iv 限制长度8
     */
    function __construct($key, $iv)
    {
        if(empty($key) || strlen($key) > 24) {
            echo 'key is not valid';
            exit();
        }
        if(empty($iv) || strlen($iv) != 8) {
            echo 'iv is not valid';
            exit();
        }
        $this->key = $key;
        $this->iv = $iv;
    }

    /**
     *加密
     * @param $value
     */
    public function encrypt($value)
    {
        $td = mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_ECB, '');
        mcrypt_enc_get_block_size($td);
        $value = $this->PaddingPKCS7($value);
        mcrypt_generic_init($td, $this->key, $this->iv);
        $ret = base64_encode(mcrypt_generic($td, $value));
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        return $ret;
    }

    /**
     *解密
     * @param $value
     */
    public function decrypt($value)
    {
        $td = mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_ECB, '');
        mcrypt_generic_init($td, $this->key, $this->iv);
        $ret = trim(mdecrypt_generic($td, base64_decode($value)));
        $ret = $this->UnPaddingPKCS7($ret);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        return $ret;
    }

    private function PaddingPKCS7($data)
    {
        if(is_array($data)) {
            $data = json_encode($data);
        }

        $block_size = mcrypt_get_block_size('tripledes', MCRYPT_MODE_ECB);
        $padding_char = $block_size - (strlen($data) % $block_size);
        $data .= str_repeat(chr($padding_char), $padding_char);
        return $data;
    }

    private function UnPaddingPKCS7($text)
    {
        $pad = ord($text{strlen($text) - 1});
        if($pad > strlen($text)) {
            return false;
        }
        if(strspn($text, chr($pad), strlen($text) - $pad) != $pad) {
            return false;
        }
        return substr($text, 0, -1 * $pad);
    }
}
