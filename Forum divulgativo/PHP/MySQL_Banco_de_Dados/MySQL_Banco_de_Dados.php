<?php
   function MySQL($colunas,$tabela,$new_value)
   {
       function SELECTS($colunas,$tabela)
       {
           function SELECT_FROM($tabela)
           {
               $sql = "SELECT*FROM $tabela";
               return $sql;
           }
           function SELECT_FROM_WHERE($colunas,$tabela)
           {
               $addPrefix = array_map(function($prefix){return "$prefix = :$prefix";},array_keys($colunas));
               $string_tronsfom = implode(' AND ',$addPrefix);
               $sql = "SELECT*FROM $tabela WHERE $string_tronsfom";
               return $sql;
           }
           $Selects = 
           [
               'select_from' => SELECT_FROM($tabela),
               'select_from_with_where' => SELECT_FROM_WHERE($colunas,$tabela)
           ];
           return $Selects;
       }
       function INSERTS($colunas,$tabela)
       {
           function INSERT_FROM($tabela,$colunas)
           {
               $addPrefix = array_map(function($prefix){return ":$prefix";},array_keys($colunas));
               $string_transform_1 = implode(',',array_keys($colunas));
               $string_transform_2 = implode(',',$addPrefix);
               $sql = "INSERT INTO $tabela ($string_transform_1) VALUES ($string_transform_2)";
               return $sql;
           }
           return INSERT_FROM($tabela,$colunas);
       }
       function UPDATES($colunas,$tabela,$new_value)
       {
           function UPDATE_SET_WHERE($colunas,$tabela,$new_value)
           {
               $AddPrefix_new_value = array_map(function($add){return "$add = :$add";},array_keys($new_value));
               $addPrefix = array_map(function($prefix){return "$prefix = :$prefix";},array_keys($colunas));
               $string_transform_1 = implode(',',$addPrefix);
               $string_transform_2 = implode(',',$AddPrefix_new_value);
               $sql = "UPDATE $tabela SET $string_transform_2 WHERE $string_transform_1";
               return $sql;
           }
           return UPDATE_SET_WHERE($colunas,$tabela,$new_value);
       }
       function DELETES($tabela,$colunas)
       {
           function DELETE($tabela)
           {
               $sql = "DELETE FROM $tabela";
               return $sql;
           }
           function DELETE_WHERE($tabela,$colunas)
           {
               $addPrefix = array_map(function($prefix){return "$prefix = :$prefix";},array_keys($colunas));
               $string_transform_1 = implode(',',$addPrefix);
               $sql = "DELETE FROM $tabela WHERE $string_transform_1";
               return $sql;
           }
           $Deletes = [
               'delete' => DELETE($tabela),
               'delete_with_where' => DELETE_WHERE($tabela,$colunas)
           ];
           return $Deletes;
       }
       $Consults = [
           'insert' => INSERTS($colunas,$tabela),
           'select' => SELECTS($colunas,$tabela),
           'update' => UPDATES($colunas,$tabela,$new_value),
           'delete' => DELETES($tabela,$colunas)
       ];
       return $Consults;
   }
?>