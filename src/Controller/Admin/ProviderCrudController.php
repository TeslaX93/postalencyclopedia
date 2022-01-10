<?php

namespace App\Controller\Admin;

use App\Entity\Provider;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class ProviderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Provider::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('name'),
            TextField::new('acronym'),
            AssociationField::new('territories'),
            UrlField::new('trackingWebsite'),
            BooleanField::new('isTrackable'),
            AssociationField::new('address')
        ];
    }
}
