<?php

class horloges
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

   public function getAllHorloges()
{
    $sql = 'SELECT  HRLG.Id
                   ,HRLG.Merk
                   ,HRLG.Model
                   ,HRLG.Prijs
                   ,HRLG.Materiaal
                   ,HRLG.Gewicht
                   ,HRLG.Releasedatum
                   ,HRLG.Waterdichtheid
                   ,HRLG.Type
                   ,HRLG.UniekKenmerk

            FROM    Horloges as HRLG

            ORDER BY HRLG.Prijs DESC';

    $this->db->query($sql);
    return $this->db->resultSet();
}

    public function delete($Id)
    {
        $sql = "DELETE
        FROM Horloges
        WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function getHorlogeById($id)
    {
        $sql = 'SELECT  HRLG.Id
                       ,HRLG.Merk
                       ,HRLG.Model
                       ,HRLG.Prijs
                       ,HRLG.Materiaal
                       ,HRLG.Gewicht
                       ,HRLG.Releasedatum
                       ,HRLG.Waterdichtheid
                       ,HRLG.Type
                       ,HRLG.UniekKenmerk
                FROM    Horloges as HRLG
                WHERE   HRLG.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Horloges ( Merk
                                     ,Model
                                     ,Prijs
                                     ,Materiaal
                                     ,Gewicht
                                     ,Releasedatum
                                     ,Waterdichtheid
                                     ,Type
                                     ,UniekKenmerk
                                     )
            VALUES (:merk,
                    :model,
                    :prijs,
                    :materiaal,
                    :gewicht,
                    :releasedatum,
                    :waterdichtheid,
                    :type,
                    :uniekkenmerk)";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_INT);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);
        $this->db->bind(':waterdichtheid', $data['waterdichtheid'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':uniekkenmerk', $data['uniekkenmerk'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function update($data)
    {
        $sql = "UPDATE Horloges SET Merk = :merk
                                ,Model = :model
                                ,Prijs = :prijs
                                ,Materiaal = :materiaal
                                ,Gewicht = :gewicht
                                ,Releasedatum = :releasedatum
                                ,Waterdichtheid = :waterdichtheid
                                ,Type = :type
                                ,UniekKenmerk = :uniekkenmerk
                WHERE Id = :id";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_INT);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);
        $this->db->bind(':waterdichtheid', $data['waterdichtheid'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':uniekkenmerk', $data['uniekkenmerk'], PDO::PARAM_STR);
        $this->db->bind(':id', $data['id'], PDO::PARAM_INT);

        return $this->db->execute();
    }
}