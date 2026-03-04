<?php

class zangeressen
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllZangeressen()
    {
        // Selecteer de juiste kolommen uit de tabel 'zangeressen'
        $sql = 'SELECT  Naam
                       ,NettoWaarde
                       ,Land
                       ,Leeftijd
                       ,BekendsteNummer
                       ,Debuutjaar as Debuut
                FROM    zangeressen
                ORDER BY NettoWaarde DESC';

        $this->db->query($sql);
        return $this->db->resultSet();
    }
}