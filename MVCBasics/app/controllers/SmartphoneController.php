<?php
//  Efe Dilekci

class SmartphoneController extends BaseController
{
    private $smartphoneModel;

    public function __construct()
    {
        $this->smartphoneModel = $this->model('Smartphone');
    }

    public function index($display='none', $message='')
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->smartphoneModel->getAllSmartphones();

        // var_dump($result);

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title' => 'Overzicht Smartphones',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen
         */
        $this->view('smartphone/index', $data);
    }

    public function delete($Id)
    {
        $result = $this->smartphoneModel->delete($Id);

        header('Refresh:3 ; url='. URLROOT . '/smartphoneController/index');

        $this->index('flex', 'Record is verwijderd');
    }

    public function create()
    {
        $data = [
            'title'   => 'Nieuwe smartphone toevoegen',
            'display' => 'none',
            'message' => ''
        ];
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['geheugen']) ||
                empty($_POST['besturingssysteem']) ||
                empty($_POST['schermgrootte']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['megapixels'])) {
    
                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
            } else {
                $data['display'] = 'flex';
                $data['message'] = 'De gegevens zijn opgeslagen';
    
                $this->smartphoneModel->create($_POST);
    
                header('Refresh: 3; URL=' . URLROOT . '/SmartphoneController/index');
            }
        }
    
        $this->view('smartphone/create', $data);
    }
    public function update($id = NULL)
    {
        $data = [
            'title'   => 'Wijzig smartphone',
            'display' => 'none',
            'message' => ''
        ];
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['geheugen']) ||
                empty($_POST['besturingssysteem']) ||
                empty($_POST['schermgrootte']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['megapixels'])) {
    
                // Laat de <div> tag met terugkoppeling naar de gebruiker zien
                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in';
            } else {
                // Hier komt de code om de gewijzigde data op te slaan
                $this->smartphoneModel->update($_POST);

                header('Refresh: 3; URL=' . URLROOT . '/SmartphoneController/index');
                $this->index('flex', 'De gegevens zijn gewijzigd');
                return;
            }
        }

        // Id uit URL (GET) of uit formulier (POST bij validatiefout)
        $smartphoneId = $id ?? $_POST['id'] ?? null;
        $data['smartphone'] = $this->smartphoneModel->getSmartphoneById($smartphoneId);

        if ($data['smartphone'] === false) {
            $this->index('flex', 'Smartphone niet gevonden');
            return;
        }

        $this->view('smartphone/update', $data);
    }
}   