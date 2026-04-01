<?php

class SneakersController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneakers');
    }

    public function index($display = 'none', $message = '')
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->sneakerModel->getAllSneakers();

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title' => 'Mooiste Sneakers',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen
         */
        $this->view('sneakers/index', $data);
    }

    public function delete($Id)
    {
        $result = $this->sneakerModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/SneakersController/index');

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe sneaker toevoegen',
            'display' => 'none',
            'message' => '',
            'errors'  => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = [];

            if (empty(trim($_POST['merk'] ?? ''))) {
                $errors['merk'] = 'Voer een merk in';
            } elseif (strlen($_POST['merk']) > 50) {
                $errors['merk'] = 'Merk mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['model'] ?? ''))) {
                $errors['model'] = 'Voer een model in';
            } elseif (strlen($_POST['model']) > 50) {
                $errors['model'] = 'Model mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['type'] ?? ''))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) > 25) {
                $errors['type'] = 'Type mag maximaal 25 tekens bevatten';
            }

            $prijsRaw = $_POST['prijs'] ?? '';
            if ($prijsRaw === '') {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($prijsRaw) || $prijsRaw < 0 || $prijsRaw > 9999.99) {
                $errors['prijs'] = 'Voer een geldige prijs in (0 - 9999,99)';
            }

            if (empty(trim($_POST['materiaal'] ?? ''))) {
                $errors['materiaal'] = 'Voer een materiaal in';
            } elseif (strlen($_POST['materiaal']) > 25) {
                $errors['materiaal'] = 'Materiaal mag maximaal 25 tekens bevatten';
            }

            $gewichtRaw = $_POST['gewicht'] ?? '';
            if ($gewichtRaw === '') {
                $errors['gewicht'] = 'Voer een gewicht in';
            } elseif (!is_numeric($gewichtRaw) || $gewichtRaw < 0 || $gewichtRaw > 999.99) {
                $errors['gewicht'] = 'Voer een geldig gewicht in (0 - 999,99)';
            }

            $releasedatumRaw = $_POST['releasedatum'] ?? '';
            if ($releasedatumRaw === '') {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $releasedatumRaw)) {
                $errors['releasedatum'] = 'Voer een geldig datum in (jjjj-mm-dd)';
            }

            if (!empty($errors)) {
                $data['display'] = 'flex';
                $data['message'] = 'Controleer de ingevoerde gegevens';
                $data['errors'] = $errors;
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->sneakerModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/SneakersController/index');
                return;
            }
        }

        $this->view('sneakers/create', $data);
    }

    public function update($id = null)
    {
        $data = [
            'title'   => 'Wijzig sneaker',
            'display' => 'none',
            'message' => '',
            'errors'  => []
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = [];

            if (empty(trim($_POST['merk'] ?? ''))) {
                $errors['merk'] = 'Voer een merk in';
            } elseif (strlen($_POST['merk']) > 50) {
                $errors['merk'] = 'Merk mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['model'] ?? ''))) {
                $errors['model'] = 'Voer een model in';
            } elseif (strlen($_POST['model']) > 50) {
                $errors['model'] = 'Model mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['type'] ?? ''))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) > 25) {
                $errors['type'] = 'Type mag maximaal 25 tekens bevatten';
            }

            $prijsRaw = $_POST['prijs'] ?? '';
            if ($prijsRaw === '') {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($prijsRaw) || $prijsRaw < 0 || $prijsRaw > 9999.99) {
                $errors['prijs'] = 'Voer een geldige prijs in (0 - 9999,99)';
            }

            if (empty(trim($_POST['materiaal'] ?? ''))) {
                $errors['materiaal'] = 'Voer een materiaal in';
            } elseif (strlen($_POST['materiaal']) > 25) {
                $errors['materiaal'] = 'Materiaal mag maximaal 25 tekens bevatten';
            }

            $gewichtRaw = $_POST['gewicht'] ?? '';
            if ($gewichtRaw === '') {
                $errors['gewicht'] = 'Voer een gewicht in';
            } elseif (!is_numeric($gewichtRaw) || $gewichtRaw < 0 || $gewichtRaw > 999.99) {
                $errors['gewicht'] = 'Voer een geldig gewicht in (0 - 999,99)';
            }

            $releasedatumRaw = $_POST['releasedatum'] ?? '';
            if ($releasedatumRaw === '') {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $releasedatumRaw)) {
                $errors['releasedatum'] = 'Voer een geldig datum in (jjjj-mm-dd)';
            }

            if (!empty($errors)) {
                $data['display'] = 'flex';
                $data['message'] = 'Controleer de ingevoerde gegevens';
                $data['errors'] = $errors;
            } else {
                $this->sneakerModel->update($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/SneakersController/index');
                $this->index('flex', 'De gegevens zijn gewijzigd');
                return;
            }
        }

        $sneakerId = $id ?? $_POST['id'] ?? null;
        $data['sneaker'] = $this->sneakerModel->getSneakerById($sneakerId);

        if ($data['sneaker'] === false) {
            $this->index('flex', 'Sneaker niet gevonden');
            return;
        }

        $this->view('sneakers/update', $data);
    }
}