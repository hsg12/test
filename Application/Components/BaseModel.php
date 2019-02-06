<?php

namespace Application\Components;

abstract class BaseModel
{
    private static $table;

    public static function all()
    {
        $db = DB::getConnection();

        $sql = "SELECT * FROM " . static::$table;

        if (! $result = $db->query($sql)) {
            return false;
        }

        $articles = [];
        while ($row = $result->fetch(\PDO::FETCH_OBJ)) {
            $articles[] = $row;
        }
        return $articles ?? false;
    }

    public static function getById($id)
    {
        $db = DB::getConnection();

        $sql  = "SELECT * FROM ";
        $sql .=  static::$table;
        $sql .= " WHERE ";
        $sql .= 'id = :id';
        $sql .= ' ORDER BY id DESC';

        $stmt = $db->prepare($sql);

        //var_dump($stmt);

        $stmt->execute(['id' => $id]);
        //$customer = $stmt->fetch();
        $customer = $stmt->fetchObject();

       // var_dump($customer);

        return $customer;


    }

    public static function insert($name, $email, $state, $interested)
    {
        $db = DB::getConnection();

        $sql  = "INSERT INTO ";
        $sql .=  static::$table;
        $sql .= " (name, email, state, interested) ";
        $sql .= 'VALUES (?, ?, ?, ?)';

        $stmt = $db->prepare($sql);
        $res = $stmt->execute([$name, $email, $state, $interested]);

        //var_dump($res);



        return $res;


    }

    public static function update($name, $email, $state, $interested, $id)
    {
        $db = DB::getConnection();

        $sql  = "UPDATE ";
        $sql .= static::$table;
        $sql .= " SET ";
        $sql .= 'name=?, email=?, state=?, interested=?';
        $sql .= " WHERE ";
        $sql .= 'id = ?';

        $stmt = $db->prepare($sql);

        $res = $stmt->execute([$name, $email, $state, $interested, $id]);

        //var_dump($res);


        return $res;



    }

    public static function remove($id)
    {
        $db = DB::getConnection();

        $sql  = "DELETE FROM ";
        $sql .= static::$table;
        $sql .= " WHERE ";
        $sql .= 'id = :id';

        $stmt = $db->prepare($sql);
        $res = $stmt->execute(['id' => $id]);

        //var_dump($res);



        return $res;


    }

}









