<?php
/**
 * Created by PhpStorm.
 * User: sfrma
 * Date: 10/12/2018
 * Time: 13:16
 */

namespace App\Form;


use App\Entity\Competition;
use App\Entity\Teams;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompetitionType extends AbstractType
{

    private $request;
    private $requeststack;
    public function __construct(RequestStack $request)
    {
        $this->request = $request->getMasterRequest();
        $this->requeststack = $request;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class)
            ->add('save', SubmitType::class);

        $builder->addEventListener(FormEvents::POST_SET_DATA, [$this, 'postSetData']);

    }

    public function postSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
        $entity = $form->getData();
        $route = $this->request->get('_route');
        //switcher les remove selon le nom des routes
        switch ($route) {
            case 'competition_all_no_groups':
                //supprimer les champs
                $form->remove('name');
                break;

        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Competition::class
        ]);
    }



}