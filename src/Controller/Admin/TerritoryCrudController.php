<?php

namespace App\Controller\Admin;

use App\Entity\Territory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TerritoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Territory::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('name'),

        ];
    }
    */
}
