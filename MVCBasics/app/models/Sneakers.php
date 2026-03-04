<?php

class sneakers
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers()
    {
        $sql = 'SELECT  SNKR.Id
                       ,SNKR.Merk
                       ,SNKR.Model
                       ,SNKR.Type
                       ,SNKR.Prijs
                       ,SNKR.Materiaal
                       ,CONCAT(SNKR.Gewicht, " gr") as Gewicht
                       ,DATE_FORMAT(SNKR.Releasedatum, "%d/%m/%Y") as Releasedatum

                FROM    Sneakers as SNKR

                WHERE   SNKR.IsActief = 1

                ORDER BY SNKR.Prijs DESC
                        ,SNKR.Releasedatum DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE
        FROM Sneakers
        WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}