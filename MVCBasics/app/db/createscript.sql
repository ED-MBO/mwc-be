-- Step: 01
-- ************************************************************
-- Doel : Maak een nieuwe database aan met de naam MVC_Basics_2509AB
-- ************************************************************
-- Versie       Datum           Auteur              Omschrijving
-- ******       *****           ******              ************
-- 01           10-02-2026      Hussein Kadhim    Smartphones
-- ************************************************************

-- Verwijder database MVC_Basics_2509AB
DROP DATABASE IF EXISTS `MVC_Basics_2509AB`;

-- Maak een nieuwe database aan MVC_Basics_2509AB
CREATE DATABASE `MVC_Basics_2509AB`;

-- Gebruik database MVC_Basics_2509AB
USE `MVC_Basics_2509AB`;

-- Step: 02
-- ************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Smartphones
-- ************************************************************
-- Versie       Datum           Auteur              Omschrijving
-- ******       *****           ******              ************
-- 01           10-02-2026      Hussein Kadhim    Tabel Smartphones
-- ************************************************************

-- Onderstaande velden toevoegen aan de tabel Smartphones
-- Merk, Model, Prijs, Geheugen, Besturingssysteem,
-- Schermgrootte, Releasedatum, MegaPixels
-- ************************************************************

CREATE TABLE Smartphones
(
     Id                 SMALLINT        UNSIGNED    NOT NULL    AUTO_INCREMENT
    ,Merk               VARCHAR(50)                 NOT NULL
    ,Model              VARCHAR(50)                 NOT NULL
    ,Prijs              DECIMAL(6,2)                NOT NULL
    ,Geheugen           DECIMAL(4,0)                NOT NULL
    ,Besturingssysteem  VARCHAR(25)                 NOT NULL
    ,Schermgrootte      DECIMAL(3,2)                NOT NULL
    ,Releasedatum       DATE                        NOT NULL
    ,MegaPixels         DECIMAL(3,0)                NOT NULL
    ,IsActief           BIT                         NOT NULL    DEFAULT 1
    ,Opmerking          VARCHAR(255)                NULL        DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)                 NOT NULL    DEFAULT NOW(6)
    ,DatumGewijzigd     DATETIME(6)                 NOT NULL    DEFAULT NOW(6)
    ,CONSTRAINT         PK_Smartphones_Id           PRIMARY KEY (Id)
) ENGINE=InnoDB;

-- Step: 03
-- ************************************************************
-- Doel : Vul de tabel Smartphones met gegevens
-- ************************************************************
-- Versie       Datum           Auteur              Omschrijving
-- ******       *****           ******              ************
-- 01           10-02-2026      Hussein Kadhim    Vulling Smartphones
-- ************************************************************

INSERT INTO Smartphones
(
     Merk
    ,Model
    ,Prijs
    ,Geheugen
    ,Besturingssysteem
    ,Schermgrootte
    ,Releasedatum
    ,MegaPixels
)
VALUES
    ('Apple',   'iPhone 16 Pro',        1256.56,    64,     'iOS 18',       6.7,    '2025-01-19',   50)
    ,('Samsung', 'Galaxy S25 Ultra',     1539.00,    128,    'Android 15',   6.1,    '2025-02-01',   200)
    ,('Google',  'Pixel 9 Pro',          890.00,     1024,   'Android 15',   6.3,    '2024-12-20',   100)
    ,('OnePlus', 'OnePlus 13',           799.00,     256,    'Android 15',   6.82,   '2025-01-10',   50)
    ,('Sony',    'Xperia 1 VI',          1299.00,    256,    'Android 14',   6.5,    '2024-06-20',   48)
    ,('Xiaomi',  'Xiaomi 15 Pro',        1099.00,    512,    'Android 15',   6.73,   '2025-03-01',   200)
    ,('Apple',   'iPhone 16',            899.00,     128,    'iOS 18',       6.1,    '2024-09-20',   48)
    ,('Samsung', 'Galaxy A55',           449.00,     128,    'Android 14',   6.6,    '2024-03-15',   50)
    ,('Motorola','Edge 50 Pro',          499.00,     256,    'Android 14',   6.7,    '2024-05-01',   50);

-- Step: 04
-- ************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Sneakers
-- ************************************************************
-- Versie       Datum           Auteur              Omschrijving
-- ******       *****           ******              ************
-- 01           10-02-2026      Hussein Kadhim    Tabel Sneakers
-- ************************************************************

-- Onderstaande velden toevoegen aan de tabel Sneakers
-- Type (Hardloop, Basketbal, Casual), Prijs, Materiaal (Leer, Mesh, Synthetisch), Gewicht, Releasedatum
-- ************************************************************

CREATE TABLE Sneakers
(
     Id                 SMALLINT        UNSIGNED    NOT NULL    AUTO_INCREMENT
    ,Merk               VARCHAR(50)                 NOT NULL
    ,Model              VARCHAR(50)                 NOT NULL
    ,Type               VARCHAR(25)                 NOT NULL
    ,Prijs              DECIMAL(6,2)                NOT NULL
    ,Materiaal          VARCHAR(25)                 NOT NULL
    ,Gewicht            DECIMAL(5,2)                NOT NULL
    ,Releasedatum       DATE                        NOT NULL
    ,IsActief           BIT                         NOT NULL    DEFAULT 1
    ,Opmerking          VARCHAR(255)                NULL        DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)                 NOT NULL    DEFAULT NOW(6)
    ,DatumGewijzigd     DATETIME(6)                 NOT NULL    DEFAULT NOW(6)
    ,CONSTRAINT         PK_Sneakers_Id              PRIMARY KEY (Id)
) ENGINE=InnoDB;

-- Step: 05
-- ************************************************************
-- Doel : Vul de tabel Sneakers met gegevens
-- ************************************************************
-- Versie       Datum           Auteur              Omschrijving
-- ******       *****           ******              ************
-- 01           10-02-2026      Hussein Kadhim    Vulling Sneakers
-- ************************************************************

INSERT INTO Sneakers
(
     Merk
    ,Model
    ,Type
    ,Prijs
    ,Materiaal
    ,Gewicht
    ,Releasedatum
)
VALUES
    ('Nike',        'Air Jordan 1',     'Hardloop',     129.99, 'Leer',         310.00, '2023-03-15')
    ,('Adidas',      'Yeezy Boost 350',  'Basketbal',    219.99, 'Synthetisch',  285.00, '2023-06-20')
    ,('New Balance', 'Pixel 9 Pro',      'Casual',       159.99, 'Mesh',         265.00, '2023-09-10')
    ,('Trico',       'New Age',          'Casual',       89.99,  'Synthetisch',  240.00, '2024-01-05')
    ,('Overlord',    'Tristar 6',        'Hardloop',     179.99, 'Mesh',         295.00, '2024-02-28')
    ,('Puma',        'Suede Classic',    'Casual',       99.99,  'Leer',         270.00, '2023-11-01')
    ,('Reebok',      'Classic Leather',  'Casual',       109.99, 'Leer',         280.00, '2024-03-15')
    ,('Asics',       'Gel-Kayano 30',    'Hardloop',     189.99, 'Mesh',         300.00, '2024-04-20');

-- Step: 06
-- ************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Horloges
-- ************************************************************
-- Versie       Datum           Auteur              Omschrijving
-- ******       *****           ******              ************
-- 01           11-02-2026      Hussein Kadhim    Tabel Horloges
-- ************************************************************

-- Onderstaande velden toevoegen aan de tabel Horloges
-- Materiaal (Goud, Diamant, RVS), Gewicht, Releasedatum, Waterdichtheid(m), Type (Analoog, Digitaal),
-- Uniek kenmerk
-- ************************************************************

CREATE TABLE Horloges
(
     Id                 SMALLINT        UNSIGNED    NOT NULL    AUTO_INCREMENT
    ,Merk               VARCHAR(50)                 NOT NULL
    ,Model              VARCHAR(50)                 NOT NULL
    ,Prijs              DECIMAL(6,0)                NOT NULL
    ,Materiaal          VARCHAR(25)                 NOT NULL
    ,Gewicht            DECIMAL(5,2)                NOT NULL
    ,Releasedatum       DATE                        NOT NULL
    ,Waterdichtheid     SMALLINT                    NOT NULL
    ,Type               VARCHAR(25)                 NOT NULL
    ,UniekKenmerk       VARCHAR(100)                NOT NULL
    ,IsActief           BIT                         NOT NULL    DEFAULT 1
    ,Opmerking          VARCHAR(255)                NULL        DEFAULT NULL
    ,DatumAangemaakt    DATETIME(6)                 NOT NULL    DEFAULT NOW(6)
    ,DatumGewijzigd     DATETIME(6)                 NOT NULL    DEFAULT NOW(6)
    ,CONSTRAINT         PK_Horloges_Id              PRIMARY KEY (Id)
) ENGINE=InnoDB;

-- Step: 07
-- ************************************************************
-- Doel : Vul de tabel Horloges met gegevens
-- ************************************************************
-- Versie       Datum           Auteur              Omschrijving
-- ******       *****           ******              ************
-- 01           11-02-2026      Hussein Kadhim    Vulling Horloges
-- ************************************************************

INSERT INTO Horloges
(
     Merk
    ,Model
    ,Prijs
    ,Materiaal
    ,Gewicht
    ,Releasedatum
    ,Waterdichtheid
    ,Type
    ,UniekKenmerk
)
VALUES
     ('Rolex',               'Daytona 126500LN',                         19800,  'RVS',      115.00, '2021-05-01',   100,    'Analoog',  'Chronograaf met Oysterflex armband')
    ,('Omega',               'Speedmaster Moonwatch Professional',        8500,   'RVS',      112.00, '2021-03-01',   50,     'Analoog',  'Op de maan gedragen in 1969')
    ,('Vacheron Constantin', 'Overseas Perpetual Calendar Ultra-Thin',    98000,  'Goud',     98.00,  '2022-01-15',   150,    'Analoog',  'Eeuwigdurende kalender in ultra-dun kast')
    ,('Jaeger-LeCoultre',    'Reverso Tribute Duoface',                  17000,  'RVS',      87.00,  '2020-09-01',   50,     'Analoog',  'Omkeerbare kast met dag- en nachtwijzerplaat')
    ,('Patek Philippe',      'Nautilus 5711',                            120000, 'RVS',      130.00, '2019-06-10',   120,    'Analoog',  'Iconisch geïntegreerd stalen sporthorloge')
    ,('Casio',               'G-Shock GA-2100',                          89,     'Synthetisch', 51.00, '2019-10-01', 200,    'Digitaal', 'CasiOak octagonale bezel, extreem schokbestendig')
    ,('TAG Heuer',           'Carrera Calibre 16',                       3200,   'RVS',      145.00, '2020-04-01',   100,    'Analoog',  'Legendarische racekronograaf uit 1963');


    -- Step: 08
-- ************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Zangeressen
-- ************************************************************
-- Versie       Datum           Auteur               Omschrijving
-- ****** ***** ****** ************
-- 01           12-02-2026       Hussein Kadhim     Tabel Zangeressen
-- ************************************************************

-- Onderstaande velden toevoegen aan de tabel Zangeressen
-- Naam, NettoWaarde, Land, Leeftijd, BekendsteNummer, Debuutjaar
-- ************************************************************

CREATE TABLE zangeressen
(
     Id                SMALLINT        UNSIGNED    NOT NULL    AUTO_INCREMENT
    ,Naam              VARCHAR(100)                NOT NULL
    ,NettoWaarde       VARCHAR(50)                 NOT NULL
    ,Land              VARCHAR(50)                 NOT NULL
    ,Leeftijd          TINYINT         UNSIGNED    NOT NULL
    ,BekendsteNummer   VARCHAR(100)                NOT NULL
    ,Debuutjaar        DATE                        NOT NULL
    ,CONSTRAINT         PK_Zangeressen_Id           PRIMARY KEY (Id)
) ENGINE=InnoDB;


-- Step: 09
-- ************************************************************
-- Doel : Vul de tabel Zangeressen met gegevens
-- ************************************************************
-- Versie       Datum           Auteur               Omschrijving
-- ****** ***** ****** ************
-- 01           12-02-2026       Hussein Kadhim     Vulling Zangeressen
-- ************************************************************

INSERT INTO Zangeressen
(
     Naam
    ,NettoWaarde
    ,Land
    ,Leeftijd
    ,BekendsteNummer
    ,Debuutjaar
)
VALUES
     ('Rihanna', '$1.4 Billion', 'Barbados', 36, 'Umbrella', '2005-05-24')
    ,('Taylor Swift', '$1.1 Billion', 'United States', 34, 'Shake It Off', '2006-10-24')
    ,('Beyoncé', '$800 Million', 'United States', 42, 'Halo', '1997-01-01')
    ,('Madonna', '$580 Million', 'United States', 65, 'Like a Virgin', '1982-10-06')
    ,('Celine Dion', '$480 Million', 'Canada', 56, 'My Heart Will Go On', '1981-11-06')
    ,('Dolly Parton', '$650 Million', 'United States', 78, 'Jolene', '1967-02-13')
    ,('Gloria Estefan', '$500 Million', 'Cuba', 66, 'Conga', '1977-09-01');