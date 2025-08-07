<?php

namespace App\Utils\Entities;

use PDO;
use PDOException;

class NeighborhoodUtils
{
    private static $getAllSQL = "SELECT * FROM neighborhoods ORDER BY neighborhood_name";
    private static $getByIdSQL = "SELECT * FROM neighborhoods WHERE id = ?";
    private static $createSQL = "INSERT INTO neighborhoods (neighborhood_name, municipality_id) VALUES (?, ?)";
    private static $updateSQL = "UPDATE neighborhoods SET neighborhood_name = ?, municipality_id = ? WHERE id = ?";
    private static $deleteSQL = "DELETE FROM neighborhoods WHERE id = ?";

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

    public static function create($neighborhoodName, $municipalityId)
    {
        global $pdo;
        try {
            $stmt = $pdo->prepare(self::$createSQL);
            $stmt->execute([$neighborhoodName, $municipalityId]);
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function update($id, $neighborhoodName, $municipalityId)
    {
        global $pdo;
        try {
            $stmt = $pdo->prepare(self::$updateSQL);
            return $stmt->execute([$neighborhoodName, $municipalityId, $id]);
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
