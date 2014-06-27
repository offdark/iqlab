<?php


class Test {

    function __construct(){

         $time = date('Y-m-d H:i:s');
        echo $time ."<br>";


    }

    public static function update(  $object, $table_name, $where_mixed ){

        $data = array();
        $fields = array(); // key -> value in sql string
        $sql = 'query: ';

        if( is_array($object) ){



            foreach( $object as $key => $value ){

                $fields[] = $key." = ?";
                $data[]   = $value;

            }
            $sql .= implode(', ',$fields); // comma_separated;

        echo "<br> TEST PRINT_R : ";
        print_r($data);
            echo "<br> FIELDS";
            print_r($fields);

    }

        if( !is_array($where_mixed) ){



            foreach( $where_mixed as $key => $value ){

                $fields[] = $key." = ?";
                $data[]   = $value;

            }
            $sql .= implode(', ',$fields); // comma_separated;

            echo "<br> FIELDS";
                 print_r($fields);
            echo "<br> FIELDS";
            print_r($fields);
        }

}

}

$newTest = new Test();