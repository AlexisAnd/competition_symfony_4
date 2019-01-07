<?php

namespace App\Form;

use App\Entity\CompetitionTeams;
use App\Entity\Teams;
use Doctrine\ORM\EntityRepository;
use function Sodium\add;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompetitionTeamsType extends AbstractType
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
        $builder

            ->add('team', ChoiceType::class, array(
                'choices'=>array(
                    'Allemagne'=> 'Allemagne',
                    'Angleterre'=> 'Angleterre',
                    'Belgique'=> 'Belgique',
                    'Croatie'=> 'Croatie',
                    'Danemark'=> 'Danemark',
                    'Espagne'=> 'Espagne',
                    'France'=> 'France',
                    'Islande'=> 'Islande',
                    'Pologne'=> 'Pologne',
                    'Portugal'=> 'Portugal',
                    'Russie'=> 'Russie',
                    'Serbie'=> 'Serbie',
                    'Suede'=> 'Suede',
                    'Suisse'=> 'Suisse',
                    'Egypte'=> 'Egypte',
                    'Maroc'=> 'Maroc',
                    'Nigeria'=> 'Nigeria',
                    'Senegal'=> 'Senegal',
                    'Tunisie'=> 'Tunisie',
                    'Argentine'=> 'Argentine',
                    'Brésil'=> 'Brésil',
                    'Colombie'=> 'Colombie',
                    'Uruguay'=> 'Uruguay',
                    'Pérou'=> 'Pérou',
                    'Arabie Saoudite'=> 'Arabie Saoudite',
                    'Australie'=> 'Australie',
                    'Corée du Sud'=> 'Corée du Sud',
                    'Iran'=> 'Iran',
                    'Japon'=> 'Japon',
                    'Costa Rica'=> 'Costa Rica',
                    'Mexique'=> 'Mexique',
                    'Panama'=> 'Panama',
                    'Italie'=>'Italie'
                )
            ))
            ->add('section', ChoiceType::class, array(
                'choices'=>array(
                    'A'=>'A',
                    'B'=>'B',
                    'C'=>'C',
                    'D'=>'D',
                    'E'=>'E',
                    'F'=>'F',
                    'G'=>'G',
                    'H'=>'H'

                )
            ))
            ->add('submit', SubmitType::class);


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
            case 'competition_edit_group':
                //supprimer les champs
                $form->remove('section');
                break;

        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CompetitionTeams::class,
        ]);
    }
}
