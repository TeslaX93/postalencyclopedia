<?php

namespace App\Controller\Admin;

use App\Entity\Address;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class AddressCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Address::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('isPublic'),
            AssociationField::new('country'),
            TextField::new('name'),
            TextField::new('company'),
            TextField::new('street'),
            IntegerField::new('PoBoxNumber'),
            TextField::new('streetNumber'),
            TextField::new('apartmentNumber'),
            TextField::new('city'),
            TextField::new('province'),
            TextField::new('postalCode'),
            TextField::new('postscript'),
            TelephoneField::new('phone'),
            UrlField::new('website'),
            EmailField::new('email'),
        ];
    }
}
