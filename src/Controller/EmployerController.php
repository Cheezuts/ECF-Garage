<?php 
// src/Controller/EmployerController.php

namespace App\Controller;

use App\Entity\Employer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EmployerController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
         return Employer::class;  
    }
}
?>