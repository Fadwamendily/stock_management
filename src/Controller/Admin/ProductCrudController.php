<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CurrencyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
           ImageField::new('image')
           ->setBasePath($this->getParameter("app.path.product_images"))
           ->onlyOnIndex(),
            AssociationField::new('category'),
            AssociationField::new('publisher')
            ->hideOnForm(),
            NumberField::new('price'),
            TextField::new('description'),
            BooleanField::new('status'),
            TextareaField::new('imageFile')
            ->setFormType(VichFileType::class)
            ->hideOnIndex()
            ->setFormTypeOption('allow_delete',false),
        ];
    }
    
}
