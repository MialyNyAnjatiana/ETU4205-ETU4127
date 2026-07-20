<?php

namespace App\Controllers;

use App\Models\TypeOperationModel;
use App\Models\FraisModel;


class OperationController extends BaseController
{

    protected $operationModel;
    protected $fraisModel;

    public function __construct()
    {
        $this->operationModel = new TypeOperationModel();
        $this->fraisModel = new FraisModel();
    }

    public function index()
    {
        $data = [
            'operations' => $this->operationModel->findAll(),
            'frais' => $this->fraisModel->getAllFrais()
        ];

        return view('admin/operations', $data);
    }
}