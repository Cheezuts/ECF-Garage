<?php

namespace App\Controller\Admin;

use App\Entity\Voiture;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VoitureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Voiture::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        //yield from parent::configureFields($pageName);

        yield TextareaField::new('marque');   
        yield TextareaField::new('nom');
        yield IntegerField::new('kilometrage');
        yield IntegerField::new('anneMiseEnCirculation');    
        yield IntegerField::new('prix');
        yield TextareaField::new('carburant');
        yield TextareaField::new('description');

        yield TextareaField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex();

        yield ImageField::new('imageName')->setBasePath('/images/voitures')->hideOnForm();
    }
    
}
