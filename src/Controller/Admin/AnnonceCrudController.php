<?php

namespace App\Controller\Admin;

use App\Entity\Annonce;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AnnonceCrudController extends AbstractCrudController
{
    private  const PRODUCTS_BASE_PATH="upload";
    private  const PRODUCTS_UPLOAD_DIR="public/upload";
    public static function getEntityFqcn(): string
    {
        return Annonce::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            ImageField::new('contenu')
            ->setBasePath(self::PRODUCTS_BASE_PATH) 
            ->setUploadDir(self::PRODUCTS_UPLOAD_DIR),
           DateTimeField::new ('date'),
           AssociationField::new('autheur'),
        ];
    }


    // IdField::new('id')->hideOnForm(),
    // TextField::new('nom' ),
    // //  TextEditorField::new('description'),
    // TextareaField::new('description')
    // ->setLabel('Description'),
    // DateTimeField::new ('datecreation'),
    // AssociationField::new('responsable'),



    
}
