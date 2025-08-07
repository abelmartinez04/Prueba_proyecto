<?php

namespace App\Utils\Entities;

use PDO;
use PDOException;

class TagUtils
{
    private static $getAllSQL = "SELECT * FROM tags ORDER BY tag_name";
    private static $getByIdSQL = "SELECT * FROM tags WHERE id = ?";
    private static $createSQL = "INSERT INTO tags (tag_name) VALUES (?)";
    private static $updateSQL = "UPDATE tags SET tag_name = ? WHERE id = ?";
    private static $deleteSQL = "DELETE FROM tags WHERE id = ?";

    public static function getAll()
    {
        global $pdo;
        $stmt = $pdo->query(self::$getAllSQL);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        global $pdo;
        $stmt = $pdo->prepare(self::$getByIdSQL);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($tagName)
    {
        global $pdo;
        try {
            $stmt = $pdo->prepare(self::$createSQL);
            $stmt->execute([$tagName]);
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function update($id, $tagName)
    {
        global $pdo;
        try {
            $stmt = $pdo->prepare(self::$updateSQL);
            return $stmt->execute([$tagName, $id]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function delete($id)
    {
        global $pdo;
        try {
            $stmt = $pdo->prepare(self::$deleteSQL);
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
