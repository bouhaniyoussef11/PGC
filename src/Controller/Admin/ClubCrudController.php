<?php

namespace App\Controller\Admin;

use App\Entity\Club;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
class ClubCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Club::class;
    }

    // configureFields
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom' ),
            //  TextEditorField::new('description'),
            TextareaField::new('description')
            ->setLabel('Description'),
            DateTimeField::new ('datecreation'),
            AssociationField::new('responsable'),
           
          

        ];
    }
    
}
