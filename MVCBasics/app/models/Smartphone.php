<?php

class Smartphone
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSmartphones()
    {
        $sql = 'SELECT  SMPS.Id
                       ,SMPS.Merk
                       ,SMPS.Model
                       ,SMPS.Prijs
                       ,SMPS.Geheugen
                       ,SMPS.Besturingssysteem
                       ,CONCAT(SMPS.Schermgrootte, " inch") as Schermgrootte
                       ,DATE_FORMAT(SMPS.Releasedatum, "%d/%m/%Y") as Releasedatum
                       ,CONCAT(SMPS.MegaPixels, " MP") as MegaPixels

                FROM    Smartphones as SMPS

                ORDER BY SMPS.Schermgrootte DESC
                        ,SMPS.Prijs DESC
                        ,SMPS.Geheugen DESC
                        ,SMPS.Releasedatum DESC
                        ,SMPS.MegaPixels DESC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE
        FROM Smartphones
        WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }
    public function create($data)
{
    $sql = "INSERT INTO Smartphones ( Merk
                                     ,Model
                                     ,Prijs
                                     ,Geheugen
                                     ,Besturingssysteem
                                     ,Schermgrootte
                                     ,Releasedatum
                                     ,MegaPixels
                                     )
            VALUES (:merk,
                    :model,
                    :prijs,
                    :geheugen,
                    :besturingssysteem,
                    :schermgrootte,
                    :releasedatum,
                    :megapixels)";

    $this->db->query($sql);
    $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
    $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
    $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_INT);
    $this->db->bind(':geheugen', $data['geheugen'], PDO::PARAM_INT);
    $this->db->bind(':besturingssysteem', $data['besturingssysteem'], PDO::PARAM_STR);
    $this->db->bind(':schermgrootte', $data['schermgrootte'], PDO::PARAM_INT);
    $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);
    $this->db->bind(':megapixels', $data['megapixels'], PDO::PARAM_INT);

    return $this->db->execute();
}
}