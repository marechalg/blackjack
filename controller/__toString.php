<?php

$str = self::class . "[";

$i = count(array($this));
foreach ($this as $atr => $val) {
    $str .= "$atr=";
    
    switch (get_debug_type($val)) {
        case 'DateTime':
            $str .= $val->format('d-m-Y H:i:s');
            break;
            
        case 'array':
            $str .= json_encode($val);
            break;
                
        case 'GameStatus':
        case 'Type':
        case 'Symbol':
            $str .= $val->value;
            break;
                            
        default:
            $str .= (string)$val;
            break;
    }
                        
    if (--$i >= 0) $str .= ', ';
}
                    
return $str . "]";

?>