<?php

function siy_price_format($price, $change_price = true, $price_format = 0)
{
    if ($change_price)
    {
        switch ($price_format)
        {
            case 0:
                $price = preg_replace('/(.*)(\\.)([0-9]{2})$/', '\1<sub>\2\3</sub>', number_format($price, 2, '.', ''));
                break;
            case 1: // 保留不为 0 的尾数
                $price = preg_replace('/(.*)(\\.)([0-9]*?)0+$/', '\1<sub>\2\3</sub>', number_format($price, 2, '.', ''));

                if (substr($price, -12) == '<sub>.</sub>')
                {
                    $price = substr($price, 0, -12);
                }
                break;
            case 2: // 不四舍五入，保留1位
                $price = preg_replace('/(.*)(\\.)([0-9]{1})$/', '\1<sub>\2\3</sub>', substr(number_format($price, 2, '.', ''), 0, -1));
                break;
            case 3: // 直接取整
                $price = intval($price);
                break;
            case 4: // 四舍五入，保留 1 位
                $price = preg_replace('/(.*)(\\.)([0-9]{1})$/', '\1<sub>\2\3</sub>', number_format($price, 1, '.', ''));
                break;
            case 5: // 先四舍五入，不保留小数
                $price = round($price);
                break;
        }
    }
    else
    {
        $price = preg_replace('/(.*)(\\.)([0-9]{2})$/', '\1<sub>\2\3</sub>', number_format($price, 2, '.', ''));
    }

    return sprintf($GLOBALS['_CFG']['currency_format'], $price);
}

?>
