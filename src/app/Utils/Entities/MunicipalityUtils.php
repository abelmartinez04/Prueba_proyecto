<?php

namespace App\Utils\Entities;

use PDO;
use PDOException;

class MunicipalityUtils
{
    private static $getAllSQL = "SELECT * FROM municipalities ORDER BY municipality_name";
    private static $getByIdSQL = "SELECT * FROM municipalities WHERE id = ?";
    private static $createSQL = "INSERT INTO municipalities (municipality_name, province_id) VALUES (?, ?)";
    private static $updateSQL = "UPDATE municipalities SET municipality_name = ?, province_id = ? WHERE id = ?";
    private static $deleteSQL = "DELETE FROM municipalities WHERE id = ?";

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

    public static function create($municipalityName, $provinceId)
    {
        global $pdo;
        try {
            $stmt = $pdo->prepare(self::$createSQL);
            $stmt->execute([$municipalityName, $provinceId]);
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function update($id, $municipalityName, $provinceId)
    {
        global $pdo;
        try {
            $stmt = $pdo->prepare(self::$updateSQL);
            return $stmt->execute([$municipalityName, $provinceId, $id]);
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
