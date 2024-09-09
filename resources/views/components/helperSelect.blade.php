<?php

if (! function_exists('select')) {
            function select($name, $data, $value='') {
                $opt = '';
                if($value!='') {
                    foreach($data as $d) {
                        $select = ($value == $d['id'])?'selected':'';
                        $opt.= "<option value='$d[id]' $select >$d[Name]</option>";
                    }
                } else {
                    foreach($data as $d) {
                        //dd($d);
                        $d = (array)$d;
                        $select = '';
                        //dd($d['id']);
                        $opt.= "<option value='$d[id]' $select >$d[Name]</option>";
                    }
                }
                return "<select name='$name'>".
                    $opt.
                "</select>";
            }
        }

?>