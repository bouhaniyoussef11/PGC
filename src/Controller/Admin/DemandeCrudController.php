<?php

namespace App\Controller\Admin;

use App\Entity\Demande;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DemandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Demande::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ChoiceField::new('type')
            ->setLabel('Type')
            ->setChoices([
                'Achat' => 'achat',
                'Evenement' => 'evenement',
                'Encadrement' => 'encadrement',
                'Formation' => 'formation',
            ]),
            DateTimeField::new ('dateDemande'),
          
            AssociationField::new('clubAssocie'),
        ];

    }
    
}
