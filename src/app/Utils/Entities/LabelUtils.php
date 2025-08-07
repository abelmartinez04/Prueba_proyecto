<?php

namespace App\Utils\Entities;

use PDO;


class LabelUtils
{
    private static $getAllSQL = "SELECT * FROM labels ORDER BY label_name";
    private static $getByIdSQL = "SELECT * FROM labels WHERE id = ?";
    private static $insertSQL = "INSERT INTO labels (label_name) VALUES (?)";
    private static $updateSQL = "UPDATE labels SET label_name = ? WHERE id = ?";
    private static $deleteSQL = "DELETE FROM labels WHERE id = ?";

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

    public static function create($pdo, $data)
    {
        $labelName = $data['label_name'] ?? '';
        if (!$labelName) return false;

        $stmt = $pdo->prepare(self::$insertSQL);
        return $stmt->execute([$labelName]);
    }

    public static function update($pdo, $id, $data)
    {
        $labelName = $data['label_name'] ?? '';
        if (!$labelName || !$id) return false;

        $stmt = $pdo->prepare(self::$updateSQL);
        return $stmt->execute([$labelName, $id]);
    }

    public static function delete($pdo, $id)
    {
        $stmt = $pdo->prepare(self::$deleteSQL);
        return $stmt->execute([$id]);
    }
}
