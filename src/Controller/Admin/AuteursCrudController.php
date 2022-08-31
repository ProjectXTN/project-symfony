<?php

namespace App\Controller\Admin;

use App\Entity\Auteurs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AuteursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Auteurs::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
