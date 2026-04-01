<?php
//  Efe Dilekci

class HorlogesController extends BaseController
{
    private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('horloges');
    }

    public function index($display = 'none', $message = '')
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->horlogeModel->getAllHorloges();

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title' => 'Duurste Horloges',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen
         */
        $this->view('horloges/index', $data);
    }

    public function delete($Id)
    {
        $result = $this->horlogeModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/HorlogesController/index');

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuw horloge toevoegen',
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

            $prijsRaw = $_POST['prijs'] ?? '';
            if ($prijsRaw === '') {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($prijsRaw) || $prijsRaw < 0 || $prijsRaw > 999999) {
                $errors['prijs'] = 'Voer een geldige prijs in (0 - 999999)';
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

            $waterdichtheidRaw = $_POST['waterdichtheid'] ?? '';
            if ($waterdichtheidRaw === '') {
                $errors['waterdichtheid'] = 'Voer een waterdichtheid in';
            } elseif (!is_numeric($waterdichtheidRaw) || $waterdichtheidRaw < 0 || $waterdichtheidRaw > 32767) {
                $errors['waterdichtheid'] = 'Voer een geldige waterdichtheid in (0 - 32767)';
            }

            if (empty(trim($_POST['type'] ?? ''))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) > 25) {
                $errors['type'] = 'Type mag maximaal 25 tekens bevatten';
            }

            if (empty(trim($_POST['uniekkenmerk'] ?? ''))) {
                $errors['uniekkenmerk'] = 'Voer een uniek kenmerk in';
            } elseif (strlen($_POST['uniekkenmerk']) > 100) {
                $errors['uniekkenmerk'] = 'Uniek kenmerk mag maximaal 100 tekens bevatten';
            }

            if (!empty($errors)) {
                $data['display'] = 'flex';
                $data['message'] = 'Controleer de ingevoerde gegevens';
                $data['errors'] = $errors;
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';

                $this->horlogeModel->create($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/HorlogesController/index');
                return;
            }
        }

        $this->view('horloges/create', $data);
    }

    public function update($id = null)
    {
        $data = [
            'title'   => 'Wijzig horloge',
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

            $prijsRaw = $_POST['prijs'] ?? '';
            if ($prijsRaw === '') {
                $errors['prijs'] = 'Voer een prijs in';
            } elseif (!is_numeric($prijsRaw) || $prijsRaw < 0 || $prijsRaw > 999999) {
                $errors['prijs'] = 'Voer een geldige prijs in (0 - 999999)';
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

            $waterdichtheidRaw = $_POST['waterdichtheid'] ?? '';
            if ($waterdichtheidRaw === '') {
                $errors['waterdichtheid'] = 'Voer een waterdichtheid in';
            } elseif (!is_numeric($waterdichtheidRaw) || $waterdichtheidRaw < 0 || $waterdichtheidRaw > 32767) {
                $errors['waterdichtheid'] = 'Voer een geldige waterdichtheid in (0 - 32767)';
            }

            if (empty(trim($_POST['type'] ?? ''))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) > 25) {
                $errors['type'] = 'Type mag maximaal 25 tekens bevatten';
            }

            if (empty(trim($_POST['uniekkenmerk'] ?? ''))) {
                $errors['uniekkenmerk'] = 'Voer een uniek kenmerk in';
            } elseif (strlen($_POST['uniekkenmerk']) > 100) {
                $errors['uniekkenmerk'] = 'Uniek kenmerk mag maximaal 100 tekens bevatten';
            }

            if (!empty($errors)) {
                $data['display'] = 'flex';
                $data['message'] = 'Controleer de ingevoerde gegevens';
                $data['errors'] = $errors;
            } else {
                $this->horlogeModel->update($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/HorlogesController/index');
                $this->index('flex', 'De gegevens zijn gewijzigd');
                return;
            }
        }

        $horlogeId = $id ?? $_POST['id'] ?? null;
        $data['horloge'] = $this->horlogeModel->getHorlogeById($horlogeId);

        if ($data['horloge'] === false) {
            $this->index('flex', 'Horloge niet gevonden');
            return;
        }

        $this->view('horloges/update', $data);
    }

}