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

    public function create($data)
    {
        $sql = "INSERT INTO Sneakers ( Merk
                                     ,Model
                                     ,Type
                                     ,Prijs
                                     ,Materiaal
                                     ,Gewicht
                                     ,Releasedatum
                                     ,IsActief
                                     )
            VALUES (:merk,
                    :model,
                    :type,
                    :prijs,
                    :materiaal,
                    :gewicht,
                    :releasedatum,
                    1)";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_INT);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function getSneakerById($id)
    {
        $sql = 'SELECT  SNKR.Id
                       ,SNKR.Merk
                       ,SNKR.Model
                       ,SNKR.Type
                       ,SNKR.Prijs
                       ,SNKR.Materiaal
                       ,SNKR.Gewicht
                       ,SNKR.Releasedatum
                FROM    Sneakers as SNKR
                WHERE   SNKR.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function update($data)
    {
        $sql = "UPDATE Sneakers SET Merk = :merk
                                 ,Model = :model
                                 ,Type = :type
                                 ,Prijs = :prijs
                                 ,Materiaal = :materiaal
                                 ,Gewicht = :gewicht
                                 ,Releasedatum = :releasedatum
                WHERE Id = :id";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_INT);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);
        $this->db->bind(':id', $data['id'], PDO::PARAM_INT);

        return $this->db->execute();
    }
}